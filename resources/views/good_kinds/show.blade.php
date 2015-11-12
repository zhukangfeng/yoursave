@extends ('app', ['title' => trans('pages.good_kinds.title.show'), 'id' => 'good_kind', 'class' => 'good_kinds show', 'console' => '', 'mode' => '', 'name' => ''])

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.good_kinds.labels.show_panel_header') }}</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.good_kinds.name') }}</th>
                            <td>{{ $goodKind->name }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('pages.good_kinds.labels.parent_name') }}</th>
                            <td>
                                @if ($goodKind->parent_name)
                                <a href="{{ action('GoodKindController@show', ['goodKindId' => $goodKind->parent_id]) }}">{{ $goodKind->parent_name }}</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('pages.good_kinds.labels.child_good_kinds') }}</th>
                            <td>
                                @if ($goodKind->has_children)
                                <a href="{{ action('GoodKindController@index', ['parent_id' => $goodKind->id]) }}">{{ trans('pages.good_kinds.labels.has_child_good_kinds') }}</a>
                                @else
                                {{ trans('pages.good_kinds.labels.no_child_good_kinds') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.good_kinds.kind_info') }}</th>
                            <td>{{ $goodKind->kind_info }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.good_kinds.status') }}</th>
                            <td>{{ trans('database.good_kinds.column_value.status.' . $goodKind->status) }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.created_by') }}</th>
                            <td>{{ $goodKind->created_user_uname }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.created_at') }}</th>
                            <td>{{ $goodKind->created_at->format('Y/m/d H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.updated_by') }}</th>
                            <td>{{ $goodKind->updated_user_uname }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.updated_at') }}</th>
                            <td>{{ $goodKind->updated_at->format('Y/m/d H:i:s') }}</td>
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection