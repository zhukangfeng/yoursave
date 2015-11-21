<?php
namespace App\Http\Controllers;

// Controllers
use App\Http\Controllers\Controller;

// Models
use App\Models\Shop;
use App\Models\ShopUser;

// Requests
use App\Http\Requests\Shops\ShopRequest;

// Services
use App\Http\Requests;
use Config;
use Illuminate\Http\Request;
use Session;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input  = [];
        // 排序
        $input['order'] = $request->input('order', []);
        $input['order_type'] = $request->input('order_type', []);

        // 商品状态
        $status = $request->input('status');
        if (!is_null($status)) {
            $input['status'] = $status;
        }
        // 关键词搜索
        $shopKey = $request->input('key');
        if (!is_null($shopKey)) {
            $input['key'] = $shopKey;
        }
        // 一页显示数目
        $paginate = $request->input('paginate', Config::get('pages.shops.index.default_show_number'));
        if ($paginate != Config::get('pages.shops.index.default_show_number')) {
            $input['paginate'] = $paginate;
        }
        $shops = Shop::select('shops.*')
            ->ofCandition($input)
            ->ofEffective()
            ->withCreatedUser()
            ->withResponsedUser()
            ->paginate($paginate);

        $shops->appends($input);

        return view('shops.index', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ShopRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShopRequest $request)
    {
        $user = Session::get('User');
        if ($request->input('create_type')) {
            $responseUserId = $user->id;
        } else {
            $responseUserId = null;
        }

        $shop = Shop::create([
            'name'  => $request->input('name'),
            'address'   => $request->input('address'),
            'phone_num' => $request->input('phone_num'),
            'contact_mail'  => $request->input('contact_mail'),
            'web_addr'  => $request->input('web_addr'),
            'shop_info' => $request->input('shop_info'),
            'response_user_id'  => $responseUserId,
            'status'        => DB_SHOPS_STATUS_UNAUTHENTICATED,
            'public_type'   => $request->input('public_type'),
            'currency'      => $request->input('currency'),
            'created_by'    => $user->id,
            'updated_by'    => $user->id,
        ]);

        Session::flash('success_messages', [trans('success_messages.shops.created_success')]);

        return redirect()->action('ShopController@show', ['shopId' => $shop->id]);
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
                ->withCreatedUser()
                ->withUpdatedUser()
                ->withResponsedUser()
                ->first();

            return view('shops.show', compact('shop'));
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
            ->where('shop_users.status', DB_SHOP_USERS_STATUS_EFFECTIVE)
            ->withUserName()
            ->get();

        return view('myshop.edit', compact('shop', 'adminUsers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ShopRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShopRequest $request)
    {
        $myshop = Session::get('Shop');
        $user = Session::get('User');

        $shop = Shop::find($myshop->id);
        $shop->update([
            'name'  => $request->input('name'),
            'address'   => $request->input('address'),
            'phone_num' => $request->input('phone_num'),
            'contact_mail'  => $request->input('contact_mail'),
            'web_addr'  => $request->input('web_addr'),
            'shop_info' => $request->input('shop_info'),
            'response_user_id'
                => $request->input('response_user') ? $request->input('response_user') : $shop->response_user_id,
            'public_type'   => $request->input('public_type'),
            'currency'      => $request->input('currency'),
            'created_by'    => $user->id
        ]);

        Session::flash('success_messages', [trans('success_messages.myshop.updated_success')]);
        return redirect('/myshop');
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

    /**
     * 商店搜索
     *
     * @param Request $request
     * @return json
     */
    public function search(Request $request)
    {
        $shopName = $request->input('shop_name');
        $shopKey = $request->input('key');
        $shopStatus = $request->input('shop_status');

        $query = Shop::where('shops.status', '!=', DB_SHOPS_STATUS_INVALID)
            ->where('shops.public_type', '!=', DB_COMMON_PUBLIC_TYPE_NO);

        if ($shopName != '') {
            $query->searchQuery('shops.name', $shopName);
        }
        if ($shopKey != '') {
            $query->searchQuery([
                'shops,name',
                'shops.shop_info'
            ], $shopKey);
        }

        return $query->select('shops.id as id', 'shops.name as name')
            ->get()
            ->toJson();

    }
}
