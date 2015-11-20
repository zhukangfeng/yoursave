@extends ('app', ['title' => trans('pages.consumes.title.edit'), 'id' => 'consume', 'class' => 'consume edit', 'console' => '', 'mode' => '', 'name' => ''])

@section ('assets')
    @include ('consumes.assets')
@endsection

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.consumes.labels.edit_panel_header') }}</div>
                <div class="panel-body">
                    <div class="data-form">
                        <div class="form-data">
                            <form class="form-horizontal" role="form" method="POST" action="{{ action('ConsumeController@update', ['consumeId' => $consume->id]) }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group required">
                                    <label class="col-md-3 control-label">{{ trans('database.consumes.consume_name') }}</label>
                                    <div class="col-md-8">
                                        <input type="text" name="consume_name" value="{{ old('consume_name', $consume->consume_name) }}">
                                        @if ($errors->has('consume_name'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('consume_name') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-md-3 control-label">{{ trans('database.consumes.consume_time') }}</label>
                                    <div class="col-md-6 datetime">
                                        <input type="text" name="consume_time" class="full-datetime" value="{{ old('consume_time', $consume->consume_time) }}">
                                        @if ($errors->has('consume_time'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('consume_time') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ trans('database.consumes.consume_cost') }}</label>
                                    <div class="col-md-8">
                                        <input type="text" name="consume_cost" value="{{ old('consume_cost', $consume->consume_cost) }}">
                                        @if ($errors->has('consume_cost'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('consume_cost') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ trans('database.consumes.consume_info') }}</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="consume_info">{{ old('consume_info', $consume->consume_info) }}</textarea>
                                        @if ($errors->has('consume_info'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('consume_info') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ trans('database.consumes.good_name') }}</label>
                                    <div class="col-md-6">
                                        <div class="good-name-seach">
                                            <input type="text" name="good_name" value="{{ old('good_name', $consume->good_name) }}" placeholder="{{ trans('pages.consumes.placeholder.search_by_good_name') }}">
                                            <label class="search-btn"><span class="btn btn-default">{{ trans('pages.common.buttons.search') }}</span></label>
                                            <label class="create-btn"><span class="btn btn-default">{{ trans('pages.common.buttons.create') }}</span></label>
                                        </div>
                                        <div class="description">
                                            <label>{{ trans('pages.consumes.description.good_name') }}</label>
                                        </div>
                                        <div class="good-list">
                                            @if (old('_token'))
                                                @if (isset($good))
                                                <label class="good-info"><input type="radio" name="good_id" value="{{ $good->id }}" checked="">{{ $good->good_name }}</label>
                                                @endif
                                            @else
                                                @if ($consume->good_id && isset($consume->good_real_name))
                                                <label class="good-info"><input type="radio" name="good_id" value="{{ $consume->good_id }}" checked="">{{ $consume->good_real_name }}</label>
                                                @endif
                                            @endif
                                        </div>
                                        @if ($errors->has('good_id'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('good_id') }}</p>
                                        </div>
                                        @endif
                                        @if ($errors->has('good_id_error'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('good_id_error') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                               <div class="form-group">
                                    <label class="col-md-3 control-label">{{ trans('database.consumes.shop_name') }}</label>
                                    <div class="col-md-6">
                                        <div class="shop-name-seach">
                                            <input type="text" name="shop_name" value="{{ old('shop_name', $consume->shop_name) }}" placeholder="{{ trans('pages.consumes.placeholder.search_by_shop_name') }}">
                                            <label class="search-btn"><span class="btn btn-default">{{ trans('pages.common.buttons.search') }}</span></label>
                                            <label class="create-btn"><span class="btn btn-default">{{ trans('pages.common.buttons.create') }}</span></label>
                                        </div>
                                        <div class="description">
                                            <label>{{ trans('pages.consumes.description.shop_name') }}</label>
                                        </div>
                                        <div class="shop-list">
                                            @if (old('_token'))
                                                @if (isset($shop))
                                                @endif
                                            @else
                                                @if ($consume->shop_id && isset($consume->shop_real_name))
                                                <label class="shop-info"><input type="radio" name="shop_id" value="{{ $consume->shop_id }}" checked="">{{ $consume->shop_real_name }}</label>
                                                @endif
                                            @endif   
                                        </div>
                                        @if ($errors->has('shop_id'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('shop_id') }}</p>
                                        </div>
                                        @endif
                                        @if ($errors->has('shop_id_error'))
                                        <div class="errors">
                                            <p class="error-message">{{ $errors->first('shop_id_error') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ trans('database.consumes.place') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" name="consume_place" value="{{ old('consume_place', $consume->place) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">{{ trans('pages.common.buttons.update') }}</button>
                                        <label class="btn btn-info"><a href="{{ action('ConsumeController@index') }}">{{ trans('pages.common.buttons.cancel') }}</a></label>
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