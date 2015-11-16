<?php
namespace App\Http\Controllers;

// Controllers
use App\Http\Controllers\Controller;

// Models
use App\Models\Shop;
use App\Models\ShopUser;
use App\Models\User;

// Requests
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\Myshop\Users\ShopUserOperateRequest;

// Services
use Config;
use Carbon\Carbon;
use Session;

// Utils
use App\Utils\AuthUtil;
use App\Utils\MailUtil;

class ShopUserController extends Controller
{
    /**
     * 显示公司职员
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopUser = Session::get('ShopUser');
        if ($shopUser->type === DB_SHOP_USERS_TYPE_ADMIN || $shopUser->type === DB_SHOP_USERS_TYPE_MANAGER) {
            // 管理员
            $shopUsers = ShopUser::where('shop_users.shop_id', $shopUser->shop_id)
                ->select(
                    'shop_users.*',
                    'users.l_name as l_name',
                    'users.f_name as f_name'
                )
                ->withUserName()
                ->withCreatedUser()
                ->withUpdatedUser()
                ->paginate(Config::get('pages.myshop.users.index.default_show_number', 10));
        } else {
            $shopUsers = ShopUser::where('shop_users.id', $shopUser->id)
                ->select(
                    'shop_users.*',
                    'users.l_name as l_name',
                    'users.f_name as f_name'
                )
                ->withUserName()
                ->withCreatedUser()
                ->withUpdatedUser()
                ->paginate(Config::get('pages.myshop.users.index.default_show_number', 10));
        }

        return view('myshop.users.index', compact('shopUser', 'shopUsers'));
    }

    /**
     * 商店职员账号添加
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shopUser = Session::get('ShopUser');

        return view('myshop.users.create', compact('shopUser'));
    }

    /**
     * 保存新建的商店职员账户
     *
     * @param  App\Http\Requests\Myshop\Users\ShopUserOperateRequest
     * @return \Illuminate\Http\Response
     */
    public function store(ShopUserOperateRequest $request)
    {
        $user = Session::get('User');
        $shopUser = Session::get('ShopUser');
        $shop = Session::get('Shop');

        $loginMails = explode("\n", $request->input('login_mails'));
        $position = $request->input('position');
        $type = (int)$request->input('type');
        $invitingUserName = $user->getFullName();
        $shopName = $shop->name;
        foreach ($loginMails as $mailKey => $loginMail) {
            if ($loginMail != '') {
                $invitedUser = User::where('login_mail', $loginMail)
                    ->first();
                if (is_null($invitedUser)) {
                    // 未注册邮箱的邀请（用户账号和商店职员账号）
                    $invitedUser = User::create([
                        'login_mail'    => $loginMail,
                        'active_token'  => AuthUtil::createToken($loginMail),
                        'active_token_time' => Carbon::now()->addHours(REGISTER_CHECK_URL_EFFECTIVE_HOUR),
                        'status'    => DB_USERS_STATUS_REQUESTING,
                        'created_ip'    => $request->getClientIp()
                    ]);

                    ShopUser::create([
                        'shop_id'   => $shop->id,
                        'user_id'   => $invitedUser->id,
                        'email'     => $invitedUser->login_mail,
                        'type'      => (int)$type,
                        'position'  => $position,
                        'status'    => DB_SHOP_USERS_STATUS_REQUESTING,
                        'created_by'    => $user->id,
                        'updated_by'    => $user->id
                    ]);

                    try {
                        $activeToken = $invitedUser->active_token;
                        $activeTokenTime = $invitedUser->active_token_time->format('Y/m/d H:i:s');
                        MailUtil::sendMail([
                            'view'  => 'myshop.users.check_mail_for_unregistered',
                            'viewData'  => compact(
                                'invitedUser',
                                'activeToken',
                                'activeTokenTime',
                                'invitingUserName',
                                'shopName'
                            ),
                            'fromMailAddr'  => null,
                            'fromName'  => null,
                            'toMailAddr'    => $invitedUser->login_mail,
                            'toName'    => $invitedUser->l_name,
                            'subject'   => trans('mails.myshop.users.check_mail_for_unregistered.subject', [
                                'shop_name' => $shop->name
                            ])
                        ]);
                    } catch (Exception $e) {
                        Session::flash('error_messages', [trans('error_messages.register.mail_sent_fail')]);

                        return back()->withInput();
                    }
                } else {
                    // 已经注册的用户邀请（商店账户邀请）
                    $invitedShopUser = ShopUser::create([
                        'shop_id'   => $shop->id,
                        'email'     => $invitedUser->login_mail,
                        'user_id'   => $invitedUser->id,
                        'type'      => (int)$type,
                        'position'  => $position,
                        'status'    => DB_SHOP_USERS_STATUS_REQUESTING,
                        'created_by'    => $user->id,
                        'updated_by'    => $user->id
                    ]);

                    try {
                        MailUtil::sendMail([
                            'view'  => 'myshop.users.info_mail_for_registered_user',
                            'viewData'  => compact('invitedUser', 'invitingUserName', 'shopName'),
                            'fromMailAddr'  => null,
                            'fromName'  => null,
                            'toMailAddr'    => $invitedUser->login_mail,
                            'toName'    => $invitedUser->l_name,
                            'subject'   => trans('mails.myshop.users.info_mail_for_registered_user.subject', [
                                'shop_name' => $shop->name
                            ])
                        ]);
                    } catch (Exception $e) {
                        Session::flash('error_messages', [trans('error_messages.register.mail_sent_fail')]);

                        return back()->withInput();
                    }
                }
            }
        }
        
        Session::flash('success_messages', [trans('success_messages.myshop.users.create_success')]);

        return redirect()->action('ShopUserController@index');
    }

