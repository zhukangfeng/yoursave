@extends ('app', ['title' => trans('pages.login.title'), 'id' => 'login', 'class' => 'login', 'console' => '', 'mode' => '', 'name' => ''])

@section ('content')
<div class="content">
    <div class="data">
        <form class="data-form" method="POST" action="">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="data">
                <div class="header">
                    <label>{{ trans('pages.login.labels.u_name_or_mail') }}</label>
                </div>
                <div class="content">
                    <input type="text" name="name" value="{{ old('name') }}">
                </div>
            </div>
            <div class="data">
                <div class="header">
                    <label>{{ trans('database.'. DB_USERS . '.' . DB_USERS_PASSWORD) }}</label>
                </div>
                <div class="content">
                    <input type="password" name="password">
                </div>
                <div class="data">
                    <div>
                        <input type="submit" value="{{ trans('pages.login.buttons.login') }}">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection