@extends ('app', ['title' => trans('pages.goods.title.show'), 'id' => 'good', 'class' => 'goods show', 'console' => '', 'mode' => '', 'name' => ''])

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.goods.labels.show_panel_header') }}</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.goods.good_name') }}</th>
                            <td>{{ $good->good_name }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('pages.goods.labels.good_kind') }}</th>
                            <td>
                                @if ($good->good_kind_name)
                                <a href="{{ action('GoodKindController@show', ['goodKindId' => $good->good_kind_id]) }}">{{ $good->good_kind_name }}</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.goods.good_info') }}</th>
                            <td>{{ $good->good_info }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.goods.status') }}</th>
                            <td>{{ trans('database.goods.column_value.status.' . $good->status) }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.created_by') }}</th>
                            <td>{{ $good->created_user_uname }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.created_at') }}</th>
                            <td>{{ $good->created_at->format('Y/m/d H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.updated_by') }}</th>
                            <td>{{ $good->updated_user_uname }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.updated_at') }}</th>
                            <td>{{ $good->updated_at->format('Y/m/d H:i:s') }}</td>
                        </tr>
                        
                    </table>
                    <div class="col-md-6 col-md-offset-4">
                        <a href="{{ action('GoodController@index') }}"><span class="btn btn-info">{{ trans('pages.common.buttons.back_to_index') }}</span></a>
                        <a href="{{ action('GoodController@edit', ['goodId' => $good->id]) }}"><span class="btn btn-info">{{ trans('pages.common.buttons.edit') }}</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection