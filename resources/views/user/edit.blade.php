@extends ('app', ['title' => trans('pages.user.edit_title'), 'id' => 'user', 'class' => 'user edit', 'console' => '', 'mode' => '', 'name' => ''])

@section ('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('pages.user.labels.edit_panel_header') }}</div>
                <div class="panel-body">
                    <div class="data-form">
                        <form class="form-horizontal" role="form" method="POST"
                            action="{{ url('/user') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group required">
                                <label class="col-md-4 control-label">{{ trans('database.users.u_name') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username" value="{{ old('username', $user->u_name) }}">
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
                                    <input type="text" class="form-control" name="firstname" value="{{ old('firstname', $user->f_name) }}">
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
                                    <input type="text" class="form-control" name="lastname" value="{{ old('lastname', $user->l_name) }}">
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
                                    <input type="text" class="form-control" name="login_mail_addr" value="{{ old('login_mail_addr', $user->login_mail) }}">
                                    @if ($errors->has('login_mail_addr'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('login_mail_addr') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('database.users.email') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}" placeholder="{{ old('login_mail_addr', $user->login_mail) }}">
                                    @if ($errors->has('email'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('email') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('database.users.post_code') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="post_code" value="{{ old('post_code', $user->post_code) }}">
                                    @if ($errors->has('post_code'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('post_code') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('database.users.address') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="address" value="{{ old('address', $user->address) }}">
                                    @if ($errors->has('address'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('address') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('database.users.home_phone') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="home_phone" value="{{ old('home_phone', $user->home_phone) }}">
                                    @if ($errors->has('home_phone'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('home_phone') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('database.users.mobile_phone') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="mobile_phone" value="{{ old('mobile_phone', $user->mobile_phone) }}">
                                    @if ($errors->has('mobile_phone'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('mobile_phone') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('database.users.birthday') }}</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control datetimepicker" name="birthday" value="{{ old('birthday', $user->birthday) }}">
                                    @if ($errors->has('birthday'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('birthday') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('database.users.sex') }}</label>
                                <div class="col-md-6">
                                    <ul class="radio-list">
                                        <li><label><input type="radio" name="sex" value="{{ DB_USERS_SEX_MAN }}" {{ old('sex', $user->sex) == DB_USERS_SEX_MAN ? 'checked' : '' }}>{{ trans('database.users.column_value.sex.' . DB_USERS_SEX_MAN) }}</label></li>
                                        <li><label><input type="radio" name="sex" value="{{ DB_USERS_SEX_WOMAN }}" {{ old('sex', $user->sex) == DB_USERS_SEX_WOMAN ? 'checked' : '' }}>{{ trans('database.users.column_value.sex.' . DB_USERS_SEX_WOMAN) }}</label></li>
                                    
                                    @if ($errors->has('sex'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('sex') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('database.users.language') }}</label>
                                <div class="col-md-6">
                                    <ul class="radio-list">
                                        <li><label><input type="radio" name="language" value="{{ DB_USERS_LANGUAGE_EN }}" {{ old('language', $user->language) == DB_USERS_LANGUAGE_EN ? 'checked' : '' }}>{{ trans('database.users.column_value.language.' . DB_USERS_LANGUAGE_EN) }}</label></li>
                                        <li><label><input type="radio" name="language" value="{{ DB_USERS_LANGUAGE_ZH_CN }}" {{ old('language', $user->language) == DB_USERS_LANGUAGE_ZH_CN ? 'checked' : '' }}>{{ trans('database.users.column_value.language.' . DB_USERS_LANGUAGE_ZH_CN) }}</label></li>
                                        <li><label><input type="radio" name="language" value="{{ DB_USERS_LANGUAGE_JA }}" {{ old('language', $user->language) == DB_USERS_LANGUAGE_JA ? 'checked' : '' }}>{{ trans('database.users.column_value.language.' . DB_USERS_LANGUAGE_JA) }}</label></li>
                                    
                                    @if ($errors->has('sex'))
                                    <div class="errors">
                                        <p class="error-message">{{ $errors->first('sex') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ trans('database.users.autheriticate_type') }}</label>
                                <div class="col-md-6"><label>{{ trans('database.users.column_value.autheriticate_type.' . $user->autheriticate_type) }}</label></div>
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