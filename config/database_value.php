<?php

/**
 * 该文件是数据库名
 * 数据库项名称定义文件
 *
 */

define('DB_COMMON',             'common');      // 界面表示定义用
define('DB_TABLE_NAME',         'table_name');  // 界面表示定义用
define('DB_TABLE_COLUMN_NAME',  'column_name'); // 界面表示定义用
define('DB_COMMON_VALUE',       'column_value'); // 数据库变量值对应内容

// 公用数据项名
define('DB_COMMON_ID',           'id');
define('DB_COMMON_CREATED_BY',   'created_by');
define('DB_COMMON_UPDATED_BY',   'updated_by');
define('DB_COMMON_DELETED_BY',   'deleted_by');
define('DB_COMMON_CREATED_AT',   'created_at');
define('DB_COMMON_UPDATED_AT',   'updated_at');
define('DB_COMMON_DELETED_AT',   'deleted_at');
define('DB_COMMON_PUBLIC_TYPE',  'public_type');

// 无效
define('DB_COMMON_STATUS_INVALID', 0);

define('DB_COMMON_PUBLIC_TYPE_NO',  0); // 不公开
define('DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL', 1); // 任意公开
define('DB_COMMON_PUBLIC_TYPE_YES_FOR_REGISTERED', 2);
define('DB_COMMON_PUBLIC_TYPE_YES_FOR_AUTHENTICATED', 3);
define('DB_COMMON_PUBLIC_TYPE_YES_FOR_FRIEND', 4);

define('DB_COMMON_CURRENCY_RMB', 1);
define('DB_COMMON_CURRENCY_USD', 2);
define('DB_COMMON_CURRENCY_JPY', 3);


// 讨论组（群组）分析信息表
define('DB_CHAT_GROUP_USER_RELATIONS',               'chat_group_user_relations');
define('DB_CHAT_GROUP_USER_RELATIONS_CHAT_GROUP_ID', 'chat_group_id');   // 讨论组（群组）的ID
define('DB_CHAT_GROUP_USER_RELATIONS_TYPE',          'type');            // 群成员类型：0:群主，1:管理员，2:一般用户，3:阅览用户
define('DB_CHAT_GROUP_USER_RELATIONS_USER_ID',       'user_id');         // 群组成员用户表id
define('DB_CHAT_GROUP_USER_RELATIONS_INVITED_BY',    'invited_by');      // 群组成员邀请人

define('DB_CHAT_GROUP_USER_RELATIONS_TYPE_OWNER',    0); // 永久群组
define('DB_CHAT_GROUP_USER_RELATIONS_TYPE_ADMIN',    1); // 临时讨论组
define('DB_CHAT_GROUP_USER_RELATIONS_TYPE_COMMON',   2); // 临时讨论组
define('DB_CHAT_GROUP_USER_RELATIONS_TYPE_GUEST',    3); // 临时讨论组


// 用户讨论组（群组）
define('DB_CHAT_GROUPS',                    'chat_groups');
define('DB_CHAT_GROUPS_NAME',               'name');                // 用户群组名称
define('DB_CHAT_GROUPS_CHAT_GROUP_INFO',    'chat_group_info');     // 群组信息
define('DB_CHAT_GROUPS_CHAT_GROUP_OWNER',   'chat_group_owner');    // 群主
define('DB_CHAT_GROUPS_TYPE',               'type');                // 群类型：0:临时讨论组；1:用户群组

define('DB_CHAT_GROUPS_TYPE_PERMANENT',  0); // 永久群组
define('DB_CHAT_GROUPS_TYPE_TEMPORARY',  1); // 临时会话组

