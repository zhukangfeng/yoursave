@extends ('app', ['title' => trans('pages.myshop.title.show'), 'id' => 'shop_user', 'class' => 'myshop shop-user edit', 'console' => '', 'mode' => '', 'name' => ''])

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
                            <td>{{ $operateUser->fullname }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.shop_users.type') }}</th>
                            <td>{{ trans('database.shop_users.column_value.type.' . $operateUser->type) }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.shop_users.email') }}</th>
                            <td>{{ $operateUser->email }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.shop_users.position') }}</th>
                            <td>{{ $operateUser->position }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.shop_users.status') }}</th>
                            <td>{{ trans('database.shop_users.column_value.status.' . $operateUser->status) }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.created_by') }}</th>
                            <td>{{ $operateUser->created_user_fullname }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.created_at') }}</th>
                            <td>{{ $operateUser->created_at->format('Y/m/d H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.updated_by') }}</th>
                            <td>{{ $operateUser->updated_user_fullname }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.updated_at') }}</th>
                            <td>{{ $operateUser->updated_at->format('Y/m/d H:i:s') }}</td>
                        </tr>
                    </table>
                    <div class="col-md-6 col-md-offset-4">
                        @if ($shopUser->type === DB_SHOP_USERS_TYPE_ADMIN || $shopUser->id === $operateUser->id || $shopUser->type < $operateUser->type)
                        <label class="btn btn-primary"><a href="{{ action('ShopUserController@edit', ['id' => $operateUser->id]) }}">{{ trans('pages.common.buttons.edit') }}</a></label>
                        @endif
                        <label class="btn btn-info"><a href="{{ action('ShopUserController@index') }}">{{ trans('pages.common.buttons.back') }}</a></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection