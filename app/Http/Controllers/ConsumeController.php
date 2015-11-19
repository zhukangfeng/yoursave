<?php
namespace App\Http\Controllers;

// Controller
use App\Http\Controllers\Controller;

// Models
use App\Models\Consume;

// Requests
use App\Http\Requests;
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
