@extends ('app', ['title' => trans('pages.myshop.users.title.create'), 'id' => 'myshop_user', 'class' => 'myshop shop-user create', 'console' => '', 'mode' => '', 'name' => ''])

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.myshop.users.labels.create_panel_header') }}</div>
                <div class="panel-body">
                    <div class="data-form">
                        <div class="form-data">
                            <form class="form-horizontal" role="form" method="POST" action="{{ action('ShopUserController@store') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group required">
                                    <label class="col-md-3 control-label">{{ trans('database.users.login_mail') }}</label>
                                    <div class="col-md-8">
                                        <textarea name="login_mails" class="form-control">{{ old('login_mails') }}</textarea>
                                        @if ($errors->has('login_mails'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('login_mails') }}</p>
                                        </div>
                                        @endif
                                        <div class="description">
                                            <p>{{ trans('pages.myshop.users.labels.multi_mail_input') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-md-3 control-label">{{ trans('database.shop_users.type') }}</label>
                                    <div class="col-md-8">
                                        <select name="type">
                                            @foreach (trans('database.shop_users.column_value.type') as $userTypeKey => $userType)
                                                @if ($shopUser->type === DB_SHOP_USERS_TYPE_ADMIN || $shopUser->type < $userTypeKey)
                                                <option value="{{ $userTypeKey }}" {{ old('type') == $userTypeKey ? 'selected' : '' }}>{{ $userType }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('type'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('type') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group active">
                                    <label class="col-md-3 control-label">{{ trans('database.shop_users.position') }}</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="position" value="{{ old('position') }}">
                                        @if ($errors->has('position'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('position') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">{{ trans('pages.common.buttons.create') }}</button>
                                        <label class="btn btn-info"><a href="{{ action('ShopUserController@index') }}">{{ trans('pages.common.buttons.cancel') }}</a></label>
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
