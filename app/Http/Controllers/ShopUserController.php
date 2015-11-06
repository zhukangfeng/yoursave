<?php
namespace App\Http\Controllers;

// Controllers
use App\Http\Controllers\Controller;

// Models
use App\Models\Shop;
use App\Models\ShopUser;

// Requests
use Illuminate\Http\Request;
use App\Http\Requests;

// Services
use Session;

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
        if ($shopUser->type === DB_SHOP_USERS_TYPE_ADMIN) {
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
                ->get();
        }

        return view('myshop.users.index', compact('shopUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
     * 显示职员详情
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shopUser = ShopUser::where('shop_users.id', $id)
            ->select('shop_users.*')
            ->withUserName()
            ->withCreatedUser()
            ->withUpdatedUser()
            ->first();

        return view('myshop.users.show', compact('shopUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shopUser = ShopUser::where('shop_users.id', $id)
            ->select('shop_users.*')
            ->withUserName()
            ->withCreatedUser()
            ->withUpdatedUser()
            ->first();

        return view('myshop.users.edit', compact('shopUser'));
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
