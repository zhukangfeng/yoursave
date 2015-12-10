@extends ('app', ['title' => trans('pages.accounts.title.index'), 'id' => 'accounts', 'class' => 'accounts index', 'console' => '', 'mode' => '', 'name' => ''])

@section ('assets')
@include ('accounts.assets')
@endsection

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.accounts.labels.index_panel_header') }}</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th class="col-md-1"></th>
                            <th class="col-md-1 sort-able">{{ trans('pages.accounts.labels.account_type') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('pages.accounts.labels.allowed_name') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.shop_users.status') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.shop_users.type') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('pages.accounts.labels.inviting_user') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.common.created_at') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.common.updated_at') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('pages.accounts.labels.operating') }}</th>
                        </tr>
                        @foreach ($shopUsers as $shopUserKey => $shopUser)
                        <tr>
                            <td>{{ $shopUserKey + 1 }}</td>
                            <td>
                                <a href="{{ action('ShopUserController@show', ['shopId' => $shopUser->id]) }}">{{ trans('pages.accounts.labels.shop_account') }}</a></td>
                            <td>
                                <a href="{{ action('ShopController@show', ['id' => $shopUser->shop_id]) }}">{{ $shopUser->shop_name }}</a>
                            </td>
                            <td>
                                @if (array_key_exists($shopUser->status, trans('database.shop_users.column_value.status')))
                                {{ trans('database.shop_users.column_value.status.' . $shopUser->status) }}
                                @endif
                            </td>
                            <td>
                                @if (array_key_exists($shopUser->type, trans('database.shop_users.column_value.type')))
                                {{ trans('database.shop_users.column_value.type.' . $shopUser->type) }}
                                @endif
                            </td>
                            <td>{{ $shopUser->created_user_fullname }}</td>
                            <td>{{ isset($shopUser->created_at) ? $shopUser->created_at->format('Y/m/d H:i:s') : '' }}</td>
                            <td>{{ isset($shopUser->updated_at) ? $shopUser->updated_at->format('Y/m/d H:i:s') : '' }}</td>
                            <td class="account-operating">
                                @if ($shopUser->status === DB_SHOP_USERS_STATUS_REQUESTING)
                                    <form method="POST" action="{{ action('AccountController@accept') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="shop_user_id" value="{{ $shopUser->id }}">
                                        <div class="accept"><input type="submit" class="btn btn-default" value="{{ trans('pages.common.buttons.accept') }}"></div>
                                    </form>
                                @elseif ($shopUser->status === DB_SHOP_USERS_STATUS_EFFECTIVE)
                                    @if (Session::get('ShopUser') && Session::get('ShopUser')->id === $shopUser->id)
                                        <form method="POST" action="{{ action('AccountController@logout') }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="shop_user_id" value="{{ $shopUser->id }}">
                                            <div class="logout"><input type="submit" class="btn btn-default" value="{{ trans('pages.common.buttons.logout') }}"></div>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ action('AccountController@login') }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="shop_user_id" value="{{ $shopUser->id }}">
                                            <div class="login"><input type="submit" class="btn btn-default" value="{{ trans('pages.common.buttons.login') }}"></div>
                                        </form>
                                    @endif
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection