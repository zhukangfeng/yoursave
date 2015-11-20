<?php
namespace App\Http\Controllers;

// Controllers
use App\Http\Controllers\Controller;

// Models
use App\Models\GoodKind;

// Request
use App\Http\Requests;
use App\Http\Requests\GoodKinds\GoodKindRequest;
use Illuminate\Http\Request;

// Services
use Config;
use DB;
use Session;

class GoodKindController extends Controller
{
    /**
     * 商品分类一览
     *
     * @param Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input  = [];
        // 排序
        $input['order'] = $request->input('order', []);
        $input['order_type'] = $request->input('order_type', []);

        // 状态
        $input['status'] = $request->input('status');
        // 显示页书
        $input['paginate'] = $request->input('paginate', Config::get('pages.good_kinds.index.default_show_number'));
        // 关键词搜索
        $input['name']  = $request->input('name');

        $query = GoodKind::searchQuery(['good_kinds.name', 'good_kinds.kind_info'], $input['name'])
            ->select('good_kinds.*')
            ->withCreatedUser()
            ->withUpdatedUser()
            ->withParent();
            
        if ($input['status'] != '') {
            $query->where('good_kinds.status', $input['status']);
        }
        $parentId = $request->input('parent_id');
        if (!is_null($parentId)) {
            $input['parent_id'] = $parentId;
            $query->where('good_kinds.parent_id', $parentId);
        }

        $goodKinds = $query->paginate($input['paginate']);

        $goodKinds->appends($input);

        return view('good_kinds.index', compact('goodKinds', 'input'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('good_kinds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodKindRequest $request)
    {
        $hasParent = (bool)$request->input('has_parent', false);
        $canHasChildren = (int)$request->input('can_has_children', 1);
        $name = $request->input('name');
        $kindInfo = $request->input('kind_info');

        $parentId = $request->input('parent');

        if (Session::get('ShopUser')) {
            $status = DB_GOOD_KINDS_STATUS_CREATE_BY_SHOP_UNACTIVE;
        } elseif (Session::get('ProduceCompanyUser')) {
            $status = DB_GOOD_KINDS_STATUS_CREATE_BY_PRODUCE_COMPANY_UNACTIVE;
        } else {
            $status = DB_GOOD_KINDS_STATUS_CREATE_BY_USER_UNACTIVE;
        }

        $user = Session::get('User');

        $goodKind = GoodKind::create([
            'parent_id' => $hasParent ? $parentId : null,
            'can_has_children'  => $canHasChildren,
            'name'  => $name,
            'kind_info' => $kindInfo,
            'status'    => $status,
            'created_by'    => $user->id,
            'updated_by'    => $user->id
        ]);

        Session::flash('success_messages', [trans('success_messages.good_kinds.created_success')]);

        return redirect()->action('GoodKindController@show', ['goodKindId' => $goodKind->id]);
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
        $goodKind = GoodKind::where('good_kinds.id', $id)
            ->select('good_kinds.*')
            ->withCreatedUser()
            ->withUpdatedUser()
            ->withParent('parent_good_kinds')
            ->first();

        return view('good_kinds.show', compact('goodKind'));
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
     * 商品名搜索
     *
     * @param Request
     * @return Json
     */
    public function search(Request $request)
    {
        $goodKindName = $request->input('good_kind_name');
        // 种类关键词搜索
        $goodKindKey = $request->input('good_kind_key');
        // 商品状态
        $status = $request->input('good_kind_status');
        // 是否可以含有子类
        $canHasChildren = $request->input('can_has_children');
        // 是否有父种类
        $hasParent = $request->input('has_parent');
        // 父类名称搜索
        $parentName = $request->input('parent_good_kind_name');
        // 父分类关键词搜索
        $parentKey = $request->input('parent_good_kind_key');
        // 是否有子种类
        $hasChildren = $request->input('has_children');
        // 子类名字
        $childrenName = $request->input('child_good_kind_name');
        // 子类关键词
        $childrenKey = $request->input('child_good_kind_key');
        // 种类名字搜索

        $query = GoodKind::select([
            'good_kinds.id AS id',
            'good_kinds.name AS name'
        ]);

        // 姓名搜索
        if ($goodKindName != '') {
            $query = GoodKind::searchQuery('good_kinds.name', $goodKindName);
        }

        // 商品关键词搜索
        if ($goodKindKey != '') {
            $query = GoodKind::searchQuery([
                'good_kinds.name',
                'good_kinds.kind_info'
            ], $goodKindKey);
        }

        // 商品分类状态
        if (!is_null($status)) {
            if (is_array($status)) {
                $query->whereIn('good_kinds.status', $status);
            } else {
                $query->where('good_kinds.status', $status);
            }
        } else {
            $query->where('good_kinds.status', '!=', DB::raw(DB_GOOD_KINDS_STATUS_INVALID));
        }

        // 是否可以有子类
        if (!is_null($canHasChildren)) {
            $query->where('good_kinds.can_has_children', DB::raw((bool)$canHasChildren));
        }

        // 是否有父分类
        if (!is_null($hasParent)) {
            if ((bool)$hasParent) {
                $query->searchQuery('good_kinds.parent_id');
            } else {
                $query->whereNull('good_kinds.parent_id');
            }
        }

        // 父类条件
        if ($parentName != '' || $parentKey != '') {
            $lineTmp = __LINE__;
            $query->join(
                'good_kinds AS good_kinds_' . $lineTmp,
                'good_kinds.parent_id',
                'good_kinds_' . $lineTmp . '.id'
            )
                ->whereNull('good_kinds_' . $lineTmp . '.deleted_at');

            if ($parentName != '') {
                $query->searchQuery('good_kinds_' . $lineTmp . '.name', $parentName);
            }
            // 父类关键词搜索
            if ($parentKey != '') {
                $query->searchQuery([
                    'good_kinds_' . $lineTmp . 'name',
                    'good_kinds_' . $lineTmp . 'kind_info'
                ], $parentKey);
            }
        }

        // 子分类条件
        if (!is_null($hasChildren)
            || $childrenName != ''
            || $childrenKey != '') {
            $lineTmp = __LINE__;
            $query->join(
                'good_kinds AS good_kinds_' . $lineTmp,
                'good_kinds.id',
                '=',
                'good_kinds_' . $lineTmp . '.parent_id'
            );
            // 是否有子类
            if (!is_null($hasChildren)) {
                if ((bool)$hasChildren) {
                    $query->whereNotNull('good_kinds_' . $lineTmp . '.id');
                } else {
                    $query->whereNull('good_kinds_' . $lineTmp . '.id');
                }
            }
            // 子类姓名
            if ($childrenName != '') {
                $query->searchQuery('good_kinds_' . $lineTmp . '.name', $childrenName);
            }
            // 子分类关键词
            if ($childrenKey != '') {
                $query->searchQuery('good_kinds_' . $lineTmp . '.name', $childrenName);
            }
        }

        return $query->get()->toJson();
    }
}