    /**
     * 显示职员详情
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, ShopUserOperateRequest $request)
    {
        $shopUser = Session::get('ShopUser');

        $operateUser = ShopUser::where('shop_users.id', $id)
            ->select('shop_users.*')
            ->withUserName()
            ->withCreatedUser()
            ->withUpdatedUser()
            ->first();

        return view('myshop.users.show', compact('shopUser', 'operateUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shopUser = Session::get('ShopUser');
        $operateShopUser = ShopUser::where('shop_users.id', $id)
            ->select('shop_users.*')
            ->withUserName()
            ->withCreatedUser()
            ->withUpdatedUser()
            ->first();

        return view('myshop.users.edit', compact('shopUser', 'operateShopUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Myshop\Users\ShopUserOperateRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShopUserOperateRequest $request, $id)
    {
        $updatedShopUser = ShopUser::where('shop_users.id', $id)
            ->join('users', 'shop_users.user_id', '=', 'users.id')
            ->select(
                'shop_users.*',
                'users.id as user_id'
            )
            ->first();
        $shop = Session::get('Shop');
        $user = Session::get('User');

        if ($request->input('type', DB_SHOP_USERS_TYPE_ADMIN) != DB_SHOP_USERS_TYPE_ADMIN) {
            if ($updatedShopUser->user_id === $shop->response_user_id) {
                // 商店代表必须是管理员
                return back()
                    ->withInput()
                    ->withErrors([
                        'type'  => trans('error_messages.myshop.users.shop_response_user')
                    ]);
            } elseif ($updatedShopUser->type === DB_SHOP_USERS_TYPE_ADMIN
                && ShopUser::where('shop_id', $shop->id)->count() < 2) {
                // 公司管理员至少需要两个
                return back()
                    ->withInput()
                    ->withErrors([
                        'type'  => trans('error_messages.myshop.users.only_one_admin')
                    ]);
            }
        } elseif ($request->input('status', DB_SHOP_USERS_STATUS_INVALID)
            != DB_SHOP_USERS_STATUS_EFFECTIVE) {
            if ($updatedShopUser->user_id === $shop->response_user_id) {
                // 商店代表必须是管理员
                return back()
                    ->withInput()
                    ->withErrors([
                        'status'  => trans('error_messages.myshop.users.shop_response_user_effective')
                    ]);
            } elseif ($updatedShopUser->type === DB_SHOP_USERS_TYPE_ADMIN
                && ShopUser::where('shop_id', $shop->id)->count() < 2) {
                // 公司管理员至少需要两个
                return back()
                    ->withInput()
                    ->withErrors([
                        'status'  => trans('error_messages.myshop.users.need_one_effective_admin')
                    ]);
            }
        }

        $updatedShopUser->update([
            'type'  => (int)$request->input('type', DB_SHOP_USERS_TYPE_ADMIN),
            'email'  => $request->input('email'),
            'position'  => $request->input('position'),
            'status'  => (int)$request->input('status', DB_SHOP_USERS_TYPE_ADMIN),
            'updated_by'    => $user->id
        ]);

        $shopUser = Session::get('ShopUser');
        if ($shopUser->id === $updatedShopUser->id) {
            Session::put('ShopUser', $updatedShopUser);
        }

        Session::flash('success_messages', [trans('success_messages.myshop.users.updated_success')]);

        return redirect()->action('ShopUserController@show', ['id' => $updatedShopUser->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
