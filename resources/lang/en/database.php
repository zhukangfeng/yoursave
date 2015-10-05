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
        DB_COMMON_DELETED_AT    => 'deleted time'
    ],
    // 群组成员信息
    DB_CHAT_GROUP_USER_RELATIONS => [
        DB_TABLE_NAME => 'chat group',
        DB_CHAT_GROUP_USER_RELATIONS_TYPE           => [
            DB_TABLE_COLUMN_NAME                        => 'group type',
            DB_CHAT_GROUP_USER_RELATIONS_TYPE_OWNER     => 'owner user',
            DB_CHAT_GROUP_USER_RELATIONS_TYPE_ADMIN     => 'admin user',
            DB_CHAT_GROUP_USER_RELATIONS_TYPE_COMMON    => 'common user',
            DB_CHAT_GROUP_USER_RELATIONS_TYPE_GUEST     => 'guest user'
        ],
        DB_CHAT_GROUP_USER_RELATIONS_INVITED_BY => 'invited user'
    ],
    // 群组信息
    DB_CHAT_GROUPS => [
        DB_CHAT_GROUPS_NAME             => 'group name',
        DB_CHAT_GROUPS_CHAT_GROUP_INFO  => 'group information',
        DB_CHAT_GROUPS_CHAT_GROUP_OWNER => 'group owner',
        DB_CHAT_GROUPS_TYPE             => [
            DB_TABLE_COLUMN_NAME            => 'group type',
            DB_CHAT_GROUPS_TYPE_PERMANENT   => 'permanent group',
            DB_CHAT_GROUPS_TYPE_TEMPORARY   => 'temporary group'
        ]
    ],
    // 用户的消费信息
    DB_CONSUMES => [
        DB_TABLE_NAME               => 'consumes',
        DB_CONSUMES_CONSUME_NAME    => 'consume name',
        DB_CONSUMES_CONSUME_COST    => 'consume cost',
        DB_CONSUMES_CURRENCY        => 'consume currency',
        DB_CONSUMES_CONSUME_INFO    => 'consume information',
        DB_CONSUMES_CONSUME_TIME    => 'consume time',
        DB_CONSUMES_PLACE           => 'consume place'
    ],
    // 上传文件信息
    DB_FILES => [
        DB_TABLE_NAME       => 'files',
        DB_FILES_TYPE       => 'file type',
        DB_FILES_REAL_NAME  => 'file name',
        DB_FILES_SIZE       => 'file size'
    ],
    // 商品收藏
    DB_GOOD_COLLECTIONS => [
        DB_TABLE_NAME                       => 'good collections',
        DB_GOOD_COLLECTIONS_COLLECTION_TIME => 'collection time',
        DB_GOOD_COLLECTIONS_COLLECTION_INFO => 'collection information'
    ],
    // 商品评论
    DB_GOOD_COMMENTS => [
        DB_TABLE_NAME                   => 'good comments',
        DB_GOOD_COMMENTS_COMMENT_INFO   => 'comment content'
    ],
    // 商品分类信息
    DB_GOOD_KINDS => [
        DB_TABLE_NAME           => 'good kinds',
        DB_GOOD_KINDS_NAME      => 'kind name',
        DB_GOOD_KINDS_KIND_INFO => 'kind information',
        DB_GOOD_KINDS_STATUS    => 'good kind status'
    ],
    // 商品评价信息
    DB_GOOD_RANKS => [
        DB_TABLE_NAME           => 'good ranks',
        DB_GOOD_RANKS_RANK      => 'rank',
        DB_GOOD_RANKS_RANK_INFO => 'rank information'
    ],
    // 商品信息
    DB_GOODS => [
        DB_TABLE_NAME       => 'goods',
        DB_GOODS_GOOD_NAME  => 'good name',
        DB_GOODS_GOOD_INFO  => 'good information',
        DB_GOODS_STATUS     => 'good status'
    ],
    // 用户登录记录
    DB_LOG_LOGINS => [
        DB_TABLE_NAME               => 'login log',
        DB_LOG_LOGINS_LOG_IP        => 'login ip',
        DB_LOG_LOGINS_LOG_HTTP_INFO => 'login http information',
        DB_LOG_LOGINS_STATUS        => 'login status'
    ],
    // 聊天记录中提醒的用户信息
    DB_MESSAGE_REMIND_USER_RELATIONS => [
        DB_TABLE_NAME   => 'Remind users'
    ],
    // 用户聊天信息
    DB_MESSAGES => [
        DB_TABLE_NAME       => 'messages',
        DB_MESSAGES_SEND_TO => 'send to',
        DB_MESSAGES_CONTENT => 'content'
    ],
    //促销信息收集
    DB_PREFERENCE_COLLECTIONS => [
        DB_TABLE_NAME                               => 'preference collections',
        DB_PREFERENCE_COLLECTIONS_COLLECTION_INFO   => 'collection information'
    ],
    // 促销信息评论
    DB_PREFERENCE_COMMENTS => [
        DB_TABLE_NAME                       => 'preference comments',
        DB_PREFERENCE_COMMENTS_COMMENT_INFO => 'comment information',
        DB_PREFERENCE_COMMENTS_IS_PUBLIC    => 'public'
    ],
    // 商品促销信息
    DB_PREFERENCES  => [
        DB_TABLE_NAME                   => 'preference information',
        DB_PREFERENCES_SHOP_NAME        => 'shop name',
        DB_PREFERENCES_ORIGINAL_PRICE   => 'original price',
        DB_PREFERENCES_DISCOUNT_PRICE   => 'discount price',
        DB_PREFERENCES_INFOR_URL        => 'information url',
        DB_PREFERENCES_PREFERENCE_INFO  => 'preference information',
        DB_PREFERENCES_BEGIN_TIME       => 'begin time',
        DB_PREFERENCES_END_TIME         => 'end time',
        DB_PREFERENCES_IS_PUBLIC        => 'public'
    ],
    // 促销信息评分信息
    DB_PREFERENCES_RANKS => [
        DB_TABLE_NAME                   => 'preference ranks',
        DB_PREFERENCES_RANKS_RANK       => 'rank',
        DB_PREFERENCES_RANKS_RANK_INFO  => 'rank information',
    ],
    // 商品生产厂家产品卖出信息
    DB_PRODUCE_COMPANY_GOOD_SELLS => [
        DB_TABLE_NAME                               => 'sold goods',
        DB_PRODUCE_COMPANY_GOOD_SELLS_SHOP_NAME     => 'shop name',
        DB_PRODUCE_COMPANY_GOOD_SELLS_COST          => 'cost',
        DB_PRODUCE_COMPANY_GOOD_SELLS_PRICE         => 'price',
        DB_PRODUCE_COMPANY_GOOD_SELLS_CURRENCY      => 'currency',
        DB_PRODUCE_COMPANY_GOOD_SELLS_SELL_NUMBER   => 'sold number',
        DB_PRODUCE_COMPANY_GOOD_SELLS_STATUS        => 'status'
    ],
    // 生产厂家产品信息
    DB_PRODUCE_COMPANY_GOODS => [
        DB_TABLE_NAME                       => 'company\' goods',
        DB_PRODUCE_COMPANY_GOODS_PRICE      => 'price',
        DB_PRODUCE_COMPANY_GOODS_COST       => 'cost',
        DB_PRODUCE_COMPANY_GOODS_CURRENCY   => 'currency',
        DB_PRODUCE_COMPANY_GOODS_GOOD_INFO  => 'good information',
        DB_PRODUCE_COMPANY_GOODS_IS_PUBLIC  => 'public',
        DB_PRODUCE_COMPANY_GOODS_STATUS     => 'status'
    ],
    // 商品生产厂家用户信息
    DB_PRODUCE_COMPANY_USERS => [
        DB_TABLE_NAME                   => 'company users',
        DB_PRODUCE_COMPANY_USERS_STATUS => 'status',
        DB_PRODUCE_COMPANY_USERS_TYPE   => 'user type'
    ],
    // 商品生产厂家信息
    DB_PRODUCE_COMPANYS => [
        DB_TABLE_NAME                           => 'produce companys',
        DB_PRODUCE_COMPANYS_NAME                => 'name',
        DB_PRODUCE_COMPANYS_ADDRESS             => 'address',
        DB_PRODUCE_COMPANYS_PHONE_NUM           => 'phone number',
        DB_PRODUCE_COMPANYS_POST_ADDR           => 'post address',
        DB_PRODUCE_COMPANYS_RESPONSE_EMAIL      => 'response email',
        DB_PRODUCE_COMPANYS_CORP_INFO           => 'company information',
        DB_PRODUCE_COMPANYS_STATUS              => 'status'
    ],
    // 商品商店收集
    DB_SHOP_COLLECTIONS => [
        DB_TABLE_NAME                       => 'shop collections',
        DB_SHOP_COLLECTIONS_COLLECTION_INFO => 'collection information'
    ],
    // 商店的用户评论信息表
    DB_SHOP_COMMENTS => [
        DB_TABLE_NAME                   => 'shop comments',
        DB_SHOP_COMMENTS_COMMENT_INFO   => 'comment information',
        DB_SHOP_COMMENTS_IS_PUBLIC      => 'public'
    ],
    // 商店商品评论信息表
    DB_SHOP_GOOD_COMMENTS => [
        DB_TABLE_NAME                       => 'good comments',
        DB_SHOP_GOOD_COMMENTS_COMMENT_INFO  => 'comment information'
    ],
    // 商店商品信息表
    DB_SHOP_GOODS => [
        DB_TABLE_NAME               => 'shop\' goods',
        DB_SHOP_GOODS_COST          => 'cost',
        DB_SHOP_GOODS_PRICE         => 'price',
        DB_SHOP_GOODS_CURRENCY      => 'currency',
        DB_SHOP_GOODS_GOOD_INFO     => 'good information',
        DB_SHOP_GOODS_IS_PUBLIC     => 'public',
        DB_SHOP_GOODS_STATUS        => 'status'
    ]

];