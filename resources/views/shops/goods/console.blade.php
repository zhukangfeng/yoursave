<div class="console col-md-20 col-md-offset-1">
    <div class="search">
        <form class="search-form" method="GET" action="{{ action('ShopGoodController@index', ['shopId' => $shop->id]) }}">
            <div class="search-word">
                <div class="col-md-15">
                    <div class="search-condition form-inline">
                        <div class="form-group">
                            <label class="sarch-title col-md-5 control-label">{{ trans('pages.shops.goods.labels.search_by_key') }}</label>
                            <input type="text" name="key" class="col-md-7" placeholder="{{ trans('pages.shops.goods.placeholder.search_by_key') }}" value="{{ isset($input['key']) ? $input['key'] : '' }}">
                        </div>
                        <div class="form-group">
                            <label class="sarch-title col-md-5 control-label">{{ trans('pages.shops.goods.labels.search_by_produce_company_name') }}</label>
                            <input type="text" name="produce_company_name" class="col-md-5" placeholder="{{ trans('pages.shops.goods.placeholder.search_by_produce_company_name') }}" value="{{ isset($input['produce_company_name']) ? $input['produce_company_name'] : '' }}">                            
                        </div>
                        <select class="form-control" name="status">
                            <option value="">{{ trans('pages.common.options.default_no_condition_option') }}</option>
                            @foreach (trans('database.shop_goods.column_value.status') as $statusKey => $status)
                            <option value="{{ $statusKey }}" {{ isset($input['status']) && $input['status'] != '' && $input['status'] == $statusKey ? 'selected' : ''}}>{{ $status }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-sm">{{ trans('pages.common.buttons.search') }}</button>
                        <a href="{{ action('ShopGoodController@index', ['shopId' => $shop->id]) }}"><label class="btn btn-default">{{ trans('pages.common.buttons.reset') }}</label></a>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>