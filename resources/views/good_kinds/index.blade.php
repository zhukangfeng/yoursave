@extends ('app', ['title' => trans('pages.good_kinds.title.index'), 'id' => 'good_kinds', 'class' => 'good_kinds index', 'console' => '', 'mode' => '', 'name' => ''])

@section ('console')
@include ('good_kinds.console')
@endsection


@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.good_kinds.labels.index_panel_header') }}</div>
                <div class="panel-body">
                    <div>
                        {!! $goodKinds->render() !!}
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th class="col-md-1"></th>
                            <th class="col-md-1 sort-able">{{ trans('database.good_kinds.name') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('pages.good_kinds.labels.parent_name') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.good_kinds.status') }}</th>
                            <th class="col-md-1">{{ trans('database.common.created_by') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.common.created_at') }}</th>
                            <th class="col-md-1">{{ trans('database.common.updated_by') }}</th>
                            <th class="col-md-1 sort-able">{{ trans('database.common.updated_at') }}</th>
                        </tr>
                        @foreach ($goodKinds as $goodKindKey => $goodKind)
                        <tr>
                            <td>{{ $goodKindKey + 1 }}</td>
                            <td>
                                <a href="{{ action('GoodKindController@show', ['id' => $goodKind->id]) }}">{{ $goodKind->name }}</a>
                            </td>
                            <td>
                                @if (isset($goodKind->parent_name))
                                <a href="{{ action('GoodKindController@show', ['id' => $goodKind->parent_id]) }}">{{ $goodKind->parent_name }}</a>
                                @endif
                            </td>
                            <td>{{ trans('database.good_kinds.column_value.status.' . $goodKind->status) }}</td>
                            <td>{{ $goodKind->created_user_uname }}</td>
                            <td>{{ isset($goodKind->created_at) ? $goodKind->created_at->format('Y/m/d H:i:s') : '' }}</td>
                            <td>{{ $goodKind->updated_user_uname }}</td>
                            <td>{{ isset($goodKind->updated_at) ? $goodKind->updated_at->format('Y/m/d H:i:s') : '' }}</td>
                        </tr>

                        @endforeach
                    </table>
                    <div>
                        {!! $goodKinds->render() !!}
                    </div>
                    <div class="col-md-6 col-md-offset-2">
                        <label class="btn btn-info"><a href="{{ action('GoodKindController@create') }}">{{ trans('pages.common.buttons.create') }}</a></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







@endsection