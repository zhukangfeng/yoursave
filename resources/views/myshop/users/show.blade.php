@extends ('app', ['title' => trans('pages.myshop.title.show'), 'id' => 'shop_user', 'class' => 'shop-user edit', 'console' => '', 'mode' => '', 'name' => ''])

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.myshop.users.labels.show_panel_header') }}</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th class="col-md-3 active">{{ trans('pages.common.labels.fullname') }}</th>
                            <td>{{ $shopUser->fullname }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.shop_users.type') }}</th>
                            <td>{{ trans('database.shop_users.column_value.type.' . $shopUser->type) }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.shop_users.email') }}</th>
                            <td>{{ $shopUser->email }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.shop_users.position') }}</th>
                            <td>{{ $shopUser->position }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.shop_users.status') }}</th>
                            <td>{{ trans('database.shop_users.column_value.status.' . $shopUser->status) }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.created_by') }}</th>
                            <td>{{ $shopUser->created_user_fullname }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.created_at') }}</th>
                            <td>{{ $shopUser->created_at->format('Y/m/d H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.updated_by') }}</th>
                            <td>{{ $shopUser->updated_user_fullname }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.updated_at') }}</th>
                            <td>{{ $shopUser->updated_at->format('Y/m/d H:i:s') }}</td>
                        </tr>
                    </table>
                    <div class="col-md-6 col-md-offset-4">
                        @if (Session::get('ShopUser')->type === DB_SHOP_USERS_TYPE_ADMIN)
                        <label class="btn btn-primary"><a href="{{ action('ShopUserController@edit', ['id' => $shopUser->id]) }}">{{ trans('pages.common.buttons.edit') }}</a></label>
                        @endif
                        <label class="btn btn-info"><a href="{{ action('ShopUserController@index') }}">{{ trans('pages.common.buttons.back') }}</a></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection