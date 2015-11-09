@extends ('mail', ['title' => trans('mails.myshop.users.check_mail_for_unregistered.title'), 'id' => 'register_shop_user', 'class' => 'register shop-user', 'console' => '', 'mode' => '', 'name' => ''])

@section ('content')
<div class="content">
    <label>{{ trans('mails.common.mail_receiver_name', ['name' => $invitedUser['l_name']]) }}</label><br />
    <div>
        {!! trans('mails.myshop.users.check_mail_for_unregistered.body', ['active_token' => $activeToken, 'active_token_time' => $activeTokenTime, 'shop_name' => $shopName, 'inviting_user_name' => $invitingUserName]) !!}
    </div>
</div>
@endsection
