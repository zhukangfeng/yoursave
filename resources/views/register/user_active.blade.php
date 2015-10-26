@extends ('app', ['title' => trans('pages.register.active_title'), 'id' => 'user_active', 'class' => 'register active', 'console' => '', 'mode' => '', 'name' => ''])

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.register.labels.index_panel_header') }}</div>
                <div class="panel-body">
                    <div class="form-data">
                        <form class="form-horizontal" role="form" method="POST"
                            action="{{ url('/register/active') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group required">
                                <label class="col-md-4 control-label">{{ trans('database.users.password') }}</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" value="">
                                    @if ($errors->has('password'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('password') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-4 control-label">{{ trans('pages.register.labels.password_confirm') }}</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="confirm" value="">
                                    @if ($errors->has('confirm'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('confirm') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">{{ trans('pages.common.buttons.confirm') }}</button>
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