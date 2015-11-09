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
            'fullname' => '姓名'
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

    // 收藏
    'collections'   => [
        'title' => [
            'info'  => '收藏',
            'index' => '收藏一览',
            'preferences'   => '促销信息',
            'goods' => '商品',
            'shops' => '店铺',
            'shop_goods'    => '店铺商品',
            'produce_companies'  => '生产厂家',
            'produce_company_goods' => '厂家商品'

        ]

    ],

    // 个人消费记录
    'consumes'  => [
        'title' => [
            'index' => '消费清单'
        ]
    ],
    
    // 促销信息
    'preferences'   => [
        'title' => [
            'index' => '促销信息'
        ]
    ],

    // 商品信息
    'goods' => [
        'title' => [
            'info'  => '商品信息',
            'index' => '商品一览',
            'good_kinds'    => '商品分类',
            'shops' => '销售商店',
            'produce_companies' => '生产厂家'
        ]

    ],

    // 商品分类信息
    'good_kinds' => [
        'title' => [
            'index' => '商品种类'
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

    // 分享
    'shares'   => [
        'title' => [
            'info'  => '分享',
            'index' => '分享一览',
            'preferences'   => '促销信息',
            'goods' => '商品',
            'shops' => '店铺',
            'shop_goods'    => '店铺商品',
            'produce_companies'  => '生产厂家',
            'produce_company_goods' => '厂家商品'

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

   // 商店
    'myshop'  => [
        'title' => [
            'index' => '商店管理',
            'show'  => '商店详情',
            'edit'  => '商店信息修改',
            'certificate'   => '商店认证',
            'preferences'   => '促销信息',
            'goods' => '销售商品',
            'users' => '职员管理'
        ],
        'labels'    => [
            'show_panel_header' => '商店',
            'edit_panel_header' => '商店信息修改',
            'shop_icon' => '商店图标',
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
                'edit_panel_header'     => '商店职员信息修改',
                'create_type'   => '用户情况',
                'shop_user_created_from_exist_user' => '既存普通账号关联',
                'shop_user_created_by_new_user'     => '新建用户账号',
                'multi_mail_input'      => '复数邮箱输入可，每一行请输入一个邮箱地址。如果该邮箱地址未登录，将进行注册。'
            ]

        ]
    ],

    // 生产厂家
    'produce_companies'  => [
        'title' => [
            'index' => '生产厂家'
        ]
    ],

    //生活记录
    'records'   => [
        'title' => [
            'info'  => '小笔记',
            'consumes'  => '消费记录',
            'diaries'   => '生活记录'
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

    'shops' => [
        'title' => [
            'index' => '商店'
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
