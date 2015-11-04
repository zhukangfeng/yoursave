@extends ('app', ['title' => trans('pages.myshop.title.edit'), 'id' => 'shop', 'class' => 'shop edit', 'console' => '', 'mode' => '', 'name' => ''])

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.myshop.labels.edit_panel_header') }}</div>
                <div class="panel-body">
                    <div class="data-form">
                        <div class="form-data">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/myshop') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group required">
                                    <label class="col-md-3 control-label">{{ trans('database.shops.name') }}</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" value="{{ old('name', $shop->name) }}">
                                        @if ($errors->has('name'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('name') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ trans('database.shops.address') }}</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="address" value="{{ old('address', $shop->address) }}">
                                        @if ($errors->has('address'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('address') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ trans('database.shops.phone_num') }}</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="phone_num" value="{{ old('phone_num', $shop->phone_num) }}">
                                        @if ($errors->has('phone_num'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('phone_num') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ trans('database.shops.web_addr') }}</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="web_addr" value="{{ old('web_addr', $shop->web_addr) }}">
                                        @if ($errors->has('web_addr'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('web_addr') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ trans('database.shops.shop_info') }}</label>
                                    <div class="col-md-8">
                                        <input type="textarea" class="form-control" name="shop_info" value="{{ old('shop_info', $shop->shop_info) }}">
                                        @if ($errors->has('shop_info'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('shop_info') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ trans('database.shops.contact_mail') }}</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="contact_mail" value="{{ old('contact_mail', $shop->contact_mail) }}">
                                        @if ($errors->has('contact_mail'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('contact_mail') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ trans('pages.common.labels.response_user_name') }}</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="response_user">
                                            @foreach ($adminUsers as $adminUser)
                                                <option value="{{ $adminUser->id }}" {{ old('response_user', $adminUser->id) == $adminUser->id ? 'select' : '' }}>{{ $adminUser->fullname }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('response_user'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('response_user') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ trans('database.shops.status') }}</label>
                                    <div class="col-md-8"><label>{{ trans('database.shops.column_value.status.' . $shop->status) }}</label></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ trans('database.common.public_type') }}</label>
                                    <div class="col-md-8 date">
                                        <select name="public_type">
                                            @foreach (trans('database.common.column_value.public_type') as $publicTypeKey => $publicType)
                                                <option value="{{ $publicTypeKey }}" {{ old('public_type', $shop->public_type) == $publicTypeKey ? 'select' : '' }}>{{ $publicType }}</option>
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
                                    <label class="col-md-3 control-label">{{ trans('database.common.created_by') }}</label>
                                    <div class="col-md-8"><label>{{ $shop->created_user_fullname }}</label></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ trans('database.common.currency') }}</label>
                                    <div class="col-md-8">
                                        <ul class="radio-list">
                                            @foreach (trans('database.common.column_value.currency') as $currencyKey => $currency)
                                                <li><label><input type="radio" name="currency" value="{{ $currencyKey }}" {{ old('currency', $shop->currency) == $currencyKey ? 'checked' : '' }}>{{ $currency }}</label></li>
                                            @endforeach
                                        
                                        @if ($errors->has('currency'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('currency') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ trans('pages.myshop.labels.shop_icon') }}</label>
                                    <div class="col-md-8">
                                        <div class="image-upload image">
                                            <input type="file" multiple class="file multi-file-upload" file-name="shop_icon" data-overwrite-initial="false" data-min-file-count="2">
                                        </div>
                                        @if ($errors->has('shop_icon'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('shop_icon') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">{{ trans('pages.common.buttons.update') }}</button>
                                        <label class="btn btn-info"><a href="{{ url('myshop') }}">{{ trans('pages.common.buttons.cancel') }}</a></label>
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
