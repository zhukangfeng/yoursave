<div class="console col-md-20 col-md-offset-1">
    <div class="search">
        <form class="search-form" method="GET" action="{{ action('ConsumeController@index') }}">
            <div class="search-word">
                <div class="col-md-10">
                    <div class="search-condition form-inline">
                        <label class="sarch-title col-md-10 control-label">
                            <span class="seach-by-name">
                                <label>{{ trans('pages.consumes.labels.search_by_name') }}</label>
                                <input type="text" name="name" placeholder="{{ trans('pages.consumes.placeholder.search_by_name') }}" value="{{ isset($input['name']) ? $input['name'] : '' }}">
                            </span>
                            <span class="seach-by-shop-name">
                                <label>{{ trans('pages.consumes.labels.search_by_shop_name') }}</label>
                                <input type="text" name="shop_name" placeholder="{{ trans('pages.consumes.placeholder.search_by_shop_name') }}" value="{{ isset($input['shop_name']) ? $input['shop_name'] : '' }}">  
                            </span>
                            <span class="seach-by-good-name">
                                <label>{{ trans('pages.consumes.labels.search_by_good_name') }}</label>
                                <input type="text" name="good_name" placeholder="{{ trans('pages.consumes.placeholder.search_by_good_name') }}" value="{{ isset($input['good_name']) ? $input['good_name'] : '' }}">  
                            </span>
                        </label>
                        <span class="consume-time datetime">
                            <label>{{ trans('pages.consumes.labels.begin_consume_time') }}<input type="text" name="begin_consume_time" class="full-datetime"></label>
                            <label>{{ trans('pages.consumes.labels.end_consume_time') }}<input type="text" name="end_consume_time" class="full-datetime"></label>                            
                        </span>
                        <span>
                            <button type="submit" class="btn btn-sm">{{ trans('pages.common.buttons.search') }}</button>
                            <a href="{{ action('ConsumeController@index') }}"><label class="btn btn-default">{{ trans('pages.common.buttons.reset') }}</label></a>
                        </span>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>