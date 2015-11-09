<div class="console col-md-20 col-md-offset-1">
    <div class="search">
        <form class="search-form" method="GET" action="{{ action('GoodKindController@index') }}">
            <div class="search-word">
                <label class="sarch-title col-md-1 control-label">{{ trans('pages.good_kinds.labels.search_by_name') }}</label>
                <div class="col-md-4">
                    <input type="text" name="name" class="form-control" placeholder="{{ trans('pages.good_kinds.placeholder.search_by_name') }}" value="{{ isset($input['name']) ? $input['name'] : '' }}">
                    <button type="submit" class="btn btn-sm">{{ trans('pages.common.buttons.search') }}</button>
                </div>

            </div>
        </form>
    </div>
</div>