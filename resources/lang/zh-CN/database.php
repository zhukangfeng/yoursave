<?php

/**
 * 该文件时数据库数据表示文件
 * 定义了各个数据库对应语言的表达，
 * 以及数据库特定值对应语言的表达
 */
return [
    // 数据库常用信息
    'common'   => [
        'id'            => 'id',
        'created_by'    => '创建者',
        'updated_by'    => '更新者',
        'deleted_by'    => '删除者',
        'created_at'    => '创建时间',
        'updated_at'    => '最后更新时间',
        'deleted_at'    => '删除时间',
        'public_type'   => '公开类型',
        'currency'      => '货币',
        'column_value'    => [
            'public_type'   => [
                DB_COMMON_PUBLIC_TYPE_NO                    => '不公开',
                DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL           => '公开',
                DB_COMMON_PUBLIC_TYPE_YES_FOR_REGISTERED    => '注册用户公开',
                DB_COMMON_PUBLIC_TYPE_YES_FOR_AUTHENTICATED => '认证用户公开',
                DB_COMMON_PUBLIC_TYPE_YES_FOR_FRIEND        => '对好友公开'
            ],
            'currency'  => [
                DB_COMMON_CURRENCY_RMB   => '人民币',
                DB_COMMON_CURRENCY_USD   => '美元',
                DB_COMMON_CURRENCY_JPY   => '日元'
            ]
        ]
    ],
    // 群组成员信息
    DB_CHAT_GROUP_USER_RELATIONS => [
        'table_name'                       => 'chat group',
        DB_CHAT_GROUP_USER_RELATIONS_TYPE   => 'group type',
        DB_CHAT_GROUP_USER_RELATIONS_INVITED_BY => 'invited user',
        'column_value'    => [
            DB_CHAT_GROUP_USER_RELATIONS_TYPE_OWNER     => 'owner user',
            DB_CHAT_GROUP_USER_RELATIONS_TYPE_ADMIN     => 'admin user',
            DB_CHAT_GROUP_USER_RELATIONS_TYPE_COMMON    => 'common user',
            DB_CHAT_GROUP_USER_RELATIONS_TYPE_GUEST     => 'guest user'
        ]
    ],
    // 群组信息
    DB_CHAT_GROUPS => [
        DB_CHAT_GROUPS_NAME             => 'group name',
        DB_CHAT_GROUPS_CHAT_GROUP_INFO  => 'group information',
        DB_CHAT_GROUPS_CHAT_GROUP_OWNER => 'group owner',
        DB_CHAT_GROUPS_TYPE             => 'group type',
        'column_value' => [
            DB_CHAT_GROUPS_TYPE_PERMANENT   => 'permanent group',
            DB_CHAT_GROUPS_TYPE_TEMPORARY   => 'temporary group'
        ]
    ],
    // 用户的消费信息
    DB_CONSUMES => [
        'table_name'    => 'consumes',
        'consume_name'  => '消费名',
        'shop_name'     => '商店名',
        'good_name'     => '商品名',
        'consume_cost'  => '消费金额',
        'consume_time'  => '消费时间',
        'consume_info'  => '消费详情',
        'place'         => '消费地点'
    ],
    // 上传文件信息
    'files' => [
        'table_name'    => '文件',
        'type'          => '文件类型',
        'path'          => '文件路径',
        'save_name'     => '文件保存名',
        'real_name'     => '文件名',
        'size'          => '文件大小'
    ],
    // 商品收藏
    DB_GOOD_COLLECTIONS => [
        'table_name'                       => 'good collections',
        DB_GOOD_COLLECTIONS_COLLECTION_TIME => 'collection time',
        DB_GOOD_COLLECTIONS_COLLECTION_INFO => 'collection information'
    ],
    // 商品评论
    DB_GOOD_COMMENTS => [
        'table_name'                   => 'good comments',
        DB_GOOD_COMMENTS_COMMENT_INFO   => 'comment content'
    ],
    // 商品分类信息
    'good_kinds' => [
        'table_name'           => '商品种类信息',
        'name'      => '商品分类名称',
        'kind_info' => '商品分类介绍',
        'status' => '分类状态',
        'column_value' => [
            'status'    => [
                DB_GOOD_KINDS_STATUS_INVALID        => '无效',
                DB_GOOD_KINDS_STATUS_AUTHENTICATED  => '权威认证',
                DB_GOOD_KINDS_STATUS_CREATE_BY_USER_UNACTIVE => '未认证（用户创建）',
                DB_GOOD_KINDS_STATUS_CREATE_BY_SHOP_UNACTIVE => '未认证（商店创建）',
                DB_GOOD_KINDS_STATUS_CREATE_BY_PRODUCE_COMPANY_UNACTIVE => '未认证（生产厂家创建）'
            ],
            'has_children'  => [
                DB_GOOD_KINDS_CAN_HAS_CHILDREN_NO   => '不再含子分类',
                DB_GOOD_KINDS_CAN_HAS_CHILDREN_YES  => '可以含有子分类'
            ]
        ]
    ],
    // 商品评价信息
    DB_GOOD_RANKS => [
        'table_name'           => 'good ranks',
        DB_GOOD_RANKS_RANK      => 'rank',
        DB_GOOD_RANKS_RANK_INFO => 'rank information'
    ],
    // 商品信息
    DB_GOODS => [
        'table_name'    => '商品信息',
        'good_name'     => '商品名称',
        'good_info'     => '商品信息',
        'status'        => '商品状态',
        'column_value'  => [
            'status'    => [
                DB_GOOD_STATUS_INVALID        => '无效',
                DB_GOOD_STATUS_AUTHENTICATED  => '权威认证',
                DB_GOOD_STATUS_CREATE_BY_USER_UNACTIVE => '未认证（用户创建）',
                DB_GOOD_STATUS_CREATE_BY_SHOP_UNACTIVE => '未认证（商店创建）',
                DB_GOOD_STATUS_CREATE_BY_PRODUCE_COMPANY_UNACTIVE => '未认证（生产厂家创建）'
            ]
        ]
    ],
    // 用户登录记录
    DB_LOG_LOGINS => [
        'table_name'               => 'login log',
        DB_LOG_LOGIN_LOG_IP         => 'login ip',
        DB_LOG_LOGIN_LOG_HTTP_INFO  => 'login http information',
        DB_LOG_LOGIN_STATUS         => 'login status',
        'column_value' => [
            DB_LOG_LOGIN_STATUS_SUCCESS         => 'success',
            DB_LOG_LOGIN_STATUS_PASSWORD_ERROR  => 'password error',
            DB_LOG_LOGIN_STATUS_OTHER           => 'other'
        ]
    ],
    // 聊天记录中提醒的用户信息
    DB_MESSAGE_REMIND_USER_RELATIONS => [
        'table_name'   => 'Remind users'
    ],
    // 用户聊天信息
    DB_MESSAGES => [
        'table_name'       => 'messages',
        DB_MESSAGES_SEND_TO => 'send to',
        DB_MESSAGES_CONTENT => 'content'
    ],
    //促销信息收集
    DB_PREFERENCE_COLLECTIONS => [
        'table_name'                               => 'preference collections',
        DB_PREFERENCE_COLLECTIONS_COLLECTION_INFO   => 'collection information'
    ],
    // 促销信息评论
    DB_PREFERENCE_COMMENTS => [
        'table_name'                       => 'preference comments',
        DB_PREFERENCE_COMMENTS_COMMENT_INFO => 'comment information'
    ],
    // 商品促销信息
    DB_PREFERENCES  => [
        'table_name'                   => 'preference information',
        DB_PREFERENCES_SHOP_NAME        => 'shop name',
        DB_PREFERENCES_ORIGINAL_PRICE   => 'original price',
        DB_PREFERENCES_DISCOUNT_PRICE   => 'discount price',
        DB_PREFERENCES_INFOR_URL        => 'information url',
        DB_PREFERENCES_PREFERENCE_INFO  => 'preference information',
        DB_PREFERENCES_BEGIN_TIME       => 'begin time',
        DB_PREFERENCES_END_TIME         => 'end time'
    ],
    // 促销信息评分信息
    DB_PREFERENCES_RANKS => [
        'table_name'                   => 'preference ranks',
        DB_PREFERENCES_RANKS_RANK       => 'rank',
        DB_PREFERENCES_RANKS_RANK_INFO  => 'rank information'
    ],
    // 商品生产厂家产品卖出信息
    DB_PRODUCE_COMPANY_GOOD_SELLS => [
        'table_name'                               => 'sold goods',
        DB_PRODUCE_COMPANY_GOOD_SELLS_SHOP_NAME     => 'shop name',
        DB_PRODUCE_COMPANY_GOOD_SELLS_COST          => 'cost',
        DB_PRODUCE_COMPANY_GOOD_SELLS_PRICE         => 'price',
        DB_PRODUCE_COMPANY_GOOD_SELLS_CURRENCY      => 'currency',
        DB_PRODUCE_COMPANY_GOOD_SELLS_SELL_NUMBER   => 'sold number',
        DB_PRODUCE_COMPANY_GOOD_SELLS_STATUS        => 'status',
        'column_value' => [
            DB_PRODUCE_COMPANY_GOOD_SELLS_STATUS_INVALID    => 'invalid',
            DB_PRODUCE_COMPANY_GOOD_SELLS_STATUS_COMPLETED  => 'compeleted',
            DB_PRODUCE_COMPANY_GOOD_SELLS_STATUS_DISCUSSING => 'discussing',
            DB_PRODUCE_COMPANY_GOOD_SELLS_STATUS_CONTRACTED => 'contracted',
            DB_PRODUCE_COMPANY_GOOD_SELLS_STATUS_DELIVERING => 'delivering',
            DB_PRODUCE_COMPANY_GOOD_SELLS_STATUS_DELIVERED  => 'delivered'
        ]
    ],
    // 生产厂家产品信息
    DB_PRODUCE_COMPANY_GOODS => [
        'table_name'                       => 'company\' goods',
        DB_PRODUCE_COMPANY_GOODS_PRICE      => 'price',
        DB_PRODUCE_COMPANY_GOODS_COST       => 'cost',
        DB_PRODUCE_COMPANY_GOODS_CURRENCY   => 'currency',
        DB_PRODUCE_COMPANY_GOODS_GOOD_INFO  => 'good information',
        DB_PRODUCE_COMPANY_GOODS_STATUS     => 'status',
        'column_value' => [
            DB_PRODUCE_COMPANY_GOODS_STATUS_CLOSED      => 'closed',
            DB_PRODUCE_COMPANY_GOODS_STATUS_EFFECTIVE   => 'effective',
            DB_PRODUCE_COMPANY_GOODS_STATUS_REQUESTING  => 'requesting'
        ]
    ],
    // 商品生产厂家用户信息
    DB_PRODUCE_COMPANY_USERS => [
        'table_name'                   => 'company users',
        DB_PRODUCE_COMPANY_USERS_STATUS => 'status',
        DB_PRODUCE_COMPANY_USERS_TYPE   => 'user type',
        'column_value' => [
            DB_PRODUCE_COMPANY_USERS_TYPE_ADMIN     => 'admin',
            DB_PRODUCE_COMPANY_USERS_TYPE_MANAGER   => 'mange',
            DB_PRODUCE_COMPANY_USERS_TYPE_COMMON    => 'common',
            DB_PRODUCE_COMPANY_USERS_TYPE_GUEST     => 'guest'
        ]
    ],
    // 商品生产厂家信息
    DB_PRODUCE_COMPANYS => [
        'table_name'                           => 'produce companys',
        DB_PRODUCE_COMPANYS_NAME                => 'name',
        DB_PRODUCE_COMPANYS_ADDRESS             => 'address',
        DB_PRODUCE_COMPANYS_PHONE_NUM           => 'phone number',
        DB_PRODUCE_COMPANYS_POST_ADDR           => 'post address',
        DB_PRODUCE_COMPANYS_RESPONSE_EMAIL      => 'response email',
        DB_PRODUCE_COMPANYS_CORP_INFO           => 'company information',
        DB_PRODUCE_COMPANYS_STATUS              => 'status',
        'column_value' => [
            DB_PRODUCE_COMPANYS_STATUS_INVALID          => 'invalid',
            DB_PRODUCE_COMPANYS_STATUS_AUTHENTICATED    => 'authenticated',
            DB_PRODUCE_COMPANYS_STATUS_UNAUTHENTICATED  => 'unauthenticated'
        ]
    ],
    // 商品商店收集
    DB_SHOP_COLLECTIONS => [
        'table_name'                       => 'shop collections',
        DB_SHOP_COLLECTIONS_COLLECTION_INFO => 'collection information'
    ],
    // 商店的用户评论信息
    DB_SHOP_COMMENTS => [
        'table_name'                   => 'shop comments',
        DB_SHOP_COMMENTS_COMMENT_INFO   => 'comment information'
    ],
    // 商店商品评论信息
    DB_SHOP_GOOD_COMMENTS => [
        'table_name'                       => 'good comments',
        DB_SHOP_GOOD_COMMENTS_COMMENT_INFO  => 'comment information'
    ],
    // 商店商品信息
    DB_SHOP_GOODS => [
        'table_name'               => 'shop\'s goods',
        DB_SHOP_GOODS_COST          => 'cost',
        DB_SHOP_GOODS_PRICE         => 'price',
        DB_SHOP_GOODS_CURRENCY      => 'currency',
        DB_SHOP_GOODS_GOOD_INFO     => 'good information',
        DB_SHOP_GOODS_STATUS        => 'status',
        'column_value' => [
            DB_SHOP_GOODS_STATUS_INVALID    => 'invalid',
            DB_SHOP_GOODS_STATUS_EFFECTIVE  => 'effective',
            DB_SHOP_GOODS_STATUS_REQUSTING  => 'requesting'
        ]
    ],
    // 商店评价
    DB_SHOP_RANKS => [
        'table_name'           => 'shop\' ranks',
        DB_SHIP_RANKS_RANK      => 'rank',
        DB_SHIP_RANKS_RANK_INFO => 'rank information'
    ],
    // 商品售卖商店职员信息表
    'shop_users' => [
        'table_name'           => '商店职员信息',
        'type'      => '职员类型',
        'email'     => '职员邮箱',
        'position'  => '职员职位',
        'status'    => '账户状态',
        
        'column_value' => [
            'status'    => [
                DB_SHOP_USERS_STATUS_INVALID    => '无效',
                DB_SHOP_USERS_STATUS_EFFECTIVE  => '有效',
                DB_SHOP_USERS_STATUS_REQUESTING => '邀请中'
            ],
            'type'  => [
                DB_SHOP_USERS_TYPE_ADMIN    => '管理员',
                DB_SHOP_USERS_TYPE_MANAGER  => '经理',
                DB_SHOP_USERS_TYPE_COMMON   => '普通用户',
                DB_SHOP_USERS_TYPE_GUEST    => '阅览用户'
            ],
        ]
    ],
    // 商品售卖商店信息表
    'shops' => [
        'table_name'    => '商店信息',
        'name'          => '商店名',
        'address'       => '商店地址',
        'phone_num'     => '联系电话',
        'contact_mail'  => '联系邮箱',
        'web_addr'      => '商店网址',
        'shop_info'     => '商店详情',
        'status'        => '商店状态',
        'column_value' => [
            'status'    => [
                DB_SHOPS_STATUS_INVALID         => '无效',
                DB_SHOPS_STATUS_AUTHENTICATED   => '已认证',
                DB_SHOPS_STATUS_UNAUTHENTICATED => '未认证'
            ]
        ]
    ],
    // 对用户评价，评分表
    DB_USER_RANKS => [
        'table_name'           => 'user\'s ranks',
        DB_USER_RANKS_RANK      => 'rank',
        DB_USER_RANKS_RANK_INFO => 'rank information'
    ],
    // 用户的好友分组数据表
    DB_USER_RELATION_GROUPS => [
        DB_USER_RELATION_GROUPS_NAME        => 'group name',
        DB_USER_RELATION_GROUPS_GROUP_INFO  => 'group information'
    ],
    // 好友关系情况
    DB_USER_RELATIONS => [
        'table_name'               => 'friend relations',
        DB_USER_RELATIONS_STATUS    => 'friend relation',
        'column_value' => [
            DB_USER_RELATIONS_STATUS_INVALID    => 'invalid',
            DB_USER_RELATIONS_STATUS_EFFECTIVE  => 'effective',
            DB_USER_RELATIONS_STATUS_REQUESTIN  => 'requesting'
        ]
    ],
    // 用户分享信息评论信息表
    DB_USER_SHARE_COMMENTS => [
        'table_name'                       => 'share comments',
        DB_USER_SHARE_COMMENTS_COMMENT_INFO => 'comment information'
    ],
    // 用户分享信息表（店铺，打折信息等）
    DB_USER_SHARES => [
        'table_name'               => 'user shares',
        DB_USER_SHARES_SHARE_NAME   => 'share name',
        DB_USER_SHARES_SHARE_URL    => 'url',
        DB_USER_SHARES_SHARE_INFO   => 'share information',
        DB_USER_SHARES_TYPE         => 'share type',
        'column_value' => [
            DB_USER_SHARES_TYPE_PREFERENCE              => 'preference',
            DB_USER_SHARES_TYPE_GOOD                    => 'good',
            DB_USER_SHARES_TYPE_GOOD_KIND               => 'good kind',
            DB_USER_SHARES_TYPE_SHOP_GOOD               => 'shop good',
            DB_USER_SHARES_TYPE_PRODUCE_COMPANY_GOOD    => 'produce company good',
            DB_USER_SHARES_TYPE_SHOP                    => 'shop',
            DB_USER_SHARES_TYPE_PRODUCE_COMPANY         => 'produce company'
        ]
    ],
    // 用户信息表。
    'users' => [
        'u_name'        => '用户昵称',
        'f_name'        => '名',
        'l_name'        => '姓',
        'login_mail'    => '登录邮箱地址',
        'contact_email' => '联系邮箱地址',
        'password'      => '密码',
        'post_code'     => '邮编',
        'address'       => '地址',
        'home_phone'    => '家庭电话',
        'mobile_phone'  => '移动电话',
        'birthday'      => '生日',
        'sex'           => '性别',
        'currency'      => '使用货币',
        'language'      => '使用系统语言',
        'autheriticate_type'                => '用户认证等级',
        'receive_collection_message_type'   => '接受推送消息类型',
        'status'        => '账户状态',
        'created_ip'    => '注册IP地址',
        'column_value' => [
            'sex'   => [
                DB_USERS_SEX_MAN    => '男性',
                DB_USERS_SEX_WOMAN  => '女性'
            ],
            'language'  => [
                DB_USERS_LANGUAGE_ZH_CN => '简体中文',
                DB_USERS_LANGUAGE_EN    => 'English',
                DB_USERS_LANGUAGE_JA    => '日本語'
            ],
            'autheriticate_type'    => [
                DB_USERS_AUTHERITICATE_TYPE_UNAUTHENTICATED => '未认证',
                DB_USERS_AUTHERITICATE_TYPE_OFFICIAL_AUTH   => '官方认证',
                DB_USERS_AUTHERITICATE_TYPE_COMMON_AUTH     => '普通认证'
            ],
            'receive_collection_message_type'   => [
                DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_NO     => '不公开',
                DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL    => '接受所有',
                DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_RECEVIE_SELF_COLLECTION    => '接受自己收藏',
                DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_RECEVIE_FRIEND_COLLECTION  => '接受好友收藏',
                DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_RECEVIE_OFFICAL_SHOP       => '接受官方认证商店',
                DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_RECEVIE_OFFICAL_PRODUCE_COMPANY    => '接受官方认证生产厂家',
                DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_RECEIVE_ALL_SHOP                   => '接受所有商店',
                DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_RECEIVE_ALL_PRODUCE_COMPANY        => '接受所有生产厂家'
            ],
            'status'    => [
                DB_USERS_STATUS_INVALID     => '无效',
                DB_USERS_STATUS_EFFECITVE   => '有效',
                DB_USERS_STATUS_REQUESTING  => '等待邮件认证'
            ],
        ]
    ]
];
