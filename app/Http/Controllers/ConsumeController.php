<?php
namespace App\Http\Controllers;

// Controller
use App\Http\Controllers\Controller;

// Models
use App\Models\Consume;
use App\Models\Good;
use App\Models\Shop;
use App\Models\ShopGood;

// Requests
use App\Http\Requests;
use App\Http\Requests\Consumes\ConsumeRequest;
use Illuminate\Http\Request;

// Services
use Config;
use Session;

class ConsumeController extends Controller
{
    /**
     * 消费一览
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input  = [];
        // 排序
        $order = $request->input('order', []);
        if (count($order) > 0) {
            $input['order'] = [];
            $input['order_type'] = [];
            foreach ($order as $orderKey => $orderValue) {
                $input['order'][$orderKey] = $orderValue;
                $orderType = $request->input('order_type.' . $orderKey);
                if ($orderKey) {
                    $input['order_type'][$orderKey] = '1';  // 升序
                } else {
                    $input['order_type'][$orderKey] = '0';  // 降序
                }
            }
        }

        // 商品状态
        $status = $request->input('status');
        if ($status != '') {
            $input['status'] = $status;
        }
        // 消费名搜索
        $name = $request->input('name');
        if ($name != '') {
            $input['name'] = $name;
        }

        // 商品名
        $goodName = $request->input('good_name');
        if ($goodName != '') {
            $input['good_name'] = $goodName;
        }

        // 商店名
        $shopName = $request->input('shop_name');
        if ($shopName != '') {
            $input['shop_name'] = $shopName;
        }
        // 一页显示数目
        $input['paginate'] = $request->input('paginate', Config::get('pages.consumes.index.default_show_number'));

        $user = Session::get('User');

        $consumes = Consume::where('user_id', $user->id)
            ->ofCandition($input)->paginate($input['paginate']);

        return view('consumes.index', compact('consumes', 'input'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (old('good_id')) {
            $good = Good::find(old('good_id'));
        }
        if (old('shop_id')) {
            $shop = Shop::withEffective()
                ->find(old('shop_id'));
        }

        return view('consumes.create', compact('good', 'shop'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Consumes\ConsumeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsumeRequest $request)
    {
        $goodId = $request->input('good_id');
        $shopId = $request->input('shop_id');

        // 系统内商品
        if (!is_null($goodId)) {
            $good = Good::where('id', $goodId)
                ->withEffective()
                ->first();
            if (is_null($good)) {
                $goodName = $request->input('good_name');
                $goodId = null;
            } else {
                $goodName = $good->good_name;
            }
        } else {
            $goodName = $request->input('good_name');
        }
        // 系统内登录的商店
        if (!is_null($shopId)) {
            $shop = Shop::where('id', $shopId)
                ->withEffective()
                ->first();
            if (is_null($shop)) {
                $shopName = $request->input('shop_name');
                $shopId = null;
            } else {
                $shopName = $shop->name;
            }
        } else {
            $shopName = $request->input('shop_name');
        }
        // 商店内的商品
        if (!is_null($goodId) && !is_null($shopId)) {
            $shopGood = ShopGood::where('shop_id', $shopId)
                ->where('good_id', $goodId)
                ->first();
            if (is_null($shopGood)) {
                $shopGoodId = null;
            } else {
                $shopGoodId = $shopGood->id;
            }
        } else {
            $shopGoodId = null;
        }

        $consume = Consume::create([
            'user_id'   => Session::get('User')->id,
            'good_id'   => $goodId,
            'good_name' => $goodName,
            'shop_id'   => $shopId,
            'shop_name' => $shopName,
            'shop_good_id'  => $shopGoodId,
            'consume_name'  => $request->input('consume_name'),
            'consume_cost'  => ($request->input('consume_cost') == '' ? null : $request->input('consume_cost')),
            'consume_info'  => $request->input('consume_info'),
            'consume_time'  => $request->input('consume_time'),
            'place'         => $request->input('consume_place')
        ]);

        return redirect()->action('ConsumeController@show', ['consumeId' => $consume->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, ConsumeRequest $request)
    {
        $consume = Consume::where('user_id', Session::get('User')->id)
            ->where('id', $id)
            ->first();

        if (is_null($consume)) {
            return redirect()->action('ConsumeController@index');
        }
        return view('consumes.show', compact('consume'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, ConsumeRequest $request)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConsumeRequest $request, $id)
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
