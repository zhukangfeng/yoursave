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
        $input['order'] = $request->input('order', []);
        $input['status'] = $request->input('status');
        $input['order_type'] = $request->input('order_type', []);
        $input['paginate'] = $request->input('paginate', Config::get('pages.good_kinds.index.default_show_number'));
        $input['name']  = $request->input('name');

        $query = GoodKind::searchQuery('good_kinds.name', $input['name'])
            ->select('good_kinds.*')
            ->withCreatedUser()
            ->withUpdatedUser()
            ->withParent();
            
        if ($input['status'] != '') {
            $query->where('good_kinds.status', $input['status']);
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
        $hasChildren = (int)$request->input('has_children', 1);
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

        GoodKind::create([
            'parent_id' => $hasParent ? $parentId : null,
            'has_children'  => $hasChildren,
            'name'  => $name,
            'kind_info' => $kindInfo,
            'status'    => $status,
            'created_by'    => $user->id,
            'updated_by'    => $user->id
        ]);

        Session::flash('success_messages', [trans('success_messages.good_kinds.created_success')]);

        return redirect('/good_kinds');
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

    /**
     * 商品名搜索
     *
     * @param Request
     * @return Json
     */
    public function search(Request $request)
    {
        $goodKindName = $request->input('good_kind_name');

        if ($goodKindName == '') {
            $goodKinds = GoodKind::whereNull('parent_id')
                ->where('has_children', 1)
                ->select('id', 'name')
                ->get();
        } else {
            $goodKinds = GoodKind::searchQuery('name', $goodKindName)
                ->where('has_children', 1)
                ->select('id', 'name')
                ->get();            
        }

        return $goodKinds->toJson();
    }
}
