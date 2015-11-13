<?php
namespace App\Http\Controllers;

// Controllers
use App\Http\Controllers\Controller;

// Models
use App\Models\ProduceCompany;
use App\Models\ShopUser;

// Requests
use App\Http\Requests;
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
     * @return \Illuminate\Http\Response
     */
    public function accept()
    {
        //
    }
    /**
     * 受邀账号登录
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        //
    }
    /**
     * 受邀账号登出
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        //
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
