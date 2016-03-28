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
            'accept'    => '接受',
            'back'      => '返回',
            'back_to_index' => '返回主页',
            'back_to_list'  => '返回一览页面',
            'create'    => '创建',
            'cancel'    => '取消',
            'confirm'   => '确认',
            'edit'      => '修改',
            'delete'    => '删除',
            'download'  => '下载',
            'login'     => '登录',
            'logout'    => '注销',
            'search'    => '搜索',
            'reset'     => '重置',
            'update'    => '更新'
        ],
        'options'   => [
            'default_no_condition_option'    => '无限制',
            'no_option'   => '无'
        ]
    ],

    // 用户商店和生产厂家账户管理
    'accounts'  => [
        'title' => [
            'index' => '受邀账户一览',
            'show'  => '受邀账户详情'
        ],
        'labels'    => [
            'index_panel_header'    => '账户一览',
            'show_panel_header'     => '消费详情',
            'account_type'  => '账户类型',
            'shop_account'  => '商店职员账户',
            'allowed_name'  => '账户所属',
            'status'        => '账户状态',
            'inviting_user' => '邀请人',
            'operating'     => '操作'
        ]
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
        ],

    ],

    // 个人消费记录
    'consumes'  => [
        'title' => [
            'index'     => '消费记录',
            'create'    => '新建消费记录',
            'show'      => '消费记录详情',
            'edit'      => '消费记录修改'
        ],
        'description'   => [
            'good_name' => '输入商品名称，可以搜索后关联系统内的商品。也可以只输入商品记录名，不进行关联。',
            'shop_name' => '输入商店名称，可以搜索后关联系统内的商店。也可以只输入商店记录名，不进行关联。'
        ],

        'labels'    => [
            'index_panel_header'    => '个人消费记录',
            'create_panel_header'   => '个人消费记录添加',
            'show_panel_header'     => '个人消费详情',
            'edit_panel_header'     => '个人消费记录修改',
            'search_by_name'        => '消费名搜索',
            'search_by_good_name'   => '商品名搜索',
            'search_by_shop_name'   => '商店名搜索',
            'begin_consume_time'    => '开始时间',
            'end_consume_time'      => '结束时间',
            'last_week_cost'        => '最近一个星期消费额',
            'last_month_cost'       => '最近一个月消费额',
            'last_three_months_cost'=> '最近三个月消费额',
            'last_sex_months_cost'  => '最近半年消费额',
            'last_year_cost'        => '最近一年消费额',
            'total_cost'            => '总计：:cost',
            'page_total_cost'       => '该页总计：:cost'
        ],
        'placeholder'   => [
            'search_by_name'        => '消费名',
            'search_by_good_name'   => '商品名',
            'search_by_shop_name'   => '商店名'
        ]
    ],
    
    // 商品分类信息
    'good_kinds' => [
        'title' => [
            'index' => '商品种类',
            'create'    => '商品分类添加',
            'show'  => '商品分类详情',
            'edit'  => '商品分类信息修改'
        ],
        'labels'    => [
            'index_panel_header'    => '商品分类信息',
            'create_panel_header'   => '创建商品分类',
            'show_panel_header'     => '商品分类详情',
            'search_by_name'    => '商品分类名',
            'parent_name'   => '上级分类',
            'has_parent'    => '拥有父类',
            'no_parent'     => '没有父类',
            'child_good_kinds'  => '商品子类',
            'has_child_good_kinds'  => '可以有子类',
            'no_child_good_kinds'   => '不能有子类'
        ],
        'placeholder'   => [
            'search_by_name'    => '商品分类名或者分类信息关键词搜索，多个关键词中间请用空格分开',
            'search_by_parent_name'  => '父分类信息搜索'
        ]
    ],

    // 商品信息
    'goods' => [
        'title' => [
            'info'  => '商品信息',
            'index' => '商品一览',
            'create'    => '新建商品信息',
            'good_kinds'    => '商品分类',
            'shops' => '销售商店',
            'produce_companies' => '生产厂家'
        ],
        'labels'    => [
            'index_panel_header'    => '商品信息',
            'create_panel_header'   => '创建商品',
            'show_panel_header'     => '商品详情',
            'search_by_key'    => '商品关键词',
            'good_kind'    => '商品分类',
            'create_type'   => '创建身份',
            'created_by_user'   => '普通用户',
            'created_by_shop_user'  => '商店职员',
        ],
        'placeholder'   => [
            'search_by_key'    => '商品名或者信息关键词搜索，多个关键词中间请用空格分开',
            'search_by_good_kind_name'  => '分类信息搜索'
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

    // 促销信息
    'preferences'   => [
        'title' => [
            'index' => '促销信息'
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

    'shops' => [
        'title' => [
            'index' => '商店一览',
            'show'  => '商店详情',
            'create'    => '新建商店信息'
        ],

        'buttons'    => [
            'authenticate'  => '认证',
            'shop_goods'    => '商品一览'
        ],

        'labels'    => [
            'index_panel_header'    => '商店信息一览',
            'show_panel_header'     => '商店详细信息',
            'create_panel_header'   => '新建商店信息',
            'search_by_key'         => '关键词搜索',
            'create_type'           => '创建方式',
            'created_by_user'       => '普通用户创建',
            'created_by_shop_user'  => '商店所有者创建',
            'shop_goods'    => '商品一览'
        ],
        'placeholder'   => [
            'search_by_key'    => '商店名称或者信息关键词搜索，多个关键词中间请用空格分开',
        ],

        'goods' => [
            'title' => [
                'index' => '商店商品一览',
                'show'  => '商店商品详情',
                'create' => '商店商品创建'
            ],
            'buttons'   => [
                'back_shop_detail'  => '返回商店信息'
            ],
            'labels'    => [
                'index_panel_header'    => ':shop_name-商品信息一览',
                'show_panel_header'     => '商店商品信息一览',
                'create_panel_header'     => '商店商品信息创建',
                'search_by_key'         => '关键词搜索',
                'search_by_name'        => '商品名搜索',
                'search_by_produce_company_name'    => '生产厂家搜索'
            ],
            'placeholder'   => [
                'search_by_key'    => '商店名称或者信息',
                'search_by_good_name'    => '商品名称',
                'search_by_produce_company_name'    => '商店生产厂家搜索',
            ],
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
