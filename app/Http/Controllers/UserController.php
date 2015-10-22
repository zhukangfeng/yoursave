<?php
namespace App\Http\Controllers;

// Models
use App\Models\User;

// Requests
use App\Http\Requests;
use App\Http\Requests\Register\UserActiveRequest;
use App\Http\Requests\Register\UserCreateRequest;

// Services
use App\Services\AliyunOSS;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Session;

// Utils
use App\Utils\AuthUtil;
use App\Utils\FileIO;

/**
 * UserController
 * User's information, operating
 *
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = Session::get('User');
        var_dump($user);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function home()
    {
// var_dump(public_path());exit;
        // 上传一个文件
        // $result = OSS::upload(
        //     'test/bootstrap-datetimepicker-master_' . Carbon::now() . '.zip',
        //     public_path() . '/bootstrap-datetimepicker-master.zip'
        // );
        var_dump(FileIO::upload('/Users/shu/Downloads/china1.pdf', 'upload/china1.pdf'));
        // return FileIO::getUrl('upload/china1.pdf', 1);
        // return DB::table('users')
        //     ->select('id')
        //     ->first()
        //     ->id;
        // $aliyunOSS = new AliyunOSS();
        // var_dump($aliyunOSS->upload('robots.txt', public_path() . '/robots.txt'));
        // var_dump($aliyunOSS->deleteObject('yoursave', 'abcd.xbd'));
        // var_dump($aliyunOSS->moveObject(null, 'tmp/tobots.txt', null, 'tmp/robots.txt'));
    }

    /**
     * 注册用户界面.
     *
     * @return Response
     */
    public function create()
    {

        return view('register.index');
    }

    /**
     * 注册用户信息存入数据库.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(UserCreateRequest $request)
    {
        DB::beginTransaction();

        $user = User::create([
            'u_name'    => $request->input('username'),
            'f_name'    => $request->input('firstname'),
            'l_name'    => $request->input('lastname'),
            'login_mail'    => $request->input('login_mail_addr'),
            'active_token'  => AuthUtil::createToken('login_mail_addr'),
            'active_token_time' => Carbon::now()->addHours(REGISTER_CHECK_URL_EFFECTIVE_HOUR),
            'status'    => DB_USERS_STATUS_REQUESTING,
            'created_ip'    => $request->getClientIp()
        ]);

        try {
            $activeToken = $user->active_token;
            MailUtil::sendMail([
                'view'  => 'register.register_check_mail',
                'viewData'  => compact('user', 'activeToken'),
                'fromMailAddr'  => null,
                'fromName'  => null,
                'toMailAddr'    => $user->login_mail,
                'toName'    => $user->l_name,
                'subject'   => trans('mails.register.subject')
            ]);
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('error_messages', [trans('error_messages.register.mail_sent_fail')]);

            return back()->withInput();
        }

        DB::commit();
        Session::flash('success_messages', [trans('success_messages.register.user_register_success')]);

        return redirect('/');
    }

    /**
     * 个人账户激活页面
     *
     * @param Request $request
     * @return Response
     */
    public function check(Request $request)
    {
        $token = $request->input('token');

        if ($token == '') {
            // 不存在token
            return redirect('/');
        }

        $user = User::where('active_token', $token)
            ->first();

        if (is_null($user)) {
            // token无效
            Session::flash('error_messages', [trans('error_messages.register.token_error')]);
            return redirect('/register');
        }

        if ($user->active_token_time < Carbon::now()) {
            // token失效
            Session::flash('error_messages', [trans('error_messages.register.over_token_active_time')]);
            return redirect('/register/resendmail');
        }

        return view('register.user_active', compact('token'));
    }

    /**
     * 账户激活
     *
     * @param UserActiveRequest $request
     * @return Response
     */
    public function active(UserActiveRequest $request)
    {
        $token = $request->input('token');

        if ($token == '') {
            // 不存在token
            return redirect('/');
        }

        $user = User::where('active_token', $token)
            ->first();

        if (is_null($user)) {
            // token无效
            Session::flash('error_messages', [trans('error_messages.register.token_error')]);
            return redirect('/register');
        }

        if ($user->active_token_time < Carbon::now()) {
            // token失效
            Session::flash('error_messages', [trans('error_messages.register.over_token_active_time')]);
            return redirect('/register/resendmail');
        }
        
        $user->update([
            'password'  => AuthUtil::encryptPassword($request->input('password')),
            'status'    => DB_USERS_STATUS_EFFECITVE,
            'active_token'  => null,
            'active_token_time' => null
        ]);

        Session::put('User', $user);
        Auth::login($user);

        return redirect('/user/edit');
    }

    /**
     * 显示个人资料
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit()
    {
        $user = Session::get('User');

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
