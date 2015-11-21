<div class="console col-md-20 col-md-offset-1">
    <div class="search">
        <form class="search-form" method="GET" action="{{ action('ShopController@index') }}">
            <div class="search-word">
                <div class="col-md-15">
                    <div class="search-condition form-inline">
                        <label class="sarch-title col-md-1 control-label">{{ trans('pages.shops.labels.search_by_key') }}</label>
                        <input type="text" name="key" class="col-md-6" placeholder="{{ trans('pages.shops.placeholder.search_by_key') }}" value="{{ isset($input['key']) ? $input['key'] : '' }}">
                        <select class="form-control" name="status">
                            <option value="">{{ trans('pages.common.options.default_no_condition_option') }}</option>
                            @foreach (trans('database.shops.column_value.status') as $statusKey => $status)
                            <option value="{{ $statusKey }}" {{ isset($input['status']) && $input['status'] != '' && $input['status'] == $statusKey ? 'selected' : ''}}>{{ $status }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-sm">{{ trans('pages.common.buttons.search') }}</button>
                        <a href="{{ action('ShopController@index') }}"><label class="btn btn-default">{{ trans('pages.common.buttons.reset') }}</label></a>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>