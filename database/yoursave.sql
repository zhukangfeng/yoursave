# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: yoursave
# Generation Time: 2015-09-29 03:53:21 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_users`;

CREATE TABLE `admin_users` (
  `id` int(11) unsigned NOT NULL,
  `u_name` varchar(255) DEFAULT NULL COMMENT 'user''s nickname',
  `f_name` varchar(255) DEFAULT NULL COMMENT 'family name',
  `l_name` varchar(255) DEFAULT NULL COMMENT 'last name',
  `mail` varchar(255) NOT NULL DEFAULT '' COMMENT 'user regist mail',
  `password` varchar(255) NOT NULL DEFAULT '',
  `post_code` char(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `home_phone` char(20) DEFAULT NULL,
  `mobile_phone` char(20) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:man; 1:woman;',
  `currency` tinyint(3) unsigned DEFAULT '0' COMMENT '用户选择币种（0:unset;1:RMB; 2DOLLAR; 3:JPN; 4;HK;...)',
  `user_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:system manage; 1:common manage; 9:other ',
  `login_fail_times` tinyint(1) DEFAULT '0',
  `last_login_fail_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(100) DEFAULT NULL,
  `last_login_browser` mediumtext COMMENT '最后一次登陆时候浏览器信息',
  `last_login_time` datetime NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `remember_token_time` datetime DEFAULT NULL COMMENT '随机密码有效时间',
  `status` tinyint(1) DEFAULT '1' COMMENT '1:active, 0:unactive',
  `created_ip` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table chat_group_user_relations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `chat_group_user_relations`;

CREATE TABLE `chat_group_user_relations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `chat_group_id` bigint(16) unsigned DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:无效，1:管理员，2:一般用户，3:阅览用户',
  `user_id` int(11) unsigned DEFAULT NULL,
  `invited_by` int(11) unsigned DEFAULT NULL COMMENT '邀请人id，自己加入时为null',
  `created_by` int(11) unsigned DEFAULT NULL,
  `deleted_by` int(11) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chat_group_id` (`chat_group_id`),
  KEY `created_by` (`created_by`),
  KEY `user_id` (`user_id`),
  KEY `invited_by` (`invited_by`),
  KEY `deleted_by` (`deleted_by`),
  CONSTRAINT `chat_group_user_relations_ibfk_1` FOREIGN KEY (`chat_group_id`) REFERENCES `chat_groups` (`id`),
  CONSTRAINT `chat_group_user_relations_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `chat_group_user_relations_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `chat_group_user_relations_ibfk_4` FOREIGN KEY (`invited_by`) REFERENCES `users` (`id`),
  CONSTRAINT `chat_group_user_relations_ibfk_5` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='讨论组（群组）分析信息表';



# Dump of table chat_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `chat_groups`;

CREATE TABLE `chat_groups` (
  `id` bigint(16) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `chat_group_info` mediumtext,
  `chat_group_owner` int(11) unsigned DEFAULT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:临时讨论组；1:用户群组',
  `created_by` int(11) unsigned DEFAULT NULL,
  `updated_by` int(11) unsigned DEFAULT NULL,
  `deleted_by` int(11) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chat_group_owner` (`chat_group_owner`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `deleted_by` (`deleted_by`),
  CONSTRAINT `chat_groups_ibfk_1` FOREIGN KEY (`chat_group_owner`) REFERENCES `users` (`id`),
  CONSTRAINT `chat_groups_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `chat_groups_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  CONSTRAINT `chat_groups_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户讨论组（群组）';



# Dump of table consumes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `consumes`;

CREATE TABLE `consumes` (
  `id` bigint(16) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `good_id` int(12) unsigned DEFAULT NULL COMMENT '消费物品（null的时候，无对应物品）',
  `shop_id` int(8) unsigned DEFAULT NULL COMMENT 'null;没有填写',
  `consume_name` char(100) NOT NULL COMMENT '消费名称',
  `consume_price` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '消费数额',
  `consume_info` mediumtext NOT NULL COMMENT '消费备注',
  `currency` int(3) unsigned DEFAULT '0' COMMENT '0:unset;默认为用户设定的币种',
  `consume_time` datetime NOT NULL COMMENT '消费时间',
  `created_at` datetime DEFAULT NULL COMMENT '登陆时间',
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user relation` (`user_id`),
  KEY `good relation` (`good_id`),
  KEY `shop relation` (`shop_id`),
  CONSTRAINT `consumes good relation` FOREIGN KEY (`good_id`) REFERENCES `goods` (`id`),
  CONSTRAINT `consumes shop relation` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`),
  CONSTRAINT `consumes user relation` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户的消费信息';



# Dump of table file_relations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `file_relations`;

CREATE TABLE `file_relations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `file_id` bigint(20) unsigned DEFAULT NULL,
  `relation_table_name` char(30) NOT NULL DEFAULT '' COMMENT 'file''s owner table ',
  `relation_table_id` bigint(20) unsigned NOT NULL,
  `file_type` tinyint(3) unsigned DEFAULT NULL,
  `comment` mediumtext,
  `created_by` int(11) unsigned DEFAULT NULL,
  `deleted_by` int(11) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `file_id` (`file_id`),
  KEY `created_by` (`created_by`),
  KEY `deleted_by` (`deleted_by`),
  CONSTRAINT `file_relations_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`),
  CONSTRAINT `file_relations_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `file_relations_ibfk_3` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='上传文件和数据表关系';



# Dump of table files
# ------------------------------------------------------------

DROP TABLE IF EXISTS `files`;

CREATE TABLE `files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(8) unsigned DEFAULT NULL,
  `type` tinyint(2) unsigned DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `save_name` varchar(255) DEFAULT NULL,
  `real_name` varchar(255) DEFAULT NULL,
  `size` bigint(20) unsigned DEFAULT NULL,
  `created_by` int(11) unsigned DEFAULT NULL,
  `deleted_by` int(11) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `files created user relation` (`created_by`),
  KEY `files deleted user relation` (`deleted_by`),
  KEY `shop_id` (`shop_id`),
  CONSTRAINT `files_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='上传文件信息表';



# Dump of table good_collections
# ------------------------------------------------------------

DROP TABLE IF EXISTS `good_collections`;

CREATE TABLE `good_collections` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(8) unsigned DEFAULT NULL,
  `good_id` int(12) unsigned DEFAULT NULL,
  `collect_time` datetime NOT NULL,
  `collect_info` mediumtext NOT NULL,
  `created_by` int(11) unsigned DEFAULT NULL,
  `deleted_by` int(11) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shop_id` (`shop_id`),
  KEY `good_id` (`good_id`),
  KEY `created_by` (`created_by`),
  KEY `deleted_by` (`deleted_by`),
  CONSTRAINT `good_collections_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`),
  CONSTRAINT `good_collections_ibfk_2` FOREIGN KEY (`good_id`) REFERENCES `goods` (`id`),
  CONSTRAINT `good_collections_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `good_collections_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品收藏表';



# Dump of table good_kinds
# ------------------------------------------------------------

DROP TABLE IF EXISTS `good_kinds`;

CREATE TABLE `good_kinds` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT 'goods'' name',
  `kind_info` mediumtext COMMENT 'kind''s information',
  `status` tinyint(1) unsigned DEFAULT '1',
  `created_by` int(11) unsigned DEFAULT NULL COMMENT 'regist user''s id',
  `updated_by` int(11) unsigned DEFAULT NULL COMMENT 'regist user''s id',
  `deleted_by` int(11) unsigned DEFAULT NULL COMMENT 'regist user''s id',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `good kinds parent good kind relation` (`parent_id`),
  KEY `good kinds created user relation` (`created_by`),
  KEY `good kinds updated user relation` (`updated_by`),
  KEY `good kinds deleted user relation` (`deleted_by`),
  CONSTRAINT `good kinds created user relation` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `good kinds deleted user relation` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  CONSTRAINT `good kinds parent good kind relation` FOREIGN KEY (`parent_id`) REFERENCES `good_kinds` (`id`),
  CONSTRAINT `good kinds updated user relation` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品分类信息表';



# Dump of table good_ranks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `good_ranks`;

CREATE TABLE `good_ranks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `good_id` int(12) unsigned DEFAULT NULL,
  `rank` float unsigned DEFAULT NULL,
  `rank_info` mediumtext,
  `created_by` int(11) unsigned DEFAULT NULL,
  `updated_by` int(11) unsigned DEFAULT NULL,
  `deleted_by` int(11) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `deleted_by` (`deleted_by`),
  KEY `good_id` (`good_id`),
  CONSTRAINT `good_ranks_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `good_ranks_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  CONSTRAINT `good_ranks_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  CONSTRAINT `good_ranks_ibfk_5` FOREIGN KEY (`good_id`) REFERENCES `goods` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品评价信息表';



# Dump of table goods
# ------------------------------------------------------------

DROP TABLE IF EXISTS `goods`;

CREATE TABLE `goods` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `good_kind_id` int(11) unsigned DEFAULT NULL,
  `good_name` char(80) NOT NULL DEFAULT '',
  `produce_company_id` int(8) unsigned DEFAULT NULL COMMENT 'goods'' produce company',
  `good_info` mediumtext NOT NULL,
  `currency` int(3) unsigned NOT NULL DEFAULT '0' COMMENT '币种',
  `expirate_time` datetime NOT NULL,
  `created_by` int(11) unsigned DEFAULT NULL,
  `updated_by` int(11) unsigned DEFAULT NULL,
  `deleted_by` int(11) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `good_kind_id` (`good_kind_id`),
  KEY `produce_company_id` (`produce_company_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `deleted_by` (`deleted_by`),
  CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`good_kind_id`) REFERENCES `good_kinds` (`id`),
  CONSTRAINT `goods_ibfk_2` FOREIGN KEY (`produce_company_id`) REFERENCES `produce_companys` (`id`),
  CONSTRAINT `goods_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `goods_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  CONSTRAINT `goods_ibfk_5` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品信息表';



# Dump of table log_logins
# ------------------------------------------------------------

DROP TABLE IF EXISTS `log_logins`;

CREATE TABLE `log_logins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `log_ip` char(100) DEFAULT NULL,
  `log_http_info` mediumtext,
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '1:登陆成功，2:密码错误，9:其他',
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `log_logins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户登录记录表';



# Dump of table message_remind_user_relations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `message_remind_user_relations`;

CREATE TABLE `message_remind_user_relations` (
  `id` bigint(22) unsigned NOT NULL AUTO_INCREMENT,
  `message_id` bigint(20) unsigned DEFAULT NULL,
  `remind_user_id` int(11) unsigned DEFAULT NULL,
  `created_by` int(11) unsigned DEFAULT NULL,
  `deleted_by` int(11) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `message_id` (`message_id`),
  KEY `remind_user_id` (`remind_user_id`),
  KEY `created_by` (`created_by`),
  KEY `deleted_by` (`deleted_by`),
  CONSTRAINT `message_remind_user_relations_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`),
  CONSTRAINT `message_remind_user_relations_ibfk_2` FOREIGN KEY (`remind_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `message_remind_user_relations_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `message_remind_user_relations_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='聊天记录中提醒的用户信息表';



# Dump of table messages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `chat_group_id` bigint(16) unsigned DEFAULT NULL COMMENT '聊天群组',
  `send_to` int(11) unsigned DEFAULT NULL,
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `content` mediumtext,
  `created_by` int(11) unsigned DEFAULT NULL,
  `updated_by` int(11) unsigned DEFAULT NULL,
  `deleted_by` int(11) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `delete_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chat_group_id` (`chat_group_id`),
  KEY `parent_id` (`parent_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `deleted_by` (`deleted_by`),
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`chat_group_id`) REFERENCES `chat_groups` (`id`),
  CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `messages` (`id`),
  CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `messages_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  CONSTRAINT `messages_ibfk_5` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户聊天信息表';



# Dump of table preference_collections
# ------------------------------------------------------------

DROP TABLE IF EXISTS `preference_collections`;

CREATE TABLE `preference_collections` (
  `id` bigint(16) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(12) unsigned NOT NULL,
  `preference_id` bigint(16) unsigned NOT NULL,
  `collection_info` mediumtext NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `preference_id` (`preference_id`),
  CONSTRAINT `preference_collections_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `preference_collections_ibfk_2` FOREIGN KEY (`preference_id`) REFERENCES `preferences` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='促销信息收集表';



# Dump of table preference_comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `preference_comments`;

CREATE TABLE `preference_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `preference_id` bigint(16) unsigned NOT NULL COMMENT '优惠信息id',
  `user_id` int(11) unsigned NOT NULL COMMENT '评论人id',
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `comment_info` mediumtext NOT NULL,
  `is_public` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:not public; 1:public',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `preference_id` (`preference_id`),
  KEY `parent_id` (`parent_id`),
  CONSTRAINT `preference_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `preference_comments_ibfk_3` FOREIGN KEY (`preference_id`) REFERENCES `preferences` (`id`),
  CONSTRAINT `preference_comments_ibfk_4` FOREIGN KEY (`parent_id`) REFERENCES `preference_comments` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='促销信息评论表';



# Dump of table preferences
# ------------------------------------------------------------

DROP TABLE IF EXISTS `preferences`;

CREATE TABLE `preferences` (
  `id` bigint(16) unsigned NOT NULL AUTO_INCREMENT,
  `good_id` int(12) unsigned DEFAULT NULL,
  `shop_id` int(8) unsigned DEFAULT NULL,
  `original_price` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '原价',
  `discount_price` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '现价',
  `infor_url` varchar(255) DEFAULT NULL COMMENT '外部信息网址',
  `preference_info` mediumtext COMMENT '商品优惠介绍',
  `collect_times` int(6) unsigned NOT NULL DEFAULT '0' COMMENT '收藏数量',
  `figure` float unsigned NOT NULL DEFAULT '0' COMMENT '评分',
  `begin_time` datetime DEFAULT NULL COMMENT '打折开始时间',
  `end_time` datetime DEFAULT NULL COMMENT '打折结束时间',
  `is_public` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:not public; 1:public',
  `created_by` int(11) unsigned DEFAULT NULL,
  `updated_by` int(11) unsigned DEFAULT NULL,
  `deleted_by` int(11) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '登陆时间',
  `update_at` datetime DEFAULT NULL COMMENT '0:not active',
  `deleted_at` datetime DEFAULT NULL COMMENT '0:not active',
  PRIMARY KEY (`id`),
  KEY `good_id` (`good_id`),
  KEY `shop_id` (`shop_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `deleted_by` (`deleted_by`),
  CONSTRAINT `preferences_ibfk_1` FOREIGN KEY (`good_id`) REFERENCES `goods` (`id`),
  CONSTRAINT `preferences_ibfk_2` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`),
  CONSTRAINT `preferences_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `preferences_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  CONSTRAINT `preferences_ibfk_5` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品促销信息';



# Dump of table produce_company_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `produce_company_users`;

CREATE TABLE `produce_company_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `produce_company_id` int(8) unsigned DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:无效；1:有效；2:邀请中',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1: admin; 2:manager; 3:common; 4:guest',
  `created_by` int(11) unsigned DEFAULT NULL,
  `updated_by` int(11) unsigned DEFAULT NULL,
  `deleted_by` int(11) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produce_company_id` (`produce_company_id`),
  KEY `user_id` (`user_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `deleted_by` (`deleted_by`),
  CONSTRAINT `produce_company_users_ibfk_1` FOREIGN KEY (`produce_company_id`) REFERENCES `produce_companys` (`id`),
  CONSTRAINT `produce_company_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `produce_company_users_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `produce_company_users_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  CONSTRAINT `produce_company_users_ibfk_5` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品生产厂家用户信息';



# Dump of table produce_companys
# ------------------------------------------------------------

DROP TABLE IF EXISTS `produce_companys`;

CREATE TABLE `produce_companys` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `address` varchar(255) DEFAULT NULL,
  `phone_num` char(80) DEFAULT NULL,
  `post_addr` char(10) DEFAULT NULL,
  `response_email` varchar(255) DEFAULT NULL,
  `response_user_id` int(11) unsigned DEFAULT NULL,
  `corp_info` mediumtext,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) unsigned DEFAULT NULL,
  `updated_by` int(11) unsigned DEFAULT NULL,
  `deleted_by` int(11) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `response_user_id` (`response_user_id`),
  KEY `deleted_by` (`deleted_by`),
  CONSTRAINT `produce_companys_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `produce_companys_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  CONSTRAINT `produce_companys_ibfk_3` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  CONSTRAINT `produce_companys_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品生产厂家信息表';



# Dump of table shop_collections
# ------------------------------------------------------------

DROP TABLE IF EXISTS `shop_collections`;

CREATE TABLE `shop_collections` (
  `id` int(12) unsigned NOT NULL,
  `shop_id` int(8) unsigned NOT NULL,
  `collection_info` mediumtext NOT NULL,
  `created_by` int(11) unsigned DEFAULT NULL,
  `updated_by` int(11) unsigned DEFAULT NULL,
  `deleted_by` int(11) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `shop_id` (`shop_id`),
  KEY `deleted_by` (`deleted_by`),
  CONSTRAINT `shop_collections_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `shop_collections_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  CONSTRAINT `shop_collections_ibfk_3` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`),
  CONSTRAINT `shop_collections_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品商店收集表';



# Dump of table shop_comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `shop_comments`;

CREATE TABLE `shop_comments` (
  `id` bigint(16) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(8) unsigned DEFAULT NULL,
  `parent_id` bigint(16) unsigned DEFAULT NULL,
  `comment_info` mediumtext,
  `is_public` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:not public; 1:public',
  `created_by` int(11) unsigned DEFAULT NULL COMMENT '0:deleted; 1:active',
  `updated_by` int(11) unsigned DEFAULT NULL,
  `deleted_by` int(11) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shop_id` (`shop_id`),
  KEY `parent_id` (`parent_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `deleted_by` (`deleted_by`),
  CONSTRAINT `shop_comments_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`),
  CONSTRAINT `shop_comments_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `shop_comments` (`id`),
  CONSTRAINT `shop_comments_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `shop_comments_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  CONSTRAINT `shop_comments_ibfk_5` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商店的用户评论信息';



# Dump of table shop_ranks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `shop_ranks`;

CREATE TABLE `shop_ranks` (
  `id` bigint(16) unsigned NOT NULL AUTO_INCREMENT,
  `rank_shop_id` int(8) unsigned DEFAULT NULL,
  `rank` float unsigned NOT NULL DEFAULT '0',
  `rank_info` int(11) DEFAULT NULL,
  `created_by` int(11) unsigned DEFAULT NULL,
  `updated_by` int(11) unsigned DEFAULT NULL,
  `deleted_by` int(11) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rank_shop_id` (`rank_shop_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `deleted_by` (`deleted_by`),
  CONSTRAINT `shop_ranks_ibfk_1` FOREIGN KEY (`rank_shop_id`) REFERENCES `shops` (`id`),
  CONSTRAINT `shop_ranks_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `shop_ranks_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  CONSTRAINT `shop_ranks_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商店评价表';



# Dump of table shop_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `shop_users`;

CREATE TABLE `shop_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(8) unsigned DEFAULT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1: admin; 2:manager; 3:common; 4:guest',
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT '0:not active; 1:active;; 2: requesting',
  `created_by` int(11) unsigned DEFAULT NULL,
  `updated_by` int(11) unsigned DEFAULT NULL,
  `deleted_by` int(11) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `shop_id` (`shop_id`),
  KEY `deleted_by` (`deleted_by`),
  CONSTRAINT `shop_users_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `shop_users_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  CONSTRAINT `shop_users_ibfk_4` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`),
  CONSTRAINT `shop_users_ibfk_5` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品售卖商店职员表';



# Dump of table shops
# ------------------------------------------------------------

DROP TABLE IF EXISTS `shops`;

CREATE TABLE `shops` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `phone_num` char(20) DEFAULT NULL,
  `web_addr` varchar(255) DEFAULT NULL,
  `shop_info` mediumtext,
  `popularity` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'user enjoy''s number',
  `user_keep_num` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'user keep''s number',
  `status` tinyint(1) unsigned DEFAULT '0' COMMENT '0:not autherate; 1:offical',
  `response_user_id` int(11) unsigned DEFAULT NULL,
  `created_by` int(11) unsigned DEFAULT NULL,
  `updated_by` int(11) unsigned DEFAULT NULL,
  `deleted_by` int(11) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL COMMENT 'null:active',
  PRIMARY KEY (`id`),
  KEY `response_user_id` (`response_user_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `deleted_by` (`deleted_by`),
  CONSTRAINT `shops_ibfk_1` FOREIGN KEY (`response_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `shops_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `shops_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  CONSTRAINT `shops_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`),
  CONSTRAINT `shops_ibfk_5` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品售卖商店表';



# Dump of table user_ranks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_ranks`;

CREATE TABLE `user_ranks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ranked_user_id` int(11) unsigned DEFAULT NULL COMMENT 'ranked user''s id',
  `rank` float unsigned NOT NULL DEFAULT '0' COMMENT 'rank''s mark',
  `rank_info` mediumtext COMMENT '用户评价信息',
  `created_by` int(11) unsigned DEFAULT NULL COMMENT 'ranking user',
  `updated_by` int(11) unsigned DEFAULT NULL,
  `deleted_by` int(11) unsigned DEFAULT NULL COMMENT 'deleting user',
  `created_at` datetime DEFAULT NULL COMMENT 'ranking time',
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL COMMENT 'deleting time',
  PRIMARY KEY (`id`),
  KEY `ranked_user_id` (`ranked_user_id`),
  KEY `created_by` (`created_by`),
  KEY `deleted_by` (`deleted_by`),
  CONSTRAINT `user_ranks_ibfk_1` FOREIGN KEY (`ranked_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `user_ranks_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `user_ranks_ibfk_3` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='对用户评价，评分表';



# Dump of table user_relation_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_relation_groups`;

CREATE TABLE `user_relation_groups` (
  `id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `group_info` mediumtext,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_relation_groups_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户的好友分组数据表';



# Dump of table user_relations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_relations`;

CREATE TABLE `user_relations` (
  `id` bigint(15) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) unsigned NOT NULL,
  `friend_user_id` int(11) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1:有效；0:邀请中',
  `user_relation_group_id` bigint(13) unsigned DEFAULT NULL COMMENT '分组',
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`),
  KEY `friend_user_id` (`friend_user_id`),
  KEY `user_relation_group_id` (`user_relation_group_id`),
  CONSTRAINT `user_relations_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`),
  CONSTRAINT `user_relations_ibfk_2` FOREIGN KEY (`friend_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `user_relations_ibfk_3` FOREIGN KEY (`user_relation_group_id`) REFERENCES `user_relation_groups` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='好友关系情况';



# Dump of table user_share_comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_share_comments`;

CREATE TABLE `user_share_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_share_id` bigint(20) unsigned NOT NULL,
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `comment_info` mediumtext,
  `is_public` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:not public; 1:public',
  `created_by` int(11) unsigned DEFAULT NULL,
  `deleted_by` int(11) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_share_id` (`user_share_id`),
  KEY `parent_id` (`parent_id`),
  KEY `created_by` (`created_by`),
  KEY `deleted_by` (`deleted_by`),
  CONSTRAINT `user_share_comments_ibfk_1` FOREIGN KEY (`user_share_id`) REFERENCES `user_shares` (`id`),
  CONSTRAINT `user_share_comments_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `user_share_comments` (`id`),
  CONSTRAINT `user_share_comments_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `user_share_comments_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户分享信息评论表';



# Dump of table user_shares
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_shares`;

CREATE TABLE `user_shares` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `preference_id` bigint(16) unsigned DEFAULT NULL COMMENT 'null:没有优惠信息；否则是优惠条目的id',
  `share_info` mediumtext NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `public_type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '0:公开;1:好友公开;2:注册用户公开;9:所有人公开',
  `created_by` int(11) unsigned DEFAULT NULL,
  `deleted_by` int(11) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `preference_id` (`preference_id`),
  KEY `created_by` (`created_by`),
  KEY `deleted_by` (`deleted_by`),
  CONSTRAINT `user_shares_ibfk_1` FOREIGN KEY (`preference_id`) REFERENCES `preferences` (`id`),
  CONSTRAINT `user_shares_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `user_shares_ibfk_3` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户分享表（店铺，打折信息等）';



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `u_name` char(60) DEFAULT '' COMMENT 'user''s nickname',
  `f_name` char(40) DEFAULT NULL COMMENT 'family name',
  `l_name` char(40) DEFAULT NULL COMMENT 'last name',
  `login_mail` char(255) DEFAULT '' COMMENT 'user regist mail，set it null when deleted',
  `email` char(255) DEFAULT '' COMMENT 'user regist mail',
  `password` char(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT 'user password',
  `post_code` char(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `home_phone` char(20) DEFAULT NULL,
  `mobile_phone` char(20) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:man; 1:woman;',
  `currency` tinyint(3) unsigned DEFAULT '0' COMMENT '用户选择币种（0:unset;1:RMB; 2DOLLAR; 3:JPN; 4;HK;...)',
  `language` char(4) DEFAULT 'en',
  `user_type` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:buyer; 1:saler',
  `shop_user_id` int(11) unsigned DEFAULT NULL COMMENT 'null:personal; int:: shop''s client.',
  `produce_company_user_id` int(11) unsigned DEFAULT NULL,
  `autheriticate_type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:not autheriticate, 1 common autheriticate,; 2:offical autheriticate;',
  `receive_collection_message_type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否接受推送消息(0：不接受；1:接受所有；2:接受收藏的和好友收藏的和官方推送；3：接受好友和自己收藏的；4：接受自己收藏的',
  `approve_times` int(5) unsigned NOT NULL DEFAULT '0',
  `remember_token` varchar(255) DEFAULT NULL,
  `remember_token_time` datetime DEFAULT NULL COMMENT '随机密码有效时间',
  `active_token` varchar(255) DEFAULT NULL COMMENT '激活码',
  `active_token_time` datetime DEFAULT NULL COMMENT '激活码到期时间',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '0: requsting; 1:active; 2:stop;',
  `public_type` tinyint(1) unsigned NOT NULL DEFAULT '2' COMMENT '0:任何人不公开；1:好友公开；2:注册用户公开;9:任意公开',
  `created_ip` char(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `u_name` (`u_name`),
  UNIQUE KEY `login_mail` (`login_mail`),
  UNIQUE KEY `active_token` (`active_token`),
  KEY `shop_user_id` (`shop_user_id`),
  KEY `produce_company_user_id` (`produce_company_user_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`shop_user_id`) REFERENCES `shop_users` (`id`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`produce_company_user_id`) REFERENCES `produce_company_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户信息表。\n普通用户：shop_user_id:null，produce_company_user_id:null\n商店用户：shop_user_id:shop_users表的id，produce_company_user_id:null\n产品生产公司用户：shop_user_id:null，produce_company_user_id:produce_company_users表的id';

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `u_name`, `f_name`, `l_name`, `login_mail`, `email`, `password`, `post_code`, `address`, `home_phone`, `mobile_phone`, `birthday`, `sex`, `currency`, `language`, `user_type`, `shop_user_id`, `produce_company_user_id`, `autheriticate_type`, `receive_collection_message_type`, `approve_times`, `remember_token`, `remember_token_time`, `active_token`, `active_token_time`, `status`, `public_type`, `created_ip`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'test_u','test_f','test_l',NULL,'test@test.com',X'74657374','111-1111','test_address','1234567890','0987654321','1992-09-18',0,0,'en',1,NULL,NULL,1,123,9,'69f536c88a3ce8350b785901d73c370b0d155e5c','2015-02-11 17:47:33',NULL,NULL,1,2,'127:0:0:1',NULL,NULL,NULL),
	(2,'test_u1','test_f1','test_l1',NULL,'test1@test.com',X'7465737431','111-1111','test_address','1234567890','0987654321','1992-09-18',0,0,'en',1,NULL,NULL,1,123,9,'5ac2c72e464c5bef37889b6f1811ae29a653c6ae',NULL,NULL,NULL,1,2,'127:0:0:1',NULL,NULL,NULL),
	(72,'root_u','root_f','root_l',NULL,'zhukangfen@gmail.com',X'','root_p','root_adress','root_h_p','root_m_p','1992-03-06',0,1,'en',0,NULL,NULL,0,1,0,'705068cb4a174e045a72ec95386679360603c522',NULL,NULL,NULL,1,2,'127.0.0.1',NULL,NULL,NULL),
	(111,'zhu_u1','zhu_f1','zhu-l1',NULL,'shu@c-m.co.jp',X'736875','123-45671','川崎市川崎区11','08088365933','08088365934','1992-03-22',0,1,'en',0,NULL,NULL,1,1,0,'edb220b7bf4347a3b47d4774a47261b3ceb3d89d','2015-03-23 01:58:47',NULL,NULL,1,2,'127.0.0.1',NULL,NULL,NULL),
	(112,'1','','',NULL,'shu1@c-m.co.jp',X'31','','','','','0000-00-00',0,8,'en',0,NULL,NULL,0,1,0,'27d6ce1ec3415ab9a7a942a31c4e73d768d822f3',NULL,NULL,NULL,1,2,'127.0.0.1',NULL,NULL,NULL),
	(114,'朱康峰','shu','kouhou',NULL,'shu@shu.com',X'736875','','','','','0000-00-00',0,1,'en',0,NULL,NULL,0,1,0,'936eb91fc9097b58d63c4d890917c416a480a3f7',NULL,NULL,NULL,1,2,'127.0.0.1',NULL,NULL,NULL),
	(115,'我是11111111-test_u111111111','test_f1','test_l1',NULL,'1',X'31','111-1111','test_address','1234567890','0987654321','1992-09-18',0,1,'en',1,NULL,NULL,1,1,9,'90bc2825a75b21fe4c3771159f955e8ef53b5c13','2015-03-26 15:55:41',NULL,NULL,1,2,'127:0:0:1',NULL,NULL,NULL),
	(116,'2','','',NULL,'2@2.com',X'32','','','','','0000-00-00',0,1,'en',0,NULL,NULL,0,1,0,NULL,'2015-01-30 18:14:39',NULL,NULL,1,2,'127.0.0.1',NULL,NULL,NULL),
	(117,'3','','',NULL,'3@3.com',X'33','','','','','0000-00-00',0,1,'en',0,NULL,NULL,0,1,0,NULL,NULL,NULL,NULL,1,2,'127.0.0.1',NULL,NULL,NULL),
	(118,'0','','',NULL,'0@0.com',X'31','','','','','0000-00-00',0,3,'en',0,NULL,NULL,0,1,0,'a5b0dcaab22c858c4be1fb89bc866c5c72c6e292','2015-02-09 17:47:55',NULL,NULL,1,2,'127.0.0.1',NULL,NULL,NULL),
	(119,'a','','',NULL,'a@aa.com',X'61','','','','','0000-00-00',0,1,'en',0,NULL,NULL,0,1,0,'5dea81c33d557e299585dde40a673336370e30a4','2015-02-09 17:44:23',NULL,NULL,1,2,'127.0.0.1',NULL,NULL,NULL),
	(120,'11','11-f','11-l',NULL,'11@11.com',X'3131','111-1111','1111','1111111','1111111','1111-11-11',0,3,'en',1,NULL,NULL,0,1,0,NULL,'2015-02-12 19:06:17',NULL,NULL,1,2,'127.0.0.1',NULL,NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
