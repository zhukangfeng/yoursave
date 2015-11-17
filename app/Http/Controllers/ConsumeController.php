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
        $input['order'] = $request->input('order', []);
        $input['order_type'] = $request->input('order_type', []);

        // 商品状态
        $input['status'] = $request->input('status');
        // 关键词搜索
        $input['key']  = $request->input('key');
        // 一页显示数目
        $input['paginate'] = $request->input('paginate', Config::get('pages.consumes.index.default_show_number'));

        $user = Session::get('User');

        $consumes = Consume::where('user_id', $user->id)
            ->ofCandition($input)->paginate($input['paginate']);

        return $consumes;
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
