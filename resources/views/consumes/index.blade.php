@extends ('app', ['title' => trans('pages.consumes.title.index'), 'id' => 'consumes', 'class' => 'consumes index', 'console' => '', 'mode' => '', 'name' => ''])

@section ('assets')
    @include ('consumes.assets')
@endsection


@section ('console')
    @include ('consumes.console')
@endsection

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.consumes.labels.index_panel_header') }}</div>
                <div class="panel-body">
                    <div class="paginage text-center">
                        {!! $consumes->render() !!}
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th class="col-md-1"></th>
                            <th class="col-md-1 sort-able">{{ trans('database.consumes.consume_name') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.consumes.consume_cost') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.consumes.consume_time') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.consumes.shop_name') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.consumes.good_name') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.common.created_at') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.common.updated_at') }}</th>
                        </tr>
                        @foreach ($consumes as $consumeKey => $consume)
                        <tr>
                            <td>{{ $consumeKey + 1 }}</td>
                            <td>
                                <a href="{{ action('ConsumeController@show', ['id' => $consume->id]) }}">{{ $consume->consume_name }}</a>
                            </td>
                            <td>{{ $consume->consume_cost }}</td>
                            <td>{{ isset($consume->consume_time) ? $consume->consume_time->format('Y/m/d H:i:s') : '' }}</td>
                            <td>
                                @if (isset($consume->shop_id))
                                <a href="{{ action('ShopController@show', ['shopId' => $consume->shop_id]) }}">{{ $consume->shop_name }}</a>
                                @else
                                <label>{{ $consume->shop_name }}</label>
                                @endif
                            </td>
                            <td>
                                @if (isset($consume->good_id))
                                <a href="{{ action('GoodController@show', ['consumeId' => $consume->good_id]) }}">{{ $consume->good_name }}</a>
                                @else
                                <label>{{ $consume->good_name }}</label>
                                @endif
                            </td>
                            <td>{{ isset($consume->created_at) ? $consume->created_at->format('Y/m/d H:i:s') : '' }}</td>
                            <td>{{ isset($consume->updated_at) ? $consume->updated_at->format('Y/m/d H:i:s') : '' }}</td>
                        </tr>

                        @endforeach
                    </table>
                    <div class="paginage text-center">
                        {!! $consumes->render() !!}
                    </div>
                    @if (Auth::check())
                    <div class="col-md-6 col-md-offset-2">
                        <label class="btn btn-info"><a href="{{ action('ConsumeController@create') }}">{{ trans('pages.common.buttons.create') }}</a></label>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>







@endsection