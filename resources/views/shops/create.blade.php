@extends ('app', ['title' => trans('pages.shops.title.create'), 'id' => 'shop_create', 'class' => 'shop-create', 'console' => '', 'mode' => '', 'name' => ''])

@section ('assets')
    @include ('shops.assets')
@endsection

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.shops.labels.create_panel_header') }}</div>
                <div class="panel-body">
                    <div class="form-data">
                        <form class="form-horizontal" role="form" method="POST" action="{{ action('ShopController@store') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group required">
                                <label class="col-md-4 control-label">{{ trans('pages.shops.labels.create_type') }}</label>
                                <div class="col-md-6">
                                    <label><input type="radio" name="create_type" value="0" {{ is_null(old('create_type')) || old('create_type') == '0' ? 'checked' : '' }}>{{ trans('pages.shops.labels.created_by_user') }}</label>
                                    <label><input type="radio" name="create_type" value="1" {{ old('create_type') == '1' ? 'checked' : '' }}>{{ trans('pages.shops.labels.created_by_shop_user') }}</label>
                                    @if ($errors->has('create_type'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('create_type') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-4 control-label">{{ trans('database.shops.name') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('name') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('database.shops.address') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                                    @if ($errors->has('address'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('address') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('database.shops.phone_num') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="phone_num" value="{{ old('phone_num') }}">
                                    @if ($errors->has('phone_num'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('phone_num') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('database.shops.contact_mail') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="contact_mail" class="form-control" value="{{ old('contact_mail') }}">
                                    @if ($errors->has('contact_mail'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('contact_mail') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('database.shops.web_addr') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="web_addr" class="form-control" value="{{ old('web_addr') }}">
                                    @if ($errors->has('web_addr'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('web_addr') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('database.common.public_type') }}</label>
                                <div class="col-md-8 date">
                                    <select name="public_type">
                                        @foreach (trans('database.common.column_value.public_type') as $publicTypeKey => $publicType)
                                            <option value="{{ $publicTypeKey }}" {{ old('public_type', DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL) == $publicTypeKey ? 'selected' : '' }}>{{ $publicType }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('public_type'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('public_type') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('database.shops.shop_info') }}</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="shop_info">{{ old('shop_info') }}</textarea>
                                    @if ($errors->has('shop_info'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('shop_info') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('database.common.currency') }}</label>
                                <div class="col-md-8">
                                    <ul class="radio-list">
                                        @foreach (trans('database.common.column_value.currency') as $currencyKey => $currency)
                                            <li><label><input type="radio" name="currency" value="{{ $currencyKey }}" {{ old('currency') == $currencyKey ? 'checked' : '' }}>{{ $currency }}</label></li>
                                        @endforeach
                                    
                                    @if ($errors->has('currency'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('currency') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">{{ trans('pages.common.buttons.create') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection