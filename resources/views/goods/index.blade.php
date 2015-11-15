@extends ('app', ['title' => trans('pages.goods.title.index'), 'id' => 'goods', 'class' => 'goods index', 'console' => '', 'mode' => '', 'name' => ''])

@section ('assets')
    @include ('goods.assets')
@endsection


@section ('console')
    @include ('goods.console')
@endsection

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.goods.labels.index_panel_header') }}</div>
                <div class="panel-body">
                    <div class="paginage text-center">
                        {!! $goods->render() !!}
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th class="col-md-1"></th>
                            <th class="col-md-1 sort-able">{{ trans('database.goods.good_name') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('pages.goods.labels.good_kind') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.goods.good_info') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.goods.status') }}</th>
                            <th class="col-md-1">{{ trans('database.common.created_by') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.common.created_at') }}</th>
                            <th class="col-md-1">{{ trans('database.common.updated_by') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.common.updated_at') }}</th>
                        </tr>
                        @foreach ($goods as $goodKey => $good)
                        <tr>
                            <td>{{ $goodKey + 1 }}</td>
                            <td>
                                <a href="{{ action('GoodController@show', ['id' => $good->id]) }}">{{ $good->good_name }}</a>
                            </td>
                            <td>
                                @if (isset($good->good_kind_id))
                                <a href="{{ action('GoodKindController@show', ['goodId' => $good->good_kind_id]) }}">{{ $good->good_kind_name }}</a>
                                @endif
                            </td>
                            <td>{{ $good->good_info }}</td>
                            <td>{{ trans('database.goods.column_value.status.' . $good->status) }}</td>
                            <td>{{ $good->created_user_uname }}</td>
                            <td>{{ isset($good->created_at) ? $good->created_at->format('Y/m/d H:i:s') : '' }}</td>
                            <td>{{ $good->updated_user_uname }}</td>
                            <td>{{ isset($good->updated_at) ? $good->updated_at->format('Y/m/d H:i:s') : '' }}</td>
                        </tr>

                        @endforeach
                    </table>
                    <div class="paginage text-center">
                        {!! $goods->render() !!}
                    </div>
                    @if (Auth::check())
                    <div class="col-md-6 col-md-offset-2">
                        <label class="btn btn-info"><a href="{{ action('GoodController@create') }}">{{ trans('pages.common.buttons.create') }}</a></label>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>







@endsection