// 用户的消费信息
define('DB_CONSUMES',               'consumes');
define('DB_CONSUMES_USER_ID',       'user_id');         // 消费者id
define('DB_CONSUMES_GOOD_ID',       'good_id');         // 物品id
define('DB_CONSUMES_SHOP_GOOD_ID',  'shop_good_id');    // 消费商店商品id
define('DB_CONSUMES_SHOP_ID',       'shop_id');         // 消费店铺id
define('DB_CONSUMES_CONSUME_NAME',  'consume_name');    // 消费名称
define('DB_CONSUMES_CONSUME_COST',  'consume_cost');   // 消费钱数
define('DB_CONSUMES_CURRENCY',      'currency');        // 币种
define('DB_CONSUMES_CONSUME_INFO',  'consume_info');    // 消费信息
define('DB_CONSUMES_CONSUME_TIME',  'consume_time');    // 消费时间
define('DB_CONSUMES_PLACE',         'place');           // 消费时间

// 上传文件和数据表关系
define('DB_FILE_RELATIONS',                     'file_relations');
define('DB_FILE_RELATIONS_FILE_ID',             'file_id');             // 文件上传表id
define('DB_FILE_RELATIONS_RELATION_TABLE_NAME', 'relation_table_name'); // 关联数据表名称
define('DB_FILE_RELATIONS_RELATION_TABLE_ID',   'relation_table_id');   // 对应数据表的id
define('DB_FILE_RELATIONS_FILE_TYPE',           'file_type');           // 文件类型
define('DB_FILE_RELATIONS_FILE_RELATION_INFO',  'file_relation_info');  // 文件关系表信息

define('DB_FILE_RELATIONS_FILE_TYPE_CONTENT', 0);
define('DB_FILE_RELATIONS_FILE_TYPE_ATTACHMENT', 1);
define('DB_FILE_RELATIONS_FILE_TYPE_ICON', 2);


// 上传文件信息表
define('DB_FILES',                      'files');
define('DB_FILES_SHOP_ID',              'shop_id');             // 商店id
define('DB_FILES_PRODUCE_COMPANY_ID',   'produce_company_id');  // 生产厂家id
define('DB_FILES_TYPE',                 'type');                // 文件类型(jpg,gif,css,zip...)
define('DB_FILES_PATH',                 'path');                // 文件保存路径
define('DB_FILES_SAVE_NAME',            'save_name');           // 服务器文件保存名
define('DB_FILES_REAL_NAME',            'real_name');           // 文件上传名
define('DB_FILES_SIZE',                 'size');                // 文件大小Byte

// 商品收藏表
define('DB_GOOD_COLLECTIONS',                   'good_collections');
define('DB_GOOD_COLLECTIONS_GOOD_ID',           'good_id');
define('DB_GOOD_COLLECTIONS_COLLECTION_TIME',   'collection_time'); // 收藏时间
define('DB_GOOD_COLLECTIONS_COLLECTION_INFO',   'collection_info'); // 收藏信息

// 商品评论表
define('DB_GOOD_COMMENTS',              'good_comments');
define('DB_GOOD_COMMENTS_GOOD_ID',      'good_id');            // 商品id
define('DB_GOOD_COMMENTS_PARENT_ID',    'parent_id');        // 父评论id
define('DB_GOOD_COMMENTS_COMMENT_INFO', 'comment_info');  // 评论信息

// 商品分类信息表
define('DB_GOOD_KINDS_CAN_HAS_CHILDREN_NO',     0);
define('DB_GOOD_KINDS_CAN_HAS_CHILDREN_YES',    1);

define('DB_GOOD_KINDS_STATUS_INVALID', DB_COMMON_STATUS_INVALID);
define('DB_GOOD_KINDS_STATUS_AUTHENTICATED', 1);
define('DB_GOOD_KINDS_STATUS_CREATE_BY_USER_UNACTIVE', 2);
define('DB_GOOD_KINDS_STATUS_CREATE_BY_SHOP_UNACTIVE', 3);
define('DB_GOOD_KINDS_STATUS_CREATE_BY_PRODUCE_COMPANY_UNACTIVE', 4);

// 商品评价信息表
define('DB_GOOD_RANKS',             'good_ranks');
define('DB_GOOD_RANKS_GOOD_ID',     'good_id');     // 物品id
define('DB_GOOD_RANKS_RANK',        'rank');        // 物品评分
define('DB_GOOD_RANKS_RANK_INFO',   'rank_info');   // 物品评价信息

