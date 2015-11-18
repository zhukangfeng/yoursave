@extends ('app', ['title' => trans('pages.goods.title.create'), 'id' => 'good_kind_create', 'class' => 'good-kind-create', 'console' => '', 'mode' => '', 'name' => ''])

@section ('assets')
    @include ('goods.assets')
@endsection

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.goods.labels.create_panel_header') }}</div>
                <div class="panel-body">
                    <div class="form-data">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/goods') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group required">
                                <label class="col-md-4 control-label">{{ trans('pages.goods.labels.good_kind') }}</label>
                                <div class="col-md-6">
                                    <div class="good-kind-seach">
                                        <input type="text" name="good_kind_search_key" value="{{ old('good_kind_search_key') }}" placeholder="{{ trans('pages.goods.placeholder.search_by_good_kind_name') }}">
                                        <label class="search-btn"><span class="btn btn-default">{{ trans('pages.common.buttons.search') }}</span></label>
                                        <label class="create-btn"><span class="btn btn-default">{{ trans('pages.common.buttons.create') }}</span></label>
                                    </div>
                                    <div class="good-kind-list">
                                        @if (old('good_kind') && isset($goodKind))
                                        <label class="good_kind-info"><input type="radio" name="good_kind" value="{{ $goodKind->id }}" checked="">{{ $goodKind->name }}</label>
                                        @endif   
                                    </div>
                                    @if ($errors->has('good_kind'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('good_kind') }}</p>
                                    </div>
                                    @endif
                                    @if ($errors->has('good_kind_error'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('good_kind_error') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @if (Session::get('ShopUser') || Session::get('ProduceCompanyUser'))
                            <div class="form-group required">
                                <label class="col-md-4 control-label">{{ trans('pages.goods.labels.create_type') }}</label>
                                <div class="col-md-6">
                                    <label><input type="radio" name="create_type" value="0" {{ is_null(old('create_type')) || old('create_type') == '0' ? 'checked' : '' }}>{{ trans('pages.goods.labels.created_by_user') }}</label>
                                    @if (Session::get('ShopUser'))
                                    <label><input type="radio" name="create_type" value="1" {{ old('create_type') == '1' ? 'checked' : '' }}>{{ trans('pages.goods.labels.created_by_shop_user') }}</label>
                                    @endif
                                    @if (Session::get('ProduceCompanyUser'))
                                    <label><input type="radio" name="create_type" value="2" {{ old('create_type') == '2' ? 'checked' : '' }}>{{ trans('pages.goods.labels.created_by_produce_company_user') }}</label>
                                    @endif
                                    @if ($errors->has('create_type'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('create_type') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endif
                            <div class="form-group required">
                                <label class="col-md-4 control-label">{{ trans('database.goods.good_name') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="good_name" value="{{ old('good_name') }}">
                                    @if ($errors->has('good_name'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('good_name') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('database.goods.good_info') }}</label>
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