@extends ('app', ['title' => trans('pages.login.title'), 'id' => 'login', 'class' => 'login', 'console' => '', 'mode' => '', 'name' => ''])

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.login.labels.index_panel_header') }}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ trans('pages.login.labels.u_name_or_mail') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="account" value="{{ old('account') }}">
                                @if ($errors->has('account_error'))
                                <div class="errors">
                                    <p class="error-message">{{ $errors->first('account_error') }}</p>
                                </div>
                                @endif
                                @if ($errors->has('account_requesting_error'))
                                <div class="errors">
                                    <p class="error-message">{{ $errors->first('account_requesting_error') }}<a href="register/resendmail">{{ trans('pages.login.buttons.resend_mail') }}</a></p>
                                </div>
                                @endif
                                @if ($errors->has('account_invalid_error'))
                                <div class="errors">
                                    <p class="error-message">{{ $errors->first('account_invalid_error') }}<a href="register/resendmail">{{ trans('pages.login.buttons.reactive') }}</a></p>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ trans('pages.login.labels.password') }}</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                                @if ($errors->has('password_error'))
                                <div class="errors">
                                    <p class="error-message">{{ $errors->first('password_error') }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" value="1">{{ trans('pages.login.buttons.remember') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">{{ trans('pages.login.buttons.login') }}</button>
                                <a class="btn btn-link" href="{{ url('/login/reminder') }}">{{ trans('pages.login.buttons.reminder') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection