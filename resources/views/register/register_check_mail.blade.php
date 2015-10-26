@extends ('mail', ['title' => trans('mails.register.title'), 'id' => 'register', 'class' => 'register', 'console' => '', 'mode' => '', 'name' => ''])

@section ('content')
<div class="content">
    <label>{{ trans('mails.common.mail_receiver_name', ['name' => $user['l_name']]) }}</label><br />
    <div>
        {!! trans('mails.register.body', ['active_token' => $activeToken, 'active_token_time' => $user['active_token_time']]) !!}
    </div>
</div>
@endsection
