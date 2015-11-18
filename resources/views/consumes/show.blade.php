@extends ('app', ['title' => trans('pages.consumes.title.show'), 'id' => 'good', 'class' => 'consumes show', 'console' => '', 'mode' => '', 'name' => ''])

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.consumes.labels.show_panel_header') }}</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.consumes.consume_name') }}</th>
                            <td>{{ $consume->consume_name }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.consumes.consume_cost') }}</th>
                            <td>{{ $consume->consume_cost }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.consumes.consume_time') }}</th>
                            <td>{{ $consume->consume_time }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.consumes.shop_name') }}</th>
                            <td>
                                @if ($consume->shop_id)
                                <a href="{{ action('ShopController@show', ['shopId' => $consume->shop_id]) }}">{{ $consume->shop_name }}</a>
                                @else
                                <label>{{ $consume->shop_name }}</label>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.consumes.good_name') }}</th>
                            <td>
                            @if ($consume->good_id)
                            <a href="{{ action('GoodController@show', ['goodId' => $consume->good_id]) }}">{{ $consume->good_name }}</a>
                            @else
                            <label>{{ $consume->good_name }}</label>
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.consumes.place') }}</th>
                            <td>{{ $consume->place }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.consumes.consume_info') }}</th>
                            <td>{{ $consume->consume_info }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.public_type') }}</th>
                            <td>
                                @if (array_key_exists($consume->public_type, trans('database.common.column_value.public_type')))
                                {{ trans('database.common.column_value.public_type.' . $consume->public_type) }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.created_at') }}</th>
                            <td>{{ $consume->created_at->format('Y/m/d H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.updated_at') }}</th>
                            <td>{{ $consume->updated_at->format('Y/m/d H:i:s') }}</td>
                        </tr>
                        
                    </table>
                    <div class="col-md-6 col-md-offset-4">
                        <a href="{{ action('ConsumeController@index') }}" class="btn btn-info"><span>{{ trans('pages.common.buttons.back_to_list') }}</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection