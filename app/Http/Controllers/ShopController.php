<?php
namespace App\Http\Controllers;

// Controllers
use App\Http\Controllers\Controller;

// Models
use App\Models\Shop;
use App\Models\ShopUser;

// Services
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop = Session::get('Shop');
        var_dump($shop);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        if (is_null($id)) {
            // 公司职员查看公司信息
            $myshop = Session::get('Shop');
            $shop = Shop::where('shops.id', $myshop->id)
                ->select('shops.*')
                ->withCreatedUser()
                ->withUpdatedUser()
                ->withResponsedUser()
                ->first();

            return view('myshop.show', compact('shop'));
        } else {
            $shop = Shop::where('shops.id', $id)
                ->select('shops.*')
                ->first();
        }
    }

    /**
     * 商店管理员管理商店信息
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $myshop = Session::get('Shop');
        $shop = Shop::where('shops.id', $myshop->id)
            ->select('shops.*')
            ->withCreatedUser()
            ->withUpdatedUser()
            ->withResponsedUser()
            ->first();

        $adminUsers = ShopUser::where('shop_users.shop_id', $shop->id)
            ->where('shop_users.type', DB_SHOP_USERS_TYPE_ADMIN)
            ->withUserName()
            ->get();

        return view('myshop.edit', compact('shop', 'adminUsers'));
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
