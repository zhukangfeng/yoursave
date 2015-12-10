<?php
namespace App\Http\Controllers;

// Models
use App\Models\Shop;
use App\Models\ShopGood;

// Controllers
use App\Http\Controllers\Controller;

// Requests
use App\Http\Requests;

// Services
use Config;
use Illuminate\Http\Request;

class ShopGoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($shopId = null, Request $request)
    {
        $input  = [];
        // 排序
        $input['order'] = $request->input('order', []);
        $input['order_type'] = $request->input('order_type', []);

        // 商品状态
        $status = $request->input('status');
        if ($status != '') {
            $input['status'] = $status;
        }
        // 关键词搜索
        $key = $request->input('key');
        if ($key != '') {
            $input['key'] = urldecode($key);
        }
        // 商店名
        $shopName = $request->input('shop_name');
        if ($shopName != '') {
            $input['shop_name'] = urldecode($shopName);
        }
        // 生产厂家名称
        $produceCompanyName = $request->input('produce_company_name');
        if ($produceCompanyName != '') {
            $input['produce_company_name'] = urldecode($produceCompanyName);
        }
        // 一页显示数目
        $paginate = $request->input('paginate', Config::get('pages.goods.index.default_show_number'));
        if ($paginate != Config::get('pages.goods.index.default_show_number')) {
            $input['paginate'] = $paginate;
        }

        if (is_null($shopId)) {
            // 自己商店商品显示
        } else {
            $shop = Shop::find($shopId);
            $shopGoods = ShopGood::where('shop_goods.shop_id', $shopId)
                ->select('shop_goods.*')
                ->ofCandition($input)
                ->withCreatedUser()
                ->withUpdatedUser()
                ->withShop()
                ->withProduceCompany()
                ->withGood()
                ->paginate($paginate);

            $shopGoods->appends($input);

            return view('shops.goods.index', compact('shopGoods', 'shop'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param string $shopId
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create($shopId = null, Request $request)
    {
        if (old('good')) {
            $good = Good::where('id', old('good'))
                ->where('status', '!=', DB_GOOD_STATUS_INVALID)
                ->first();
        }
        if (old('produce_company')) {
            $produceCompany = ProduceCompany::where('id', old('produce_company'))
                ->where('status', '!=', DB_PRODUCE_COMPANYS_STATUS_INVALID)
                ->first();
        }

        return view('shops.goods.create', compact('shopId', 'good', 'shopGood'));
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
    public function show($shopId = null, $shopGoodId)
    {
        $query = ShopGood::where('shop_goods.id', $shopGoodId);
        if (!is_null($shopId)) {
            $query->where('shop_goods.shop_id', $shopId);
        }

        $shopGood = $query->select('shop_goods.*')
            ->withGood()
            ->withShop()
            ->withProduceCompany()
            ->withCreatedUser()
            ->withUpdatedUser()
            ->first();

        return view('shops.goods.show', compact('shopGood'));
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
