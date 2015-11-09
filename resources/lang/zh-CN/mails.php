<?php
/**
 * 邮件中相关内容
 *
 * @return array
 */
return [
    'common'    => [
        'from_name' => 'Yoursave',
        'subject'   => 'Yoursave 信息邮件',
        'mail_receiver_name'    => ':name先生/女士，您好：'
    ],
    'myshop' => [
        'users' => [
            'check_mail_for_unregistered' => [
                'title' => '账号邀请',
                'subject'   => '(:shop_name)商店账户邀请邮件',
                'from'  => trans('pages.common.app_name'),
                'body'  => '<label>尊敬的用户，你好，来自商店（:shop_name）的 :inviting_user_name' . trans('pages.common.app_name')
                    . '。</label><br />'
                    . '请登录后完成账户信息填写。<br>'
                    . '您的激活网址url是（' . asset('/register/check?token=') . ':active_token）。<br />'
                    . 'url有效时间为' . REGISTER_CHECK_URL_EFFECTIVE_HOUR . '小时，请在:active_token_time之前激活。<br />'
                    . '超过该时间，该url将无效。'
                    . '<br />'
            ],
            'info_mail_for_registered_user' => [
                'title' => '账号邀请',
                'subject'   => '(:shop_name)商店账户邀请邮件',
                'from'  => trans('pages.common.app_name'),
                'body'  => '<label>尊敬的用户，你好，来自商店（:shop_name）的 :inviting_user_name' . trans('pages.common.app_name')
                    . '。</label><br />'
                    . '请登录账号，并且在（' . asset('/accounts') . '）完成账户邀请。<br />'
                    . '<br />'
            ]
        ]
    ],
    'register'  => [
        'title' => '验证邮件',
        'subject'   => '验证邮件(' . trans('pages.common.app_name') . ')',
        'from'      => trans('pages.common.app_name'),
        'body'      => '<label>尊敬的用户，你好，欢迎注册' . trans('pages.common.app_name')
            . '。</label><br />'
            . '您的激活网址url是（' . asset('/register/check?token=') . ':active_token）。<br />'
            . 'url有效时间为' . REGISTER_CHECK_URL_EFFECTIVE_HOUR . '小时，请在:active_token_time之前激活。<br />'
            . '超过该时间，该url将无效。'
            . '<br />'
    ]
];