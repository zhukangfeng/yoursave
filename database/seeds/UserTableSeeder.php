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
        DB::table('users')->delete();
        $userData = [];

        $userData[] = [
            'id'            => 1,
            'u_name'        => 'test_u',
            'f_name'        => 'test_f',
            'l_name'        => 'test_l',
            'login_mail'    => 'test@test.com',
            'email'         => 'test@test.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'test 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/21',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_USERS_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'shop_user_id'  => null,
            'produce_company_user_id'   => null,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_OFFICIAL_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'approve_times'     => 100,
            'active_token'      => null,
            'status'        => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.1'
        ];
        $userData[] = [
            'id'            => 2,
            'u_name'        => 'test_s',
            'f_name'        => 'test_s_f',
            'l_name'        => 'test_s_f',
            'login_mail'    => 'test_s@test.com',
            'email'         => 'test_s@test.com',
            'password'      => AuthUtil::encryptPassword('password'),
            'post_code'     => '123-456',
            'address'       => 'test_s 的住所',
            'home_phone'    => '1234567890',
            'mobile_phone'  => '0123456789',
            'birthday'      => '1992/03/22',
            'sex'           => DB_USERS_SEX_MAN,
            'currency'      => DB_USERS_CURRENCY_RMB,
            'language'      => DB_USERS_LANGUAGE_ZH_CN,
            'shop_user_id'  => 1,
            'produce_company_user_id'   => null,
            'autheriticate_type'        => DB_USERS_AUTHERITICATE_TYPE_OFFICIAL_AUTH,
            'receive_collection_message_type'   => DB_USERS_RECEIVE_COLLECTION_MESSAGE_TYPE_REVEIVE_ALL,
            'approve_times'     => 100,
            'active_token'      => null,
            'status'        => DB_USERS_STATUS_EFFECITVE,
            'public_type'       => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_ip'        => '127.0.0.2'
        ];

        User::multiCreate($userData);
    }
}
