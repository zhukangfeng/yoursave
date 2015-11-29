@extends ('app', ['title' => trans('pages.shops.title.index'), 'id' => 'shops', 'class' => 'shops index', 'console' => '', 'mode' => '', 'name' => ''])

@section ('assets')
    @include ('shops.assets')
@endsection


@section ('console')
    @include ('shops.console')
@endsection

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.shops.labels.index_panel_header') }}</div>
                <div class="panel-body">
                    <div class="paginage text-center">
                        {!! $shops->render() !!}
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th class="col-md-1"></th>
                            <th class="col-md-1 sort-able">{{ trans('database.shops.name') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('pages.shops.labels.shop_goods') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.shops.address') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.shops.status') }}</th>
                            <th class="col-md-1">{{ trans('pages.common.labels.response_user_name') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.common.created_at') }}</th>
                            <th class="col-md-1">{{ trans('database.common.created_by') }}</th>
                        </tr>
                        @foreach ($shops as $shopKey => $shop)
                        <tr>
                            <td>{{ $shopKey + 1 }}</td>
                            <td>
                                <a href="{{ action('ShopController@show', ['id' => $shop->id]) }}">{{ $shop->name }}</a>
                            </td>
                            <td><a href="{{ action('ShopGoodController@index', ['shopId' => $shop->id]) }}">{{ trans('pages.shops.buttons.shop_goods') }}</a></td>
                            <td>{{ $shop->address }}</td>
                            <td>{{ trans('database.shops.column_value.status.' . $shop->status) }}</td>
                            <td>{{ $shop->response_user_uname }}</td>
                            <td>{{ isset($shop->created_at) ? $shop->created_at->format('Y/m/d H:i:s') : '' }}</td>
                            <td>{{ $shop->created_user_name }}</td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="paginage text-center">
                        {!! $shops->render() !!}
                    </div>
                    @if (Auth::check())
                    <div class="col-md-6 col-md-offset-2">
                        <a href="{{ action('ShopController@create') }}"><label class="btn btn-info">{{ trans('pages.common.buttons.create') }}</label></a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>







@endsection