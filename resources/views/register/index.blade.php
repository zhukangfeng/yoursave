@extends ('app', ['title' => trans('pages.register.title.index'), 'id' => 'register', 'class' => 'register', 'console' => '', 'mode' => '', 'name' => ''])

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.register.labels.index_panel_header') }}</div>
                <div class="panel-body">
                    <div class="form-data">
                        <form class="form-horizontal" role="form" method="POST"
                            action="{{ url('/register') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group required">
                                <label class="col-md-4 control-label">{{ trans('database.users.u_name') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                                    @if ($errors->has('username'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('username') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-4 control-label">{{ trans('database.users.f_name') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">
                                    @if ($errors->has('firstname'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('firstname') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-4 control-label">{{ trans('database.users.l_name') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">
                                    @if ($errors->has('lastname'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('lastname') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-4 control-label">{{ trans('database.users.login_mail') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="login_mail_addr" value="{{ old('login_mail_addr') }}">
                                    @if ($errors->has('login_mail_addr'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('login_mail_addr') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">{{ trans('pages.common.buttons.create') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection