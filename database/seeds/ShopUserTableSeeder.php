<?php

use App\Models\ShopUser;
use App\Models\User;

use Illuminate\Database\Seeder;

class ShopUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop_users')
            ->where('id', '<', DB::raw(19))
            ->delete();

        $shopUserData = [];
        // 商店1用户
        // 管理员
        $shopUserData[] = [
            'id'        => 1,
            'user_id'   => 2,
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_ADMIN,
            'email'     => 'admin@shop1.com',
            'position'  => 'admin',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];
        // 经理1
        $shopUserData[] = [
            'id'        => 2,
            'user_id'   => 3,
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_MANAGER,
            'email'     => 'manage1@shop1.com',
            'position'  => 'manage',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];
        // 经理2
        $shopUserData[] = [
            'id'        => 3,
            'user_id'   => 4,
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_MANAGER,
            'email'     => 'manage2@shop1.com',
            'position'  => 'manage',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];
        // 经理1新建普通用户1
        $shopUserData[] = [
            'id'        => 4,
            'user_id'   => 5,
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_COMMON,
            'email'     => 'common1@shop1.com',
            'position'  => 'common',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 3,
            'updated_by'    => 3,
        ];
        // 经理1新建普通用户2
        $shopUserData[] = [
            'id'        => 5,
            'user_id'   => 6,
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_COMMON,
            'email'     => 'common2@shop1.com',
            'position'  => 'common',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 3,
            'updated_by'    => 3,
        ];
        // 经理2新建普通用户1
        $shopUserData[] = [
            'id'        => 6,
            'user_id'   => 7,
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_COMMON,
            'email'     => 'common3@shop1.com',
            'position'  => 'common',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 4,
            'updated_by'    => 4,
        ];
        // 经理2新建普通用户2
        $shopUserData[] = [
            'id'        => 7,
            'user_id'   => 8,
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_COMMON,
            'email'     => 'common4@shop1.com',
            'position'  => 'common',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 4,
            'updated_by'    => 4,
        ];

        // 商店2用户
        // 管理员
        $shopUserData[] = [
            'id'        => 8,
            'user_id'   => 9,
            'shop_id'   => 2,
            'type'      => DB_SHOP_USERS_TYPE_ADMIN,
            'email'     => 'admin@shop2.com',
            'position'  => 'admin',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 9,
            'updated_by'    => 9,
        ];
        // 经理1
        $shopUserData[] = [
            'id'        => 9,
            'user_id'   => 10,
            'shop_id'   => 2,
            'type'      => DB_SHOP_USERS_TYPE_MANAGER,
            'email'     => 'manage1@shop2.com',
            'position'  => 'manage',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 9,
            'updated_by'    => 9,
        ];
        // 经理2
        $shopUserData[] = [
            'id'        => 10,
            'user_id'   => 11,
            'shop_id'   => 2,
            'type'      => DB_SHOP_USERS_TYPE_MANAGER,
            'email'     => 'manage2@shop2.com',
            'position'  => 'manage',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 9,
            'updated_by'    => 9,
        ];
        // 经理1新建普通用户1
        $shopUserData[] = [
            'id'        => 11,
            'user_id'   => 12,
            'shop_id'   => 2,
            'type'      => DB_SHOP_USERS_TYPE_COMMON,
            'email'     => 'common1@shop2.com',
            'position'  => 'common',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 10,
            'updated_by'    => 10,
        ];
        // 经理1新建普通用户2
        $shopUserData[] = [
            'id'        => 12,
            'user_id'   => 13,
            'shop_id'   => 2,
            'type'      => DB_SHOP_USERS_TYPE_COMMON,
            'email'     => 'common2@shop2.com',
            'position'  => 'common',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 10,
            'updated_by'    => 10,
        ];
        // 经理2新建普通用户1
        $shopUserData[] = [
            'id'        => 13,
            'user_id'   => 14,
            'shop_id'   => 2,
            'type'      => DB_SHOP_USERS_TYPE_COMMON,
            'email'     => 'common3@shop2.com',
            'position'  => 'common',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 11,
            'updated_by'    => 11,
        ];
        // 经理2新建普通用户2
        $shopUserData[] = [
            'id'        => 14,
            'user_id'   => 15,
            'shop_id'   => 2,
            'type'      => DB_SHOP_USERS_TYPE_COMMON,
            'email'     => 'common4@shop2.com',
            'position'  => 'common',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 11,
            'updated_by'    => 11,
        ];
        $shopUserData[] = [
            'id'        => 15,
            'user_id'   => 31,
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_GUEST,
            'email'     => 'guest1@shop1.com',
            'position'  => 'guest',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 2,
            'updated_by'    => 2,
            ];
        $shopUserData[] = [
            'id'        => 16,
            'user_id'   => 32,
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_GUEST,
            'email'     => 'guest2@shop1.com',
            'position'  => 'guest',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 2,
            'updated_by'    => 2,
            ];
        $shopUserData[] = [
            'id'        => 17,
            'user_id'   => 33,
            'shop_id'   => 2,
            'type'      => DB_SHOP_USERS_TYPE_GUEST,
            'email'     => 'guest1@shop2.com',
            'position'  => 'guest',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 11,
            'updated_by'    => 11,
            ];
        $shopUserData[] = [
            'id'        => 18,
            'user_id'   => 34,
            'shop_id'   => 2,
            'type'      => DB_SHOP_USERS_TYPE_GUEST,
            'email'     => 'guest2@shop1.com',
            'position'  => 'guest',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 11,
            'updated_by'    => 11,
            ];
        ShopUser::multiCreate($shopUserData);
    }
}
