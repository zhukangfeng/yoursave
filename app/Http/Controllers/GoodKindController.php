<?php
namespace App\Http\Controllers;

// Controllers
use App\Http\Controllers\Controller;

// Models
use App\Models\GoodKind;

// Request
use Illuminate\Http\Request;
use App\Http\Requests;

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
        $input['order_type'] = $request->input('order_type', []);
        $input['paginate'] = $request->input('paginate', Config::get('pages.good_kinds.index.default_show_number'));
        $input['name']  = $request->input('name');

        $goodKinds = GoodKind::searchQuery('good_kinds.name', $input['name'])
            ->select('good_kinds.*')
            ->withCreatedUser()
            ->withUpdatedUser()
            ->paginate($input['paginate']);

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