// 商品信息表
define('DB_GOODS',              'goods');
define('DB_GOODS_GOOD_KIND_ID', 'good_kind_id');    // 商品分类id
define('DB_GOODS_GOOD_NAME',    'good_name');       // 商品名
define('DB_GOODS_GOOD_INFO',    'good_info');       // 商品信息
define('DB_GOODS_STATUS',       'status');          // 商品状态:0:无效；1:权威认证；2:未认证（一般用户创建）；
                                                    // 3:未认证（商店职员创建）；4：未认证（生产厂家创建）

define('DB_GOOD_STATUS_INVALID', DB_COMMON_STATUS_INVALID);
define('DB_GOOD_STATUS_AUTHENTICATED', 1);
define('DB_GOOD_STATUS_CREATE_BY_USER_UNACTIVE', 2);
define('DB_GOOD_STATUS_CREATE_BY_SHOP_UNACTIVE', 3);
define('DB_GOOD_STATUS_CREATE_BY_PRODUCE_COMPANY_UNACTIVE', 4);

// 用户登录记录表
define('DB_LOG_LOGINS',                 'log_logins');
define('DB_LOG_LOGIN_USER_ID',          'user_id');         // 登录用户id
define('DB_LOG_LOGIN_LOG_IP',           'log_ip');          // 登录ip信息
define('DB_LOG_LOGIN_LOG_HTTP_INFO',    'log_http_info');   // 登录http信息
define('DB_LOG_LOGIN_STATUS',           'status');          // 登录状态：1:登陆成功，2:密码错误，9:其他

define('DB_LOG_LOGIN_STATUS_SUCCESS',           1);
define('DB_LOG_LOGIN_STATUS_PASSWORD_ERROR',    2);
define('DB_LOG_LOGIN_STATUS_OTHER',             9);

// 聊天记录中提醒的用户信息表
define('DB_MESSAGE_REMIND_USER_RELATIONS',                  'message_remind_user_relations');
define('DB_MESSAGE_REMIND_USER_RELATIONS_MESSAGE_ID',       'message_id');      // 消息id
define('DB_MESSAGE_REMIND_USER_RELATIONS_REMIND_USER_ID',   'remind_user_id');  // 提醒用户id

// 用户聊天信息表
define('DB_MESSAGES',               'messages');
define('DB_MESSAGES_CHAT_GROUP_ID', 'chat_group_id');   // 群组id。用户间聊天时：null
define('DB_MESSAGES_SEND_TO',       'send_to');         // 接收信息用户id；群组聊天：null
define('DB_MESSAGES_PARENT_ID',     'parent_id');       // 回复信息id，没有回复消息：null
define('DB_MESSAGES_CONTENT',       'content');         // 消息内容

// 促销信息收集表
define('DB_PREFERENCE_COLLECTIONS',                 'preference_collections');
define('DB_PREFERENCE_COLLECTIONS_USER_ID',         'user_id');         // 搜藏用户
define('DB_PREFERENCE_COLLECTIONS_PREFERENCE_ID',   'preference_id');   // 促销信息id
define('DB_PREFERENCE_COLLECTIONS_COLLECTION_INFO', 'collection_info'); // 搜藏信息

// 促销信息评论表
define('DB_PREFERENCE_COMMENTS',                'preference_comments');
define('DB_PREFERENCE_COMMENTS_PREFERENCE_ID',  'preference_id');       // 促销信息
define('DB_PREFERENCE_COMMENTS_USER_ID',        'user_id');             // 评论者
define('DB_PREFERENCE_COMMENTS_PARENT_ID',      'parent_id');           // 父评论
define('DB_PREFERENCE_COMMENTS_COMMENT_INFO',   'comment_info');        // 评论信息

