<div class="console col-md-20 col-md-offset-1">
    <div class="search">
        <form class="search-form" method="GET" action="{{ action('GoodKindController@index') }}">
            <div class="search-word">
                <div class="col-md-10">
                    <div class="search-condition form-inline">
                        <label class="sarch-title col-md-1 control-label">{{ trans('pages.good_kinds.labels.search_by_name') }}</label>
                        <input type="text" name="name" class="col-md-6" placeholder="{{ trans('pages.good_kinds.placeholder.search_by_name') }}" value="{{ isset($input['name']) ? $input['name'] : '' }}">
                        <select class="form-control" name="status">
                            <option value="">{{ trans('pages.common.options.default_no_condition_option') }}</option>
                            @foreach (trans('database.good_kinds.column_value.status') as $statusKey => $status)
                            <option value="{{ $statusKey }}" {{ isset($input['status']) && $input['status'] != '' && $input['status'] == $statusKey ? 'selected' : ''}}>{{ $status }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-sm">{{ trans('pages.common.buttons.search') }}</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>