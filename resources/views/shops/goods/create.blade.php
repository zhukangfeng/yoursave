@extends ('app', ['title' => trans('pages.shops.goods.title.create'), 'id' => 'good_create', 'class' => 'good-create', 'console' => '', 'mode' => '', 'name' => ''])

@section ('assets')
    @include ('goods.assets')
@endsection

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.shops.goods.labels.create_panel_header') }}</div>
                <div class="panel-body">
                    <div class="form-data">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/shops/' . $shopId . '/goods') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group required">
                                <label class="col-md-4 control-label">{{ trans('database.goods.good_name') }}</label>
                                <div class="col-md-6">
                                    <div class="good-seach">
                                        <input type="text" name="good_search_name" value="{{ old('good_search_name') }}" placeholder="{{ trans('pages.shops.goods.placeholder.search_by_good_name') }}">
                                        <label class="search-btn"><span class="btn btn-default">{{ trans('pages.common.buttons.search') }}</span></label>
                                        <label class="create-btn"><span class="btn btn-default">{{ trans('pages.common.buttons.create') }}</span></label>
                                    </div>
                                    <div class="good-list">
                                        @if (old('good') && isset($good))
                                        <label class="good-info"><input type="radio" name="good" value="{{ $good->id }}" checked="">{{ $good->name }}</label>
                                        @endif   
                                    </div>
                                    @if ($errors->has('good'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('good') }}</p>
                                    </div>
                                    @endif
                                    @if ($errors->has('good_error'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('good_error') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('database.produce_companies.table_name') }}</label>
                                <div class="col-md-6">
                                    <div class="produce-company-seach">
                                        <input type="text" name="produce_company_search_name" value="{{ old('produce_company_search_name') }}" placeholder="{{ trans('pages.shops.goods.placeholder.search_by_produce_company_name') }}">
                                        <label class="search-btn"><span class="btn btn-default">{{ trans('pages.common.buttons.search') }}</span></label>
                                        <label class="create-btn"><span class="btn btn-default">{{ trans('pages.common.buttons.create') }}</span></label>
                                    </div>
                                    <div class="produce-company-list">
                                        @if (old('produce_company') && isset($good))
                                        <label class="produce-company-info"><input type="radio" name="produce_company" value="{{ $produceCompany->id }}" checked="">{{ $produceCompany->name }}</label>
                                        @endif   
                                    </div>
                                    @if ($errors->has('produce_company'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('produce_company') }}</p>
                                    </div>
                                    @endif
                                    @if ($errors->has('produce_company_error'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('produce_company_error') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('database.shop_goods.price') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="price" value="{{ old('price') }}">
                                    @if ($errors->has('price'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('price') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('database.common.currency') }}</label>
                                <div class="col-md-6">
                                    <select name="currency">
                                        <option value="">{{ trans('pages.common.options.no_option') }}</option>
                                        @foreach (trans('database.common.column_value.currency') as $currencyKey => $currency)
                                        <option value="{{ $currencyKey }}" {{ old('currency') == $currencyKey ? 'selected' : '' }}>{{ $currency }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('currency'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('currency') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('database.shop_goods.good_info') }}</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="good_info">{{ old('good_info') }}</textarea>
                                    @if ($errors->has('good_info'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('good_info') }}</p>
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