// 商品促销信息表
define('DB_PREFERENCES',                    'preferences');
define('DB_PREFERENCES_GOOD_ID',            'good_id');         // 商品id
define('DB_PREFERENCES_SHOP_ID',            'shop_id');         // 商店id
define('DB_PREFERENCES_SHOP_NAME',          'shop_name');       // 商店名称
define('DB_PREFERENCES_ORIGINAL_PRICE',     'original_price');  // 原价
define('DB_PREFERENCES_DISCOUNT_PRICE',     'discount_price');  // 促销价
define('DB_PREFERENCES_INFOR_URL',          'infor_url');       // 外部信息网址
define('DB_PREFERENCES_PREFERENCE_INFO',    'preference_info'); // 促销介绍
define('DB_PREFERENCES_BEGIN_TIME',         'begin_time');      // 促销开始时间
define('DB_PREFERENCES_END_TIME',           'end_time');        // 促销结束时间

// 促销信息评分信息表
define('DB_PREFERENCES_RANKS',                      'preferences_ranks');
define('DB_PREFERENCES_RANKS_RANKED_PREFERENCE_ID', 'ranked_preference_id');    // 促销信息id
define('DB_PREFERENCES_RANKS_RANK',                 'rank');                    // 评分
define('DB_PREFERENCES_RANKS_RANK_INFO',            'rank_info');               // 评价

// 商品生产厂家产品卖出信息表
define('DB_PRODUCE_COMPANY_GOOD_SELLS',                         'produce_company_good_sells');
define('DB_PRODUCE_COMPANY_GOOD_SELLS_PRODUCE_COMPANY_GOOD_ID', 'produce_company_good_id'); // 生产厂家id
define('DB_PRODUCE_COMPANY_GOOD_SELLS_SHOP_ID',                 'shop_id');                 // 卖出店家id
define('DB_PRODUCE_COMPANY_GOOD_SELLS_SHOP_NAME',               'shop_name');               // 卖出店家名字
define('DB_PRODUCE_COMPANY_GOOD_SELLS_RESPONSE_USER_ID',        'response_user_id');        // 负责人id
define('DB_PRODUCE_COMPANY_GOOD_SELLS_COST',                    'cost');                    // 单件成本
define('DB_PRODUCE_COMPANY_GOOD_SELLS_PRICE',                   'price');                   // 单件售价
define('DB_PRODUCE_COMPANY_GOOD_SELLS_CURRENCY',                'currency');                // 货币
define('DB_PRODUCE_COMPANY_GOOD_SELLS_SELL_NUMBER',             'sell_number');             // 售卖数量
define('DB_PRODUCE_COMPANY_GOOD_SELLS_STATUS',                  'status');                  // 销售状态:0：无效；1:交易付款完成；
                                                                                            // 2:相谈中；3：合约签订；4：交付中；6:交付完成
define('DB_PRODUCE_COMPANY_GOOD_SELLS_STATUS_INVALID',      DB_COMMON_STATUS_INVALID);
define('DB_PRODUCE_COMPANY_GOOD_SELLS_STATUS_COMPLETED',    1);
define('DB_PRODUCE_COMPANY_GOOD_SELLS_STATUS_DISCUSSING',   2);
define('DB_PRODUCE_COMPANY_GOOD_SELLS_STATUS_CONTRACTED',   3);
define('DB_PRODUCE_COMPANY_GOOD_SELLS_STATUS_DELIVERING',   4);
define('DB_PRODUCE_COMPANY_GOOD_SELLS_STATUS_DELIVERED',    5);

// 生产厂家产品信息表
define('DB_PRODUCE_COMPANY_GOODS',                      'produce_company_goods');
define('DB_PRODUCE_COMPANY_GOODS_PRODUCE_COMPANY_ID',   'produce_company_id');  // 生产厂家id
define('DB_PRODUCE_COMPANY_GOODS_RESPONSE_USER_ID',     'response_user_id');    // 负责人
define('DB_PRODUCE_COMPANY_GOODS_GOOD_ID',              'good_id');             // 商品id
define('DB_PRODUCE_COMPANY_GOODS_PRICE',                'price');               // 卖出价格
define('DB_PRODUCE_COMPANY_GOODS_COST',                 'cost');                // 生产成本
define('DB_PRODUCE_COMPANY_GOODS_CURRENCY',             'currency');            // 货币种类
define('DB_PRODUCE_COMPANY_GOODS_GOOD_INFO',            'good_info');           // 商品星系
define('DB_PRODUCE_COMPANY_GOODS_STATUS',               'status');              // 商品状态：0:关闭；1:有效：2:等待确认

