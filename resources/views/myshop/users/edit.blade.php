@extends ('app', ['title' => trans('pages.myshop.users.title.edit'), 'id' => 'myshop_user', 'class' => 'myshop shop-user edit', 'console' => '', 'mode' => '', 'name' => ''])

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.myshop.users.labels.edit_panel_header') }}</div>
                <div class="panel-body">
                    <div class="data-form">
                        <div class="form-data">
                            <form class="form-horizontal" role="form" method="POST" action="{{ action('ShopUserController@update', ['id' => $operateShopUser->id]) }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group active">
                                    <label class="col-md-3 control-label">{{ trans('pages.common.labels.fullname') }}</label>
                                    <div class="col-md-8">
                                        <label>{{ $operateShopUser->fullname }}</label>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-md-3 control-label">{{ trans('database.shop_users.type') }}</label>
                                    <div class="col-md-8">
                                        <select name="type">
                                            @if ($shopUser->type === DB_SHOP_USERS_TYPE_ADMIN || $shopUser->id === $operateShopUser->id)
                                                @foreach (trans('database.shop_users.column_value.type') as $userTypeKey => $userType)
                                                    @if ($userTypeKey >= $shopUser->type)
                                                        <option value="{{ $userTypeKey }}" {{ old('type', $operateShopUser->type) == $userTypeKey ? 'selected' : '' }}>{{ $userType }}</option>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach (trans('database.shop_users.column_value.type') as $userTypeKey => $userType)
                                                    @if ($userTypeKey > $shopUser->type)
                                                        <option value="{{ $userTypeKey }}" {{ old('type', $operateShopUser->type) == $userTypeKey ? 'selected' : '' }}>{{ $userType }}</option>
                                                    @endif
                                            @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('type'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('type') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group active">
                                    <label class="col-md-3 control-label">{{ trans('database.shop_users.email') }}</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="email" value="{{ old('email', $operateShopUser->email) }}">
                                        @if ($errors->has('email'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('email') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group active">
                                    <label class="col-md-3 control-label">{{ trans('database.shop_users.position') }}</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="position" value="{{ old('position', $operateShopUser->position) }}">
                                        @if ($errors->has('position'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('position') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-md-3 control-label">{{ trans('database.shop_users.status') }}</label>
                                    <div class="col-md-8">
                                        @if ($operateShopUser->status === DB_SHOP_USERS_STATUS_REQUESTING)
                                            <label>{{ trans('database.shop_users.column_value.', $operateShopUser->status) }}</label>
                                        @else
                                            <label><input type="radio" name="status" value="{{ DB_SHOP_USERS_STATUS_INVALID }}" {{ old('status', $operateShopUser->status) == DB_SHOP_USERS_STATUS_INVALID ? 'checked' : '' }}>{{ trans('database.shop_users.column_value.status.' . DB_SHOP_USERS_STATUS_INVALID) }}</label>
                                            <label><input type="radio" name="status" value="{{ DB_SHOP_USERS_STATUS_EFFECTIVE }}" {{ old('status', $operateShopUser->status) == DB_SHOP_USERS_STATUS_EFFECTIVE ? 'checked' : '' }}>{{ trans('database.shop_users.column_value.status.' . DB_SHOP_USERS_STATUS_EFFECTIVE) }}</label>
                                        @endif
                                        @if ($errors->has('status'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('status') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">{{ trans('pages.common.buttons.update') }}</button>
                                        <label class="btn btn-info"><a href="{{ action('ShopUserController@show', ['id' => $operateShopUser->id]) }}">{{ trans('pages.common.buttons.cancel') }}</a></label>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
