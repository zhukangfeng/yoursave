@extends ('app', ['title' => trans('pages.user.title.show'), 'id' => 'user', 'class' => 'user edit', 'console' => '', 'mode' => '', 'name' => ''])

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.user.labels.show_panel_header') }}</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.users.u_name') }}</th>
                            <td>{{ $user->u_name }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.users.f_name') }}</th>
                            <td>{{ $user->f_name }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.users.l_name') }}</th>
                            <td>{{ $user->l_name }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.users.login_mail') }}</th>
                            <td>{{ $user->login_mail }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.users.contact_email') }}</th>
                            <td>{{ $user->contact_email }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.users.post_code') }}</th>
                            <td>{{ $user->post_code }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.users.address') }}</th>
                            <td>{{ $user->address }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.users.home_phone') }}</th>
                            <td>{{ $user->home_phone }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.users.mobile_phone') }}</th>
                            <td>{{ $user->mobile_phone }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.users.birthday') }}</th>
                            <td>{{ $user->birthday }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.users.sex') }}</th>
                            <td>{{ trans('database.users.column_value.sex.' . $user->sex) }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.users.currency') }}</th>
                            <td>{{ trans('database.users.column_value.currency.' . $user->currency) }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.users.language') }}</th>
                            <td>{{ trans('database.users.column_value.language.' . $user->language) }}</td>
                        </tr>
                        @if (Session::get('Shop'))
                        <tr>
                            <th class="col-md-3 active">{{ trans('pages.user.labels.belonged_shop') }}</th>
                            <td>{{ Session::get('Shop')->name }}</td>
                        </tr>
                        @endif
                        @if (Session::get('ProduceCompany'))
                        <tr>
                            <th class="col-md-3 active">{{ trans('pages.user.labels.belonged_produce_company') }}</th>
                            <td>{{ Session::get('ProduceCompany')->name }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.users.autheriticate_type') }}</th>
                            <td>{{ trans('database.users.column_value.autheriticate_type.' . $user->autheriticate_type) }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.users.receive_collection_message_type') }}</th>
                            <td>
                                @if ($user->receive_collection_message_type === DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL)
                                <li><label>{{ trans('database.users.column_value.receive_collection_message_type.' . DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL) }}</label></li>
                                @else
                                @foreach (trans('database.users.column_value.receive_collection_message_type') as $receiveKey => $receive)
                                @if ((int)($receiveKey & $user->receive_collection_message_type) && $receiveKey !== DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL)
                                <li><label>{{ $receive }}</label></li>
                                @endif
                                @endforeach
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.users.status') }}</th>
                            <td>{{ trans('database.users.column_value.status.' . $user->status) }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.public_type') }}</th>
                            <td>{{ trans('database.common.column_value.public_type.' . $user->public_type) }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.created_at') }}</th>
                            <td>{{ $user->created_at->format('Y/m/d H:i:s') }}</td>
                        </tr>
                        <tr>
                            <th class="col-md-3 active">{{ trans('database.common.updated_at') }}</th>
                            <td>{{ $user->updated_at->format('Y/m/d H:i:s') }}</td>
                        </tr>
                    </table>
                    <div class="col-md-6 col-md-offset-4">
                        <label class="btn btn-primary"><a href="{{ url('/user/edit') }}">{{ trans('pages.common.buttons.edit') }}</a></label>
                        <label class="btn btn-info"><a href="{{ url('/') }}">{{ trans('pages.common.buttons.back_to_index') }}</a></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection