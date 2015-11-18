@extends ('mail', ['title' => trans('mails.myshop.users.info_mail_for_registered_user.title'), 'id' => 'register_shop_user', 'class' => 'register shop-user', 'console' => '', 'mode' => '', 'name' => ''])

@section ('content')
<div class="content">
    <label>{{ trans('mails.common.mail_receiver_name', ['name' => '']) }}</label><br />
    <div>
        {!! trans('mails.myshop.users.info_mail_for_registered_user.body', ['shop_name' => $shopName, 'inviting_user_name' => $invitingUserName]) !!}
    </div>
</div>
@endsection
