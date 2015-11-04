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
            'response_user_name'    => '负责人',
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
        'title' => [
            'index' => '商店管理',
            'show'  => '商店详情',
            'edit'  => '商店信息修改',
            'certificate'   => '商店认证',
            'goods' => '销售商品一览',
            'users' => '职员管理'
        ],
        'labels'    => [
            'show_panel_header' => '商店',
            'edit_panel_header' => '商店信息修改',
            'shop_icon' => '商店图标'
        ],

        'users' => [
            'title' => [
                'index' => '商店职员列表',
                'create'    => '商店职员添加',
                'show'  => '商店职员详情',
                'edit'  => '商店职员信息修改'
            ],
            'labels'    => [
                'index_panel_header'    => '商店职员信息一览',
                'create_panel_header'   => '商店职员添加',
                'show_panel_header'     => '商店职员详情',
                'edit_panel_header'     => '商店职员信息修改'
            ]

        ]
    ],
    // 生产厂家
    'mycompany' => [
        'title' => [
            'index' => '企业管理',
            'show'  => '企业详情',
            'edit'    => '企业信息修改',
            'certificate' => '企业认证',
            'goods'   => '生产商品一览',
            'users'   => '职员管理',
        ]
    ],

    // 登录页面
    'login' => [
        'title' => [
            'index' => '登录'
        ],
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
        'title' => [
            'index' => '注册',
            'active'  => '账号激活'
        ],
        'labels'    => [
            'index_panel_header'    => '新用户注册',
            'active_panel_header'   => '账号信息修改',
            'password_confirm'      => '密码（确认）'
        ]
    ],
    // 用户相关界面显示内容
    'user'  => [
        // 登录界面
        'title' => [
            'index'   => '个人资料管理',
            'friends' => '好友管理',
            'show'    => '个人资料',
            'edit'    => '个人资料管理'
        ],

        'labels'    => [
            'show_panel_header' => '个人资料详情',
            'edit_panel_header' => '个人资料修改',
            'belonged_shop'     => '所属商店',
            'belonged_produce_company'  => '所属生产厂家',
            'user_icon'     => '头像',
            'user_photo'    => '个人图片'
        ]
    ],
];