define('DB_PRODUCE_COMPANY_GOODS_STATUS_CLOSED',        0);
define('DB_PRODUCE_COMPANY_GOODS_STATUS_EFFECTIVE',     1);
define('DB_PRODUCE_COMPANY_GOODS_STATUS_REQUESTING',    0);

// 商品生产厂家用户信息表
define('DB_PRODUCE_COMPANY_USERS',                      'produce_company_users');
define('DB_PRODUCE_COMPANY_USERS_PRODUCE_COMPANY_ID',   'produce_company_id');  // 生产厂家id
define('DB_PRODUCE_COMPANY_USERS_USER_ID',              'user_id');             // 用户信息表id
define('DB_PRODUCE_COMPANY_USERS_STATUS',               'status');              // 账户状态：0:无效；1:有效；2:邀请中
define('DB_PRODUCE_COMPANY_USERS_TYPE',                 'type');                // 账户类型：1: 管理者; 2:经理; 3:普通用户; 4:阅览用户

define('DB_PRODUCE_COMPANY_USERS_STATUS_INVALID', DB_COMMON_STATUS_INVALID);
define('DB_PRODUCE_COMPANY_USERS_STATUS_EFFECTIVE', 1);
define('DB_PRODUCE_COMPANY_USERS_STATUS_REQUESTING', 2);


define('DB_PRODUCE_COMPANY_USERS_TYPE_ADMIN',   1);
define('DB_PRODUCE_COMPANY_USERS_TYPE_MANAGER', 2);
define('DB_PRODUCE_COMPANY_USERS_TYPE_COMMON',  3);
define('DB_PRODUCE_COMPANY_USERS_TYPE_GUEST',   4);


// 商品生产厂家信息表
define('DB_PRODUCE_COMPANYS',                   'produce_companys');
define('DB_PRODUCE_COMPANYS_NAME',              'name');                // 厂家名
define('DB_PRODUCE_COMPANYS_ADDRESS',           'address');             // 厂家地址
define('DB_PRODUCE_COMPANYS_PHONE_NUM',         'phone_num');           // 联系电话
define('DB_PRODUCE_COMPANYS_POST_ADDR',         'post_addr');           // 邮编
define('DB_PRODUCE_COMPANYS_RESPONSE_EMAIL',    'response_email');      // 负责邮箱
define('DB_PRODUCE_COMPANYS_RESPONSE_USER_ID',  'response_user_id');    // 负责任id
define('DB_PRODUCE_COMPANYS_CORP_INFO',         'corp_info');           // 厂家信息
define('DB_PRODUCE_COMPANYS_STATUS',            'status');              // 厂家状态:0:无效；1：认证，2:普通注册

define('DB_PRODUCE_COMPANYS_STATUS_INVALID',            DB_COMMON_STATUS_INVALID);
define('DB_PRODUCE_COMPANYS_STATUS_AUTHENTICATED',      1);
define('DB_PRODUCE_COMPANYS_STATUS_UNAUTHENTICATED',    2);

// 商品商店收集表
define('DB_SHOP_COLLECTIONS',                   'shop_collections');
define('DB_SHOP_COLLECTIONS_SHOP_ID',           'shop_id');         // 商店id
define('DB_SHOP_COLLECTIONS_COLLECTION_INFO',   'collection_info'); // 搜藏信息


// 商店的用户评论信息表
define('DB_SHOP_COMMENTS',              'shop_comments');
define('DB_SHOP_COMMENTS_SHOP_ID',      'shop_id');         // 商店id
define('DB_SHOP_COMMENTS_PARENT_ID',    'parent_id');       // 父评论id
define('DB_SHOP_COMMENTS_COMMENT_INFO', 'comment_info');    // 评论信息

