@extends ('app', ['title' => trans('pages.shops.goods.title.show'), 'id' => 'good', 'class' => 'shop-goods show', 'console' => '', 'mode' => '', 'name' => ''])

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.shops.goods.labels.show_panel_header') }}</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.goods.good_name') }}</th>
                            <td>
                                <a href="{{ action('GoodController@show', ['goodId' => $shopGood->id])}}">{{ $shopGood->good_name }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.shops.name') }}</th>
                            <td>
                                <a href="{{ action('ShopController@show', ['shopId' => $shopGood->shop_id])}}">{{ $shopGood->shop_name }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.produce_companies.name') }}</th>
                            <td>
                                <a href="{{ action('ProduceCompanyController@show', ['produceCompanyId' => $shopGood->produce_company_id])}}">{{ $shopGood->produce_company_name }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.shop_goods.price') }}</th>
                            <td>{{ $shopGood->price }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.currency') }}</th>
                            <td>
                                @if (array_key_exists($shopGood->currency, trans('database.common.column_value.currency')))
                                {{ trans('database.common.column_value.currency.' . $shopGood->currency) }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.shop_goods.good_info') }}</th>
                            <td>{{ $shopGood->good_info }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.goods.status') }}</th>
                            <td>
                                @if (array_key_exists($shopGood->status, trans('database.shop_goods.column_value.status')))
                                {{ trans('database.shop_goods.column_value.status.' . $shopGood->status) }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.created_by') }}</th>
                            <td>{{ $shopGood->created_user_uname }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.created_at') }}</th>
                            <td>
                                @if (!is_null($shopGood->created_at))
                                {{ $shopGood->created_at->format('Y/m/d H:i:s') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.updated_by') }}</th>
                            <td>{{ $shopGood->updated_user_uname }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.updated_at') }}</th>
                            <td>
                                @if (!is_null($shopGood->updated_at))
                                {{ $shopGood->updated_at->format('Y/m/d H:i:s') }}
                                @endif
                            </td>
                        </tr>
                        
                    </table>
                    <div class="col-md-6 col-md-offset-4">
                        <a href="{{ action('ShopGoodController@index', ['shopId' => $shopGood->shop_id]) }}"><span class="btn btn-info">{{ trans('pages.common.buttons.back_to_index') }}</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection