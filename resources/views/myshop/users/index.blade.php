@extends ('app', ['title' => trans('pages.myshop.users.title.index'), 'id' => 'shop', 'class' => 'shop users index', 'console' => '', 'mode' => '', 'name' => ''])

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.myshop.users.labels.show_panel_header') }}</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.shops.name') }}</th>
                            <td>{{ $shop->name }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>







@endsection