// 商店商品评论信息表
define('DB_SHOP_GOOD_COMMENTS',                 'shop_good_comments');
define('DB_SHOP_GOOD_COMMENTS_SHOP_GOOD_ID',    'shop_good_id');    // 商店商品id
define('DB_SHOP_GOOD_COMMENTS_PARENT_ID',       'parent_id');       // 父评论id
define('DB_SHOP_GOOD_COMMENTS_COMMENT_INFO',    'comment_info');    // 评论信息

// 商店商品信息表
define('DB_SHOP_GOODS',                     'shop_goods');
define('DB_SHOP_GOODS_SHOP_ID',             'shop_id');             // 商店id
define('DB_SHOP_GOODS_GOOD_ID',             'good_id');             // 商品id
define('DB_SHOP_GOODS_PRODUCE_COMPANY_ID',  'produce_company_id');  // 生产厂家id
define('DB_SHOP_GOODS_COST',                'cost');                // 商品买入价
define('DB_SHOP_GOODS_PRICE',               'price');               // 商品卖出价
define('DB_SHOP_GOODS_CURRENCY',            'currency');            // 商品货币
define('DB_SHOP_GOODS_GOOD_INFO',           'good_info');           // 商品信息
define('DB_SHOP_GOODS_STATUS',              'status');              // 商品状态：0:无效；1:有效：2:等待确认

define('DB_SHOP_GOODS_STATUS_INVALID',      DB_COMMON_STATUS_INVALID);
define('DB_SHOP_GOODS_STATUS_AUTHENTICATED',    1);
define('DB_SHOP_GOODS_STATUS_CREATE_BY_USER_UNACTIVE',  2);
define('DB_SHOP_GOODS_STATUS_CREATE_BY_SHOP_UNACTIVE',  3);
define('DB_SHOP_GOODS_STATUS_CREATE_BY_PRODUCE_COMPANY_UNACTIVE',   4);

// 商店评价表
define('DB_SHOP_RANKS',                 'shop_ranks');
define('DB_SHIP_RANKS_RANKED_SHOP_ID',  'ranked_shop_id');  // 评价商店
define('DB_SHIP_RANKS_RANK',            'rank');            // 评分
define('DB_SHIP_RANKS_RANK_INFO',       'rank_info');       // 评价信息

// 商品售卖商店职员信息表
define('DB_SHOP_USERS',             'shop_users');
define('DB_SHOP_USERS_SHOP_ID',     'shop_id');     // 商店id
define('DB_SHOP_USERS_TYPE',        'type');        // 职员类型：1: 管理员; 2:经理; 3:一般用户; 4:阅览者
define('DB_SHOP_USERS_EMAIL',       'email');       // 职员联系mail
define('DB_SHOP_USERS_NAME',        'name');        // 职员姓名
define('DB_SHOP_USERS_POSITION',    'position');    // 部门
define('DB_SHOP_USERS_STATUS',      'status');      // 账号状态：0:无效; 1:有效; 2: 邀请中

define('DB_SHOP_USERS_TYPE_ADMIN',      1);
define('DB_SHOP_USERS_TYPE_MANAGER',    2);
define('DB_SHOP_USERS_TYPE_COMMON',     3);
define('DB_SHOP_USERS_TYPE_GUEST',      4);
define('DB_SHOP_USERS_STATUS_INVALID',      DB_COMMON_STATUS_INVALID);
define('DB_SHOP_USERS_STATUS_EFFECTIVE',    1);
define('DB_SHOP_USERS_STATUS_REQUESTING',   2);

// 商品售卖商店信息表
define('DB_SHOPS',                  'shops');
define('DB_SHOPS_NAME',             'name');                // 商店名
define('DB_SHOPS_ADDRESS',          'address');             // 商店
define('DB_SHOPS_PHONE_NUM',        'phone_num');           // 联系电话
define('DB_SHOPS_WEB_ADDR',         'web_addr');            // 商店网址
define('DB_SHOPS_SHOP_INFO',        'shop_info');           // 商店信息
define('DB_SHOPS_STATUS',           'status');              // 商店状态：0:无效; 1:认证；2:未认证
define('DB_SHOPS_RESPONSE_USER_ID', 'response_user_id');    // 负责人用户id

