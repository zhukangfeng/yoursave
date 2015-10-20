<?php
namespace App\Http\Controllers;

// Models
use App\Models\User;

// Requests
use App\Http\Requests;
use App\Http\Requests\Register\UserCreateRequest;

// Services
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

// Utils
use App\Utils\AuthUtil;

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
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function home()
    {
        return DB::table('users')
            ->select('id')
            ->first()
            ->id;
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
