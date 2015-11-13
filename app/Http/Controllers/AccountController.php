<?php
namespace App\Http\Controllers;

// Controllers
use App\Http\Controllers\Controller;

// Models
use App\Models\ProduceCompanyUser;
use App\Models\ShopUser;

// Requests
use App\Http\Requests;
use App\Http\Requests\Accounts\AccountRequest;
use Illuminate\Http\Request;

// Services
use Session;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Session::get('User');

        $shopUsers = ShopUser::where('shop_users.user_id', $user->id)
            ->select('shop_users.*')
            ->withCreatedUser()
            ->withUpdatedUser()
            ->withShop()
            ->get();

        return view('accounts.index', compact('shopUsers'));
    }

    /**
     * 接受受邀账号
     *
     * @param AccountRequest $request
     * @return \Illuminate\Http\Response
     */
    public function accept(AccountRequest $request)
    {
        $user = Session::get('User');

        $shopUserId = $request->input('shop_user_id');
        $produceCompanyUserId = $request->input('produce_company_user_id');

        if (!is_null($shopUserId)) {
            ShopUser::where('id', $shopUserId)
                ->where('user_id', $user->id)
                ->where('status', DB_SHOP_USERS_STATUS_REQUESTING)
                ->update([
                    'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE
                ]);
        }

        if (!is_null($produceCompanyUserId)) {
            produceCompanyUser::where('id', $produceCompanyUserId)
                ->where('user_id', $produceCompanyUserId)
                ->where('status', DB_PRODUCE_COMPANY_USERS_STATUS_REQUESTING)
                ->update([
                    'status'    => DB_PRODUCE_COMPANY_USERS_STATUS_EFFECTIVE
                ]);
        }

        Session::flash('success_messages', [trans('success_messages.accounts.accepted_success')]);

        return redirect()->action('AccountController@index');
    }
    /**
     * 受邀账号登录
     *
     * @param AccountRequest $request
     * @return \Illuminate\Http\Response
     */
    public function login(AccountRequest $request)
    {
        $shopUserId = $request->input('shop_user_id');
        $produceCompanyUserId = $request->input('produce_company_user_id');

        $successMessages = [];
        $errorMessages = [];

        if (!is_null($shopUserId)) {
            $shopUser = ShopUser::find($shopUserId);
            if ($shopUser->status === DB_SHOP_USERS_STATUS_EFFECTIVE) {
                Session::put('ShopUser', $shopUser);
                Session::put('Shop', $shopUser->shop);
                $successMessages[] = trans('success_messages.accounts.logined_success');
            } elseif ($shopUser->status === DB_SHOP_USERS_STATUS_REQUESTING) {
                $errorMessages[] = trans('error_messages.accounts.account_need_accept');
            } else {
                $errorMessages[] = trans('error_messages.accounts.account_invalid');
            }
        }

        if (!is_null($produceCompanyUserId)) {
            $produceCompanyUser = ProduceCompanyUser::find($produceCompanyUserId);
            if ($produceCompanyUser->status === DB_PRODUCE_COMPANY_USERS_STATUS_EFFECTIVE) {
                Session::put('ProduceCompanyUser', $produceCompanyUser);
                Session::put('produceCompany', $produceCompanyUser->produceCompany);
                $successMessages[] = trans('success_messages.accounts.logined_success');
            } elseif ($produceCompanyUser->status === DB_PRODUCE_COMPANY_USERS_STATUS_REQUESTING) {
                $errorMessages[] = trans('error_messages.accounts.account_need_accept');
            } else {
                $errorMessages[] = trans('error_messages.accounts.account_invalid');
            }
        }

        if (count($successMessages) > 0) {
            Session::flash('success_messages', $successMessages);
        }
        if (count($errorMessages) > 0) {
            Session::flash('error_messages', $errorMessages);
        }

        return redirect()->action('AccountController@index');
    }
    /**
     * 受邀账号登出
     *
     * @param AccountRequest $request
     * @return \Illuminate\Http\Response
     */
    public function logout(AccountRequest $request)
    {
        $shopUserId = $request->input('shop_user_id');
        $produceCompanyUserId = $request->input('produce_company_user_id');

        $shopUser = Session::get('ShopUser');
        if ($shopUser && $shopUser->id == $shopUserId) {
            Session::forget('ShopUser');
            Session::forget('Shop');

            Session::flash('success_messages', [trans('success_messages.accounts.logout_success')]);
        }

        $produceCompanyUser = Session::get('produceCompanyUser');
        if ($produceCompanyUser && $produceCompanyUser->id == $produceCompanyUserId) {
            Session::forget('produceCompanyUser');
            Session::forget('produceCompany');

            Session::flash('success_messages', [trans('success_messages.accounts.logout_success')]);            
        }

        return redirect()->action('AccountController@index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