define('DB_SHOPS_STATUS_INVALID',           DB_COMMON_STATUS_INVALID);
define('DB_SHOPS_STATUS_AUTHENTICATED',     1);
define('DB_SHOPS_STATUS_UNAUTHENTICATED',   2);

// 对用户评价，评分表
define('DB_USER_RANKS',                 'user_ranks');
define('DB_USER_RANKS_RANKED_USER_ID',  'ranked_user_id');  // 被评价用户
define('DB_USER_RANKS_RANK',            'rank');            // 评分
define('DB_USER_RANKS_RANK_INFO',       'rank_info');       // 评价信息

// 用户的好友分组数据表
define('DB_USER_RELATION_GROUPS',               'user_relation_groups');
define('DB_USER_RELATION_GROUPS_USER_ID',       'user_id');     // 用户id
define('DB_USER_RELATION_GROUPS_NAME',          'name');        // 分组名称
define('DB_USER_RELATION_GROUPS_GROUP_INFO',    'group_info');  // 分组信息

// 好友关系情况
define('DB_USER_RELATIONS',                         'user_relations');
define('DB_USER_RELATIONS_OWNER_ID',                'owner_id');                // 关系拥有者id
define('DB_USER_RELATIONS_FRIEND_USER_ID',          'friend_user_id');          // 好友id
define('DB_USER_RELATIONS_STATUS',                  'status');                  // 好友关系状态：0:无效；1:有效；2:邀请中z
define('DB_USER_RELATIONS_USER_RELATION_GROUP_ID',  'user_relation_group_id');  // 该好友的分组

define('DB_USER_RELATIONS_STATUS_INVALID',      DB_COMMON_STATUS_INVALID);
define('DB_USER_RELATIONS_STATUS_EFFECTIVE',    1);
define('DB_USER_RELATIONS_STATUS_REQUESTIN',    2);

// 用户分享信息评论信息表
define('DB_USER_SHARE_COMMENTS',                'user_share_comments');
define('DB_USER_SHARE_COMMENTS_USER_SHARE_ID',  'user_share_id');   // 用户分享信息id
define('DB_USER_SHARE_COMMENTS_PARENT_ID',      'parent_id');       // 父评论id
define('DB_USER_SHARE_COMMENTS_COMMENT_INFO',   'comment_info');    // 评论内容

// 用户分享信息表（店铺，打折信息等）
define('DB_USER_SHARES',                'user_shares');
define('DB_USER_SHARES_SHARE_NAME',     'share_name');  // 分享名称
define('DB_USER_SHARES_SHARE_URL',      'share_url');   // 分享信息链接
define('DB_USER_SHARES_SHARE_INFO',     'share_info');  // 分享介绍
define('DB_USER_SHARES_TYPE',           'type');        // 分享类型:1:优惠信息；2:货物；3：货物分类；
                                                        // 4:商店货物；5：生产厂家货物；6:商店；7：生产厂家；

define('DB_USER_SHARES_TYPE_PREFERENCE',            1);
define('DB_USER_SHARES_TYPE_GOOD',                  2);
define('DB_USER_SHARES_TYPE_GOOD_KIND',             3);
define('DB_USER_SHARES_TYPE_SHOP_GOOD',             4);
define('DB_USER_SHARES_TYPE_PRODUCE_COMPANY_GOOD',  5);
define('DB_USER_SHARES_TYPE_SHOP',                  6);
define('DB_USER_SHARES_TYPE_PRODUCE_COMPANY',       7);

