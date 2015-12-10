@extends ('app', ['title' => trans('pages.shops.goods.title.index'), 'id' => 'shop_goods', 'class' => 'shop-goods index', 'console' => '', 'mode' => '', 'name' => ''])

@section ('assets')
    @include ('shops.goods.assets')
@endsection


@section ('console')
    @include ('shops.goods.console')
@endsection

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.shops.goods.labels.index_panel_header', ['shop_name' => $shop->name]) }}</div>
                <div class="panel-body">
                    <div class="paginage text-center">
                        {!! $shopGoods->render() !!}
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th class="col-md-1"></th>
                            <th class="col-md-1 sort-able">{{ trans('database.goods.good_name') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.produce_companies.name') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.shop_goods.price') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.shop_goods.status') }}</th>
                            <th class="col-md-1">{{ trans('database.common.created_by') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.common.created_at') }}</th>
                            <th class="col-md-1">{{ trans('database.common.updated_by') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.common.updated_at') }}</th>
                        </tr>
                        @foreach ($shopGoods as $shopGoodKey => $shopGood)
                        <tr>
                            <td>{{ $shopGoodKey + 1 }}</td>
                            <td>
                                <a href="{{ action('ShopGoodController@show', ['shopId' => $shopGood->shop_id, 'shopGoodId' => $shopGood->id]) }}">{{ $shopGood->good_name }}</a>
                            </td>
                            <td>
                                @if (!is_null($shopGood->produce_company_id))
                                <a href="{{ action('ProduceCompanyController@show', ['produceCompanyId' => $shopGood->produce_company_id]) }}">{{ $shopGood->produce_company_name }}</a>
                                @else
                                {{ $shopGood->produce_company_name }}
                                @endif
                            </td>
                            <td>{{ $shopGood->price }}</td>
                            <td>
                                @if (array_key_exists($shopGood->status, trans('database.shop_goods.column_value.status')))
                                {{ trans('database.shop_goods.column_value.status.' . $shopGood->status) }}
                                @endif
                            </td>
                            <td>{{ $shopGood->created_user_uname }}</td>
                            <td>{{ isset($shopGood->created_at) ? $shopGood->created_at->format('Y/m/d H:i:s') : '' }}</td>
                            <td>{{ $shopGood->updated_user_uname }}</td>
                            <td>{{ isset($shopGood->updated_at) ? $shopGood->updated_at->format('Y/m/d H:i:s') : '' }}</td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="paginage text-center">
                        {!! $shopGoods->render() !!}
                    </div>
                    <div class="col-md-6 col-md-offset-2">
                        <a href="{{ action('ShopController@show', ['shopId' => $shop->id]) }}"><label class="btn btn-info">{{ trans('pages.shops.goods.buttons.back_shop_detail') }}</label></a>
                        @if (Auth::check())
                        <a href="{{ url('/shops/' . $shop->id . '/goods/create') }}"><label class="btn btn-info">{{ trans('pages.common.buttons.create') }}</label></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







@endsection