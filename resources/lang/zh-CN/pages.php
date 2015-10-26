<?php

/**
 * 界面显示相关内容(数据库相关表中未表示的)
 *
 */
return [
    // 各页面通用部分
    'common'    => [
        'app_name'  => 'Yoursave',
        'labels'    => [
        ],
        'buttons'   => [
            'back'      => '返回',
            'back_to_index' => '返回主页',
            'create'    => '创建',
            'cancel'    => '取消',
            'confirm'   => '确认',
            'edit'      => '修改',
            'delete'    => '删除',
            'download'  => '下载',
            'logout'    => '注销',
            'update'    => '更新'
        ],
    ],

    // 商店
    'myshop'  => [
        'title' => '商店管理',
        'edit_title'    => '商店信息修改',
        'certificate_title' => '商店认证',
        'goods_title'       => '销售商品一览',
        'users_title'       => '职员管理'
    ],
    // 生产厂家
    'mycompany' => [
        'title' => '企业管理',
        'edit_title'    => '企业信息修改',
        'certificate_title' => '企业认证',
        'goods_title'   => '生产商品一览',
        'users_title'   => '职员管理',
        ''
    ],

    // 登录页面
    'login' => [
        'title' => '登录',
        'labels' => [
            'index_panel_header'    => '登录信息',
            'u_name_or_mail'    => '用户名/邮箱',
            'password'          => '密码',
        ],
        'buttons' => [
            'login' => '登录',
            'register'  => '注册',
            'remember'  => '记住我',
            'reminder'  => '忘记密码',
            'resend_mail'   => '再次发送认证邮件',
            'reactive'      => '重新激活'
        ]
    ],
    // 用户注册
    'register'  => [
        'title' => '注册',
        'active_title'  => '账号激活',
        'labels'    => [
            'index_panel_header'    => '新用户注册',
            'active_panel_header'   => '账号信息修改',
            'password_confirm'      => '密码（确认）'
        ]
    ],
    // 用户相关界面显示内容
    'user'  => [
        // 登录界面
        'title' => '个人资料管理',
        'friends_title' => '好友管理',
        'show_title'    => '个人资料',
        'edit_title'    => '个人资料管理',

        'labels'    => [
            'show_panel_header' => '个人资料详情',
            'edit_panel_header' => '个人资料修改',
            'belonged_shop'     => '所属商店',
            'belonged_produce_company'  => '所属生产厂家',

        ]
    ],
];