// 用户信息表。
// 普通用户：shop_user_id:null，produce_company_user_id:null
// 商店用户：shop_user_id:shop_users表的id，produce_company_user_id:null
// 产品生产公司用户：shop_user_id:null，produce_company_user_id:produce_company_users表的id
define('DB_USERS',                                  'users');
define('DB_USERS_U_NAME',                           'u_name');                          // 用户名（唯一，不可相同）
define('DB_USERS_F_NAME',                           'f_name');                          // 用户名
define('DB_USERS_L_NAME',                           'l_name');                          // 用户姓
define('DB_USERS_LOGIN_MAIL',                       'login_mail');                      // 登录邮箱（唯一，不可相同）
define('DB_USERS_EMAIL',                            'email');                           // 联系用邮箱
define('DB_USERS_PASSWORD',                         'password');                        // 密码
define('DB_USERS_POST_CODE',                        'post_code');                       // 邮编
define('DB_USERS_ADDRESS',                          'address');                         // 地址
define('DB_USERS_HOME_PHONE',                       'home_phone');                      // 家里电话
define('DB_USERS_MOBILE_PHONE',                     'mobile_phone');                    // 移动电话
define('DB_USERS_BIRTHDAY',                         'birthday');                        // 生日
define('DB_USERS_SEX',                              'sex');                             // 性别
define('DB_COMMON_CURRENCY',                         'currency');                        // 币种
define('DB_USERS_LANGUAGE',                         'language');                        // 使用系统语言
define('DB_USERS_SHOP_USER_ID',                     'shop_user_id');                    // 商店职员id（普通用户或者生产厂家职员时null）
define('DB_USERS_PRODUCE_COMPANY_USER_ID',          'produce_company_user_id');         // 生产厂家id（普通用户或者商店职员时null）
define('DB_USERS_AUTHERITICATE_TYPE',               'autheriticate_type');              // 是否认证:0:未认证 1：普通认证,; 2：官方认证
define('DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE',  'receive_collection_message_type'); // 是否接受推送消息(0：不接受；1:接受所有；
                                                                                        // 2:接受收藏的和好友收藏的和官方推送；
                                                                                        // 3：接受好友和自己收藏的；4：接受自己收藏的
define('DB_USERS_REMEMBER_TOKEN',     'remember_token');        // 记忆token
define('DB_USERS_REMEMBER_TOKEN_TIME','remember_token_time');   // 记忆有效时间
define('DB_USERS_ACTIVE_TOKEN',       'active_token');          // 操作token
define('DB_USERS_ACTIVE_TOKEN_TIME',  'active_token_time');     // token有效时间
define('DB_USERS_STATUS',             'status');                // 0: 无效; 1:有效; 2:等待激活中;
define('DB_USERS_CREATED_IP',         'created_ip');            // 注册ip

define('DB_USERS_SEX_MAN',      0);
define('DB_USERS_SEX_WOMAN',    1);

define('DB_USERS_LANGUAGE_ZH_CN',   'zh-CN');
define('DB_USERS_LANGUAGE_EN',      'en');
define('DB_USERS_LANGUAGE_JA',      'ja');

define('DB_USERS_AUTHERITICATE_TYPE_UNAUTHENTICATED',   0);
define('DB_USERS_AUTHERITICATE_TYPE_OFFICIAL_AUTH',     1);
define('DB_USERS_AUTHERITICATE_TYPE_COMMON_AUTH',       2);

define('DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_NO', 0b00000000);
define('DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL', 0b11111111);
define('DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_RECEVIE_SELF_COLLECTION', 0b00000001);
define('DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_RECEVIE_FRIEND_COLLECTION', 0b00000010);
define('DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_RECEVIE_OFFICAL_SHOP', 0b00000100);
define('DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_RECEVIE_OFFICAL_PRODUCE_COMPANY', 0b00001000);
define('DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_RECEIVE_ALL_SHOP', 0b00010000);
define('DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_RECEIVE_ALL_PRODUCE_COMPANY', 0b00100000);

define('DB_USERS_STATUS_INVALID',       DB_COMMON_STATUS_INVALID);
define('DB_USERS_STATUS_EFFECITVE',     1);
define('DB_USERS_STATUS_REQUESTING',    2);

