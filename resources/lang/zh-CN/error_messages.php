<?php
/**
 * 错误消息文件
 *
 * @return array
 */
return [
    // 平常错误
    'common'    => [

    ],
    // 登录界面错误
    'login' => [
        'no_account'    => '该账户不存在，请检查用户名或者邮箱地址。',
        'password_error'    => '用户密码错误，请再次输入。',
        'account_requesting_error'  => '账户未激活，请到邮箱查看激活邮件，并激活。',
        'account_invalid_error'     => '该账户处于关闭状态，如需重新使用，请再次激活。'
    ],
    // 用户注册页面
    'register'  => [
        'mail_sent_fail'    => '注册邮件发送失败，请检查注册邮箱，再次注册。'
    ]

];