<?php

// Models
use App\Models\User;

// Services
use Carbon\Carbon;
use Illuminate\Database\Seeder;

// Utils
use App\Utils\AuthUtil;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
            ->where('id', '<', DB::raw(35))
            ->delete();
        $userData = [];

        // 普通用户1
        $userData[] = [
            'id'            => 1,
            'u_name'        => 'test_u',
            'f_name'        => 'test_f',
            'l_name'        => 'test_l',
            'login_mail'    => 'test@test.com',
            'contact_email' => 'test@test.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'test 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/21',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_OFFICIAL_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.1'
        ];
        // 商店1管理员
        $userData[] = [
            'id'            => 2,
            'u_name'        => 'shop1_admin',
            'f_name'        => 'shop1_admin_f',
            'l_name'        => 'shop1_admin_l',
            'login_mail'    => 'admin@shop1.com',
            'contact_email' => 'admin@shop1.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'shop1 admin 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_OFFICIAL_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.2'
        ];
        // 商店1经理1
        $userData[] = [
            'id'            => 3,
            'u_name'        => 'shop1_manage1',
            'f_name'        => 'shop1_manage1_f',
            'l_name'        => 'shop1_manage1_l',
            'login_mail'    => 'manage1@shop1.com',
            'contact_email' => 'manage1@shop1.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'shop1 manage1 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_OFFICIAL_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.2'
        ];
        // 商店1经理2
        $userData[] = [
            'id'            => 4,
            'u_name'        => 'shop1_manage2',
            'f_name'        => 'shop1_manage2_f',
            'l_name'        => 'shop1_manage2_f',
            'login_mail'    => 'manage2@shop1.com',
            'contact_email' => 'manage2@shop1.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'shop1 manage2 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_OFFICIAL_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.2'
        ];
        // 商店1普通用户1
        $userData[] = [
            'id'            => 5,
            'u_name'        => 'shop1_common1',
            'f_name'        => 'shop1_common1_f',
            'l_name'        => 'shop1_common1_f',
            'login_mail'    => 'common1@shop1.com',
            'contact_email' => 'common1@shop1.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'shop1 common1 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_OFFICIAL_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.2'
        ];
        // 商店1普通用户2
        $userData[] = [
            'id'            => 6,
            'u_name'        => 'shop1_common2',
            'f_name'        => 'shop1_common2_f',
            'l_name'        => 'shop1_common2_f',
            'login_mail'    => 'common2@shop1.com',
            'contact_email' => 'common2@shop1.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'shop1 common2 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_OFFICIAL_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.2'
        ];
        // 商店1普通用户3
        $userData[] = [
            'id'            => 7,
            'u_name'        => 'shop1_common3',
            'f_name'        => 'shop1_common3_f',
            'l_name'        => 'shop1_common3_f',
            'login_mail'    => 'common3@shop1.com',
            'contact_email' => 'common3@shop1.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'shop1 common3 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_OFFICIAL_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.2'
        ];
        // 商店1普通用户4
        $userData[] = [
            'id'            => 8,
            'u_name'        => 'shop1_common4',
            'f_name'        => 'shop1_common4_f',
            'l_name'        => 'shop1_common4_f',
            'login_mail'    => 'common4@shop1.com',
            'contact_email' => 'common4@shop1.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'shop1 common4 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_OFFICIAL_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.2'
        ];

        // 商店2管理员
        $userData[] = [
            'id'            => 9,
            'u_name'        => 'shop2_admin',
            'f_name'        => 'shop2_admin_f',
            'l_name'        => 'shop2_admin_l',
            'login_mail'    => 'admin@shop2.com',
            'contact_email' => 'admin@shop2.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'shop2 admin 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_COMMON_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.2'
        ];
        // 商店2经理1
        $userData[] = [
            'id'            => 10,
            'u_name'        => 'shop2_manage1',
            'f_name'        => 'shop2_manage1_f',
            'l_name'        => 'shop2_manage1_l',
            'login_mail'    => 'manage1@shop2.com',
            'contact_email' => 'manage1@shop2.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'shop2 manage1 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_COMMON_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.2'
        ];
        // 商店2经理2
        $userData[] = [
            'id'            => 11,
            'u_name'        => 'shop2_manage2',
            'f_name'        => 'shop2_manage2_f',
            'l_name'        => 'shop2_manage2_f',
            'login_mail'    => 'manage2@shop2.com',
            'contact_email' => 'manage2@shop2.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'shop2 manage2 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_COMMON_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.2'
        ];
        // 商店2普通用户1
        $userData[] = [
            'id'            => 12,
            'u_name'        => 'shop2_common1',
            'f_name'        => 'shop2_common1_f',
            'l_name'        => 'shop2_common1_f',
            'login_mail'    => 'common1@shop2.com',
            'contact_email' => 'common1@shop2.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'shop2 common1 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_COMMON_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.2'
        ];
        // 商店2普通用户2
        $userData[] = [
            'id'            => 13,
            'u_name'        => 'shop2_common2',
            'f_name'        => 'shop2_common2_f',
            'l_name'        => 'shop2_common2_f',
            'login_mail'    => 'common2@shop2.com',
            'contact_email' => 'common2@shop2.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'shop2 common2 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_COMMON_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.2'
        ];
        // 商店2普通用户3
        $userData[] = [
            'id'            => 14,
            'u_name'        => 'shop2_common3',
            'f_name'        => 'shop2_common3_f',
            'l_name'        => 'shop2_common3_f',
            'login_mail'    => 'common3@shop2.com',
            'contact_email' => 'common3@shop2.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'shop2 common3 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_COMMON_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.2'
        ];
        // 商店2普通用户4
        $userData[] = [
            'id'            => 15,
            'u_name'        => 'shop2_common4',
            'f_name'        => 'shop2_common4_f',
            'l_name'        => 'shop2_common4_f',
            'login_mail'    => 'common4@shop2.com',
            'contact_email' => 'common4@shop2.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'shop2 common4 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_COMMON_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.2'
        ];

        // 生产厂家
        // 生产厂家1管理员
        $userData[] = [
            'id'            => 17,
            'u_name'        => 'produce_company1_admin',
            'f_name'        => 'produce_company1_admin_f',
            'l_name'        => 'produce_company1_admin_l',
            'login_mail'    => 'admin@produce_company1.com',
            'contact_email' => 'admin@produce_company1.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'produce_company1 admin 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_COMMON_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.5'
        ];
        // 生产厂家1经理1
        $userData[] = [
            'id'            => 18,
            'u_name'        => 'produce_company1_manage1',
            'f_name'        => 'produce_company1_manage1_f',
            'l_name'        => 'produce_company1_manage1_l',
            'login_mail'    => 'manage1@produce_company1.com',
            'contact_email' => 'manage1@produce_company1.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'produce_company1 manage1 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_OFFICIAL_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.5'
        ];
        // 生产厂家1经理2
        $userData[] = [
            'id'            => 19,
            'u_name'        => 'produce_company1_manage2',
            'f_name'        => 'produce_company1_manage2_f',
            'l_name'        => 'produce_company1_manage2_l',
            'login_mail'    => 'manage2@produce_company1.com',
            'contact_email' => 'manage2@produce_company1.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'produce_company1 manage2 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_OFFICIAL_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.5'
        ];
        // 生产厂家1普通用户1
        $userData[] = [
            'id'            => 20,
            'u_name'        => 'produce_company1_common1',
            'f_name'        => 'produce_company1_common1_f',
            'l_name'        => 'produce_company1_common1_l',
            'login_mail'    => 'common1@produce_company1.com',
            'contact_email' => 'common1@produce_company1.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'produce_company1 common1 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_OFFICIAL_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.5'
        ];
        // 生产厂家1普通用户2
        $userData[] = [
            'id'            => 21,
            'u_name'        => 'produce_company1_common2',
            'f_name'        => 'produce_company1_common2_f',
            'l_name'        => 'produce_company1_common2_l',
            'login_mail'    => 'common2@produce_company1.com',
            'contact_email' => 'common2@produce_company1.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'produce_company1 common2 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_OFFICIAL_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.5'
        ];
        // 生产厂家1普通用户3
        $userData[] = [
            'id'            => 22,
            'u_name'        => 'produce_company1_common3',
            'f_name'        => 'produce_company1_common3_f',
            'l_name'        => 'produce_company1_common3_l',
            'login_mail'    => 'common3@produce_company1.com',
            'contact_email' => 'common3@produce_company1.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'produce_company1 common3 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_OFFICIAL_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.5'
        ];
        // 生产厂家1普通用户4
        $userData[] = [
            'id'            => 23,
            'u_name'        => 'produce_company1_common4',
            'f_name'        => 'produce_company1_common4_f',
            'l_name'        => 'produce_company1_common4_l',
            'login_mail'    => 'common4@produce_company1.com',
            'contact_email' => 'common4@produce_company1.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'produce_company1 common4 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_OFFICIAL_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.5'
        ];

        // 生产厂家2管理员
        $userData[] = [
            'id'            => 24,
            'u_name'        => 'produce_company2_admin',
            'f_name'        => 'produce_company2_admin_f',
            'l_name'        => 'produce_company2_admin_l',
            'login_mail'    => 'admin@produce_company2.com',
            'contact_email' => 'admin@produce_company2.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'produce_company2 admin 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_COMMON_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.5'
        ];
        // 生产厂家2经理1
        $userData[] = [
            'id'            => 25,
            'u_name'        => 'produce_company2_manage1',
            'f_name'        => 'produce_company2_manage1_f',
            'l_name'        => 'produce_company2_manage1_l',
            'login_mail'    => 'manage1@produce_company2.com',
            'contact_email' => 'manage1@produce_company2.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'produce_company2 manage1 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_COMMON_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.5'
        ];
        // 生产厂家2经理2
        $userData[] = [
            'id'            => 26,
            'u_name'        => 'produce_company2_manage2',
            'f_name'        => 'produce_company2_manage2_f',
            'l_name'        => 'produce_company2_manage2_l',
            'login_mail'    => 'manage2@produce_company2.com',
            'contact_email' => 'manage2@produce_company2.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'produce_company2 manage2 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_COMMON_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.5'
        ];
        // 生产厂家2普通用户1
        $userData[] = [
            'id'            => 27,
            'u_name'        => 'produce_company2_common1',
            'f_name'        => 'produce_company2_common1_f',
            'l_name'        => 'produce_company2_common1_l',
            'login_mail'    => 'common1@produce_company2.com',
            'contact_email' => 'common1@produce_company2.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'produce_company2 common1 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_COMMON_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.5'
        ];
        // 生产厂家2普通用户2
        $userData[] = [
            'id'            => 28,
            'u_name'        => 'produce_company2_common2',
            'f_name'        => 'produce_company2_common2_f',
            'l_name'        => 'produce_company2_common2_l',
            'login_mail'    => 'common2@produce_company2.com',
            'contact_email' => 'common2@produce_company2.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'produce_company2 common2 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_COMMON_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.5'
        ];
        // 生产厂家2普通用户3
        $userData[] = [
            'id'            => 29,
            'u_name'        => 'produce_company2_common3',
            'f_name'        => 'produce_company2_common3_f',
            'l_name'        => 'produce_company2_common3_l',
            'login_mail'    => 'common3@produce_company2.com',
            'contact_email' => 'common3@produce_company2.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'produce_company2 common3 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_COMMON_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.5'
        ];
        // 生产厂家2普通用户4
        $userData[] = [
            'id'            => 30,
            'u_name'        => 'produce_company2_common4',
            'f_name'        => 'produce_company2_common4_f',
            'l_name'        => 'produce_company2_common4_l',
            'login_mail'    => 'common4@produce_company2.com',
            'contact_email' => 'common4@produce_company2.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'produce_company2 common4 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_COMMON_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.5'
        ];

        // 商店1阅览用户
        $userData[] = [
            'id'            => 31,
            'u_name'        => 'shop1_guest1',
            'f_name'        => 'shop1_guest1_f',
            'l_name'        => 'shop1_guest1_l',
            'login_mail'    => 'guest1@shop1.com',
            'contact_email' => 'guest1@shop1.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'shop1 guest1 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_COMMON_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.2'
        ];

        // 商店1阅览用户
        $userData[] = [
            'id'            => 32,
            'u_name'        => 'shop1_guest2',
            'f_name'        => 'shop1_guest2_f',
            'l_name'        => 'shop1_guest2_l',
            'login_mail'    => 'guest2@shop1.com',
            'contact_email' => 'guest2@shop1.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'shop1 guest2 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_COMMON_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.2'
        ];

        // 商店2阅览用户
        $userData[] = [
            'id'            => 33,
            'u_name'        => 'shop2_guest1',
            'f_name'        => 'shop2_guest1_f',
            'l_name'        => 'shop2_guest1_l',
            'login_mail'    => 'guest1@shop2.com',
            'contact_email' => 'guest1@shop2.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'shop2 guest1 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_COMMON_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.2'
        ];

        // 商店2阅览用户
        $userData[] = [
            'id'            => 34,
            'u_name'        => 'shop2_guest2',
            'f_name'        => 'shop2_guest2_f',
            'l_name'        => 'shop2_guest2_l',
            'login_mail'    => 'guest2@shop2.com',
            'contact_email' => 'guest2@shop2.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'shop2 guest2 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_COMMON_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_COMMON_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'active_token'      => null,
            'status'            => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.2'
        ];


        User::multiCreate($userData);
    }
}
