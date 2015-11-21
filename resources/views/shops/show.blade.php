@extends ('app', ['title' => trans('pages.shops.title.show'), 'id' => 'shop', 'class' => 'shops show', 'console' => '', 'mode' => '', 'name' => ''])

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.shops.labels.show_panel_header') }}</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.shops.name') }}</th>
                            <td>{{ $shop->name }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.shops.address') }}</th>
                            <td>{{ $shop->address }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.shops.phone_num') }}</th>
                            <td>{{ $shop->phone_num }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.shops.contact_mail') }}</th>
                            <td>{{ $shop->contact_mail }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.shops.web_addr') }}</th>
                            <td>
                                @if ($shop->web_addr)
                                <a href="{{ $shop->web_addr }}" target="_blank">{{ $shop->web_addr }}</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.shops.shop_info') }}</th>
                            <td>{{ $shop->shop_info }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('pages.common.labels.response_user_name') }}</th>
                            <td>{{ $shop->response_user_uname }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.shops.status') }}</th>
                            <td>
                                {{ trans('database.shops.column_value.status.' . $shop->status) }}
                                @if ($shop->status === DB_SHOPS_STATUS_UNAUTHENTICATED)
                                    <a href="{{ action('ShopAuthenticateController@index', ['shopId' => $shop->id]) }}"><label class="btn btn-default active">{{ trans('pages.shops.buttons.authenticate') }}</label></a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.public_type') }}</th>
                            <td>{{ trans('database.common.column_value.public_type.' . $shop->public_type) }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.created_at') }}</th>
                            <td>{{ $shop->created_at->format('Y/m/d H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.created_by') }}</th>
                            <td>{{ $shop->created_user_uname }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.updated_at') }}</th>
                            <td>{{ $shop->updated_at->format('Y/m/d H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.updated_by') }}</th>
                            <td>{{ $shop->updated_user_uname }}</td>
                        </tr>
                        
                    </table>
                    <div class="col-md-6 col-md-offset-4">
                        <a href="{{ action('ShopController@index') }}"><label class="btn btn-info">{{ trans('pages.common.buttons.back_to_list') }}</label></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection