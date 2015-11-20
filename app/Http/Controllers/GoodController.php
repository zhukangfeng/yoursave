<?php
namespace App\Http\Controllers;

// Controllers
use App\Http\Controllers\Controller;

// Models
use App\Models\Good;
use App\Models\GoodKind;

// Requests
use App\Http\Requests;
use App\Http\Requests\Goods\GoodRequest;
use Illuminate\Http\Request;

// Services
use Config;
use DB;
use Session;

class GoodController extends Controller
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
        $input['status'] = $request->input('status');
        // 关键词搜索
        $input['name']  = $request->input('name');
        // 一页显示数目
        $input['paginate'] = $request->input('paginate', Config::get('pages.goods.index.default_show_number'));

        $query = Good::select('goods.*')
            ->withCreatedUser()
            ->withUpdatedUser()
            ->withGoodKind();

        if ($input['status'] != '') {
            // 物品状态
            $query->where('goods.status', $input['status']);
        }

        if ($input['name'] != '') {
            $query->searchQuery(['goods.good_name', 'goods.good_info'], $input['name']);
        }

        $goods = $query->paginate($input['paginate']);

        return view('goods.index', compact('goods', 'input'));
    }

    /**
     * 显示商品新建页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (old('good_kind')) {
            $goodKind = GoodKind::where('id', old('good_kind'))
                ->first();
        }
        return view('goods.create', compact('goodKind'));
    }

    /**
     * 保存新建的商品
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodRequest $request)
    {
        $goodKind = GoodKind::where('status', '!=', DB::raw(DB_GOOD_KINDS_STATUS_INVALID))
            ->where('id', $request->input('good_kind'))
            ->first();
        if (is_null($goodKind)) {
            return back()->withInput()->withErrors([
                'good_kind_error' => trans('error_messages.goods.good_kind_error')
            ]);
        }

        // 创建者
        $createType = $request->input('create_type');
        if ($createType == '1') {
            // 商店用户创建
            if (is_null(Session::get('ShopUser'))) {
                return back()->withInput()->withErrors([
                    'create_type' => trans('error_messages.goods.create_type_error')
                ]);
            }
            $status = DB_GOOD_KINDS_STATUS_CREATE_BY_SHOP_UNACTIVE;
        } elseif ($createType == '2') {
            // 生产厂家用户创建
            if (is_null(Session::get('ProduceCompanyUser'))) {
                return back()->withInput()->withErrors([
                    'create_type' => trans('error_messages.goods.create_type_error')
                ]);
            }
            $status = DB_GOOD_KINDS_STATUS_CREATE_BY_PRODUCE_COMPANY_UNACTIVE;
        } else {
            $status = DB_GOOD_KINDS_STATUS_CREATE_BY_USER_UNACTIVE;
        }

        $user = Session::get('User');
        $good = Good::create([
            'good_kind_id'  => $goodKind->id,
            'good_name'     => $request->input('good_name'),
            'good_info'     => $request->input('good_info'),
            'status'        => $status,
            'created_by'    => $user->id,
            'updated_by'    => $user->id
        ]);

        Session::flash('success_messages', [trans('success_messages.goods.created_success')]);

        return redirect()->action('GoodController@show', ['goodId' => $good->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $good = Good::where('goods.id', $id)
            ->select('goods.*')
            ->withCreatedUser()
            ->withUpdatedUser()
            ->withGoodKind()
            ->first();

        return view('goods.show', compact('good'));
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

    /**
     * 商品搜索
     *
     * @param Request $request
     * @return json
     */
    public function search(Request $request)
    {
        $goodName = $request->input('good_name');
        $goodKey = $request->input('good_key');

        $query = Good::where('goods.status', '!=', DB_COMMON_STATUS_INVALID);

        if ($goodName != '') {
            $query->searchQuery('goods.good_name', $goodName);
        }
        if ($goodKey != '') {
            $query->searchQuery([
                'goods.good_name',
                'goods.good_info'
            ], $goodKey);
        }

        return $query->select('goods.id', 'goods.good_name as name')
            ->get()
            ->toJson();
    }
}
