@extends ('app', ['title' => trans('pages.myshop.users.title.index'), 'id' => 'shop', 'class' => 'myshop shop-user index', 'console' => '', 'mode' => '', 'name' => ''])

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.myshop.users.labels.show_panel_header') }}</div>
                <div class="panel-body">
                    <div>
                        {!! $shopUsers->render() !!}
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th class="col-md-1"></th>
                            <th class="col-md-1">{{ trans('pages.common.labels.fullname') }}</th>
                            <th class="col-md-1">{{ trans('database.shop_users.email') }}</th>
                            <th class="col-md-1">{{ trans('database.shop_users.position') }}</th>
                            <th class="col-md-1">{{ trans('database.shop_users.status') }}</th>
                            <th class="col-md-1">{{ trans('database.common.created_by') }}</th>
                            <th class="col-md-1">{{ trans('database.common.created_at') }}</th>
                            <th class="col-md-1">{{ trans('database.common.updated_by') }}</th>
                            <th class="col-md-1">{{ trans('database.common.updated_at') }}</th>
                        </tr>
                        @foreach ($shopUsers as $shopUserKey => $shopUser)
                        <tr>
                            <td>{{ $shopUserKey + 1 }}</td>
                            <td>
                                <a href="{{ action('ShopUserController@show', ['id' => $shopUser->id]) }}">{{ $shopUser->fullname }}</a>
                            </td>
                            <td>{{ $shopUser->email }}</td>
                            <td>{{ $shopUser->position }}</td>
                            <td>{{ trans('database.shop_users.column_value.status.' . $shopUser->status) }}</td>
                            <td>{{ $shopUser->created_user_fullname }}</td>
                            <td>{{ $shopUser->created_at->format('Y/m/d H:i:s') }}</td>
                            <td>{{ $shopUser->updated_user_fullname }}</td>
                            <td>{{ $shopUser->updated_at->format('Y/m/d H:i:s') }}</td>
                        </tr>

                        @endforeach
                    </table>
                    <div>
                        {!! $shopUsers->render() !!}
                    </div>
                    <div class="col-md-6 col-md-offset-2">
                        @if (Session::get('ShopUser')->type !== DB_SHOP_USERS_TYPE_GUEST)
                        <label class="btn btn-info"><a href="{{ action('ShopUserController@create') }}">{{ trans('pages.common.buttons.create') }}</a></label>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







@endsection