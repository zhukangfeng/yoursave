<?php

/**
 * 该文件时数据库数据表示文件
 * 定义了各个数据库对应语言的表达，
 * 以及数据库特定值对应语言的表达
 */
return [
    // 数据库常用信息
    DB_COMMON   => [
        DB_COMMON_ID            => 'id',
        DB_COMMON_CREATED_BY    => 'created user',
        DB_COMMON_UPDATED_BY    => 'updated user',
        DB_COMMON_DELETED_BY    => 'deleted user',
        DB_COMMON_CREATED_AT    => 'created time',
        DB_COMMON_UPDATED_AT    => 'last updated time',
        DB_COMMON_DELETED_AT    => 'deleted time',
        DB_COMMON_PUBLIC_TYPE   => 'public type',
        'column_value'    => [
            DB_COMMON_PUBLIC_TYPE_NO                    => 'not public',
            DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL           => 'public',
            DB_COMMON_PUBLIC_TYPE_YES_FOR_REGISTERED    => 'public for all registered users',
            DB_COMMON_PUBLIC_TYPE_YES_FOR_FRIEND        => 'public for all friends'
        ]
    ],
    // 群组成员信息
    DB_CHAT_GROUP_USER_RELATIONS => [
        'tabel_name'                       => 'chat group',
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
        'tabel_name'               => 'consumes',
        DB_CONSUMES_CONSUME_NAME    => 'consume name',
        DB_CONSUMES_CONSUME_COST    => 'consume cost',
        DB_CONSUMES_CURRENCY        => 'consume currency',
        DB_CONSUMES_CONSUME_INFO    => 'consume information',
        DB_CONSUMES_CONSUME_TIME    => 'consume time',
        DB_CONSUMES_PLACE           => 'consume place'
    ],
    // 上传文件信息
    DB_FILES => [
        'tabel_name'       => 'files',
        DB_FILES_TYPE       => 'file type',
        DB_FILES_REAL_NAME  => 'file name',
        DB_FILES_SIZE       => 'file size'
    ],
    // 商品收藏
    DB_GOOD_COLLECTIONS => [
        'tabel_name'                       => 'good collections',
        DB_GOOD_COLLECTIONS_COLLECTION_TIME => 'collection time',
        DB_GOOD_COLLECTIONS_COLLECTION_INFO => 'collection information'
    ],
    // 商品评论
    DB_GOOD_COMMENTS => [
        'tabel_name'                   => 'good comments',
        DB_GOOD_COMMENTS_COMMENT_INFO   => 'comment content'
    ],
    // 商品分类信息
    DB_GOOD_KINDS => [
        'tabel_name'           => 'good kinds',
        DB_GOOD_KINDS_NAME      => 'kind name',
        DB_GOOD_KINDS_KIND_INFO => 'kind information',
        DB_GOOD_KINDS_STATUS    => 'good kind status',
        'column_value' => [
            DB_GOOD_KINDS_STATUS_INVALID => 'invalid',
            DB_GOOD_KINDS_STATUS_AUTHENTICATED => 'authenticated',
            DB_GOOD_KINDS_STATUS_CREATE_BY_USER_UNACTIVE => 'not authenticate(created by user)',
            DB_GOOD_KINDS_STATUS_CREATE_BY_SHOP_UNACTIVE => 'not authenticate(created by shop)',
            DB_GOOD_KINDS_STATUS_CREATE_BY_PRODUCE_COMPANY_UNACTIVE => 'not authenticate(created by produce company)'
        ]
    ],
    // 商品评价信息
    DB_GOOD_RANKS => [
        'tabel_name'           => 'good ranks',
        DB_GOOD_RANKS_RANK      => 'rank',
        DB_GOOD_RANKS_RANK_INFO => 'rank information'
    ],
    // 商品信息
    DB_GOODS => [
        'tabel_name'       => 'goods',
        DB_GOODS_GOOD_NAME  => 'good name',
        DB_GOODS_GOOD_INFO  => 'good information',
        DB_GOODS_STATUS     => 'good status'
    ],
    // 用户登录记录
    DB_LOG_LOGINS => [
        'tabel_name'               => 'login log',
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
        'tabel_name'   => 'Remind users'
    ],
    // 用户聊天信息
    DB_MESSAGES => [
        'tabel_name'       => 'messages',
        DB_MESSAGES_SEND_TO => 'send to',
        DB_MESSAGES_CONTENT => 'content'
    ],
    //促销信息收集
    DB_PREFERENCE_COLLECTIONS => [
        'tabel_name'                               => 'preference collections',
        DB_PREFERENCE_COLLECTIONS_COLLECTION_INFO   => 'collection information'
    ],
    // 促销信息评论
    DB_PREFERENCE_COMMENTS => [
        'tabel_name'                       => 'preference comments',
        DB_PREFERENCE_COMMENTS_COMMENT_INFO => 'comment information'
    ],
    // 商品促销信息
    DB_PREFERENCES  => [
        'tabel_name'                   => 'preference information',
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
        'tabel_name'                   => 'preference ranks',
        DB_PREFERENCES_RANKS_RANK       => 'rank',
        DB_PREFERENCES_RANKS_RANK_INFO  => 'rank information'
    ],
    // 商品生产厂家产品卖出信息
    DB_PRODUCE_COMPANY_GOOD_SELLS => [
        'tabel_name'                               => 'sold goods',
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
        'tabel_name'                       => 'company\' goods',
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
        'tabel_name'                   => 'company users',
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
        'tabel_name'                           => 'produce companys',
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
        'tabel_name'                       => 'shop collections',
        DB_SHOP_COLLECTIONS_COLLECTION_INFO => 'collection information'
    ],
    // 商店的用户评论信息
    DB_SHOP_COMMENTS => [
        'tabel_name'                   => 'shop comments',
        DB_SHOP_COMMENTS_COMMENT_INFO   => 'comment information'
    ],
    // 商店商品评论信息
    DB_SHOP_GOOD_COMMENTS => [
        'tabel_name'                       => 'good comments',
        DB_SHOP_GOOD_COMMENTS_COMMENT_INFO  => 'comment information'
    ],
    // 商店商品信息
    DB_SHOP_GOODS => [
        'tabel_name'               => 'shop\'s goods',
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
        'tabel_name'           => 'shop\' ranks',
        DB_SHIP_RANKS_RANK      => 'rank',
        DB_SHIP_RANKS_RANK_INFO => 'rank information'
    ],
    // 商品售卖商店职员信息表
    DB_SHOP_USERS => [
        'tabel_name'           => 'staffs',
        DB_SHOP_USERS_TYPE      => 'staff type',
        'column_value' => [
            DB_SHOP_USERS_EMAIL     => 'staff\' email',
            DB_SHOP_USERS_NAME      => 'staff\s name',
            DB_SHOP_USERS_POSITION  => 'staff\'s positon',
            DB_SHOP_USERS_STATUS    => 'account\' status',
            DB_SHOP_USERS_STATUS_INVALID    => 'invalid',
            DB_SHOP_USERS_STATUS_EFFECTIVE  => 'effective',
            DB_SHOP_USERS_STATUS_REQUESTING => 'requesting'
        ]
    ],
    // 商品售卖商店信息表
    DB_SHOPS => [
        'tabel_name'       => 'shops',
        DB_SHOPS_NAME       => 'shop\'s name',
        DB_SHOPS_ADDRESS    => 'shop\' address',
        DB_SHOPS_PHONE_NUM  => 'contact phone number',
        DB_SHOPS_WEB_ADDR   => 'shop website',
        DB_SHOPS_SHOP_INFO  => 'shop information',
        DB_SHOPS_STATUS     => 'shop status',
        'column_value' => [
            DB_SHOPS_STATUS_INVALID         => 'invalid',
            DB_SHOPS_STATUS_AUTHENTICATED   => 'authenticated',
            DB_SHOPS_STATUS_UNAUTHENTICATED => 'unauthenticated'
        ]
    ],
    // 对用户评价，评分表
    DB_USER_RANKS => [
        'tabel_name'           => 'user\'s ranks',
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
        'tabel_name'               => 'friend relations',
        DB_USER_RELATIONS_STATUS    => 'friend relation',
        'column_value' => [
            DB_USER_RELATIONS_STATUS_INVALID    => 'invalid',
            DB_USER_RELATIONS_STATUS_EFFECTIVE  => 'effective',
            DB_USER_RELATIONS_STATUS_REQUESTIN  => 'requesting'
        ]
    ],
    // 用户分享信息评论信息表
    DB_USER_SHARE_COMMENTS => [
        'tabel_name'                       => 'share comments',
        DB_USER_SHARE_COMMENTS_COMMENT_INFO => 'comment information'
    ],
    // 用户分享信息表（店铺，打折信息等）
    DB_USER_SHARES => [
        'tabel_name'               => 'user shares',
        DB_USER_SHARES_SHARE_NAME   => 'share name',
        DB_USER_SHARES_SHARE_URL    => 'url',
        DB_USER_SHARES_SHARE_INFO   => 'share information',
        DB_USER_SHARES_TYPE         => 'share type',
        'column_value' => [
            DB_USER_SHARES_TYPE_PREFERENCE              => 'preference',
            DB_USER_SHARES_TYPE_GOOD                    => 'good',
            DB_USER_SHARES_TYPE_good_kind               => 'good kind',
            DB_USER_SHARES_TYPE_shop_good               => 'shop good',
            DB_USER_SHARES_TYPE_produce_company_good    => 'produce company good',
            DB_USER_SHARES_TYPE_shop                    => 'shop',
            DB_USER_SHARES_TYPE_produce_company         => 'produce company'
        ]
    ],
    // 用户信息表。
    'users' => [
        'u_name'        => 'nick name',
        'f_name'        => 'first name',
        'l_name'        => 'last name',
        'login_mail'    => 'login email address',
        'contact_email' => 'contact email address',
        'password'      => 'password',
        'post_code'     => 'post code',
        'address'       => 'address',
        'home_phone'    => 'home phone number',
        'mobile_phone'  => 'mobile phone number',
        'birthday'      => 'birthday',
        'sex'           => 'sex',
        'currency'      => 'currency',
        'language'      => 'language',
        'autheriticate_type'                 => 'authenticate type',
        'receive_collection_message_type'    => 'receive massage type',
        'status'                             => 'account status',
        'created_ip'                         => 'created ip adddress',
        'column_value' => [
            DB_USERS_STATUS_INVALID     => 'invalid',
            DB_USERS_STATUS_EFFECITVE   => 'effective',
            DB_USERS_STATUS_REQUESTING  => 'requesting mail checking',
            DB_USERS_AUTHERITICATE_TYPE_UNAUTHENTICATED => 'unauthenticated',
            DB_USERS_AUTHERITICATE_TYPE_OFFICIAL_AUTH   => 'official authenticated',
            DB_USERS_AUTHERITICATE_TYPE_COMMON_AUTH     => 'common authenticated',
            DB_USERS_LANGUAGE_EN    => 'English',
            DB_USERS_LANGUAGE_ZH_CN => '日本語',
            DB_USERS_LANGUAGE_JA    => '简体中文'
        ]
    ]
];