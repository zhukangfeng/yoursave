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
            ->where('id', '<', DB::raw(15))
            ->delete();

        $shopUserData = [];
        // 商店1用户
        // 管理员
        $shopUserData[] = [
            'id'        => 1,
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_ADMIN,
            'email'     => 'admin@shop1.com',
            'name'      => 'shop1_admin',
            'position'  => 'admin',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];
        // 经理1
        $shopUserData[] = [
            'id'        => 2,
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_MANAGER,
            'email'     => 'manage1@shop1.com',
            'name'      => 'shop1_manage1',
            'position'  => 'manage',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];
        // 经理2
        $shopUserData[] = [
            'id'        => 3,
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_MANAGER,
            'email'     => 'manage2@shop1.com',
            'name'      => 'shop1_manage2',
            'position'  => 'manage',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];
        // 经理1新建普通用户1
        $shopUserData[] = [
            'id'        => 4,
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_COMMON,
            'email'     => 'common1@shop1.com',
            'name'      => 'shop1_common1',
            'position'  => 'common',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 3,
            'updated_by'    => 3,
        ];
        // 经理1新建普通用户2
        $shopUserData[] = [
            'id'        => 5,
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_COMMON,
            'email'     => 'common2@shop1.com',
            'name'      => 'shop1_common2',
            'position'  => 'common',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 3,
            'updated_by'    => 3,
        ];
        // 经理2新建普通用户1
        $shopUserData[] = [
            'id'        => 6,
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_COMMON,
            'email'     => 'common3@shop1.com',
            'name'      => 'shop1_common3',
            'position'  => 'common',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 4,
            'updated_by'    => 4,
        ];
        // 经理2新建普通用户2
        $shopUserData[] = [
            'id'        => 7,
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_COMMON,
            'email'     => 'common4@shop1.com',
            'name'      => 'shop1_common4',
            'position'  => 'common',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 4,
            'updated_by'    => 4,
        ];

        // 商店2用户
        // 管理员
        $shopUserData[] = [
            'id'        => 8,
            'shop_id'   => 2,
            'type'      => DB_SHOP_USERS_TYPE_ADMIN,
            'email'     => 'admin@shop2.com',
            'name'      => 'shop2_admin',
            'position'  => 'admin',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 9,
            'updated_by'    => 9,
        ];
        // 经理1
        $shopUserData[] = [
            'id'        => 9,
            'shop_id'   => 2,
            'type'      => DB_SHOP_USERS_TYPE_MANAGER,
            'email'     => 'manage1@shop2.com',
            'name'      => 'shop2_manage1',
            'position'  => 'manage',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 9,
            'updated_by'    => 9,
        ];
        // 经理2
        $shopUserData[] = [
            'id'        => 10,
            'shop_id'   => 2,
            'type'      => DB_SHOP_USERS_TYPE_MANAGER,
            'email'     => 'manage2@shop2.com',
            'name'      => 'shop2_manage2',
            'position'  => 'manage',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 9,
            'updated_by'    => 9,
        ];
        // 经理1新建普通用户1
        $shopUserData[] = [
            'id'        => 11,
            'shop_id'   => 2,
            'type'      => DB_SHOP_USERS_TYPE_COMMON,
            'email'     => 'common1@shop2.com',
            'name'      => 'shop2_common1',
            'position'  => 'common',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 10,
            'updated_by'    => 10,
        ];
        // 经理1新建普通用户2
        $shopUserData[] = [
            'id'        => 12,
            'shop_id'   => 2,
            'type'      => DB_SHOP_USERS_TYPE_COMMON,
            'email'     => 'common2@shop2.com',
            'name'      => 'shop2_common2',
            'position'  => 'common',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 10,
            'updated_by'    => 10,
        ];
        // 经理2新建普通用户1
        $shopUserData[] = [
            'id'        => 13,
            'shop_id'   => 2,
            'type'      => DB_SHOP_USERS_TYPE_COMMON,
            'email'     => 'common3@shop2.com',
            'name'      => 'shop2_common3',
            'position'  => 'common',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 11,
            'updated_by'    => 11,
        ];
        // 经理2新建普通用户2
        $shopUserData[] = [
            'id'        => 14,
            'shop_id'   => 2,
            'type'      => DB_SHOP_USERS_TYPE_COMMON,
            'email'     => 'common4@shop2.com',
            'name'      => 'shop1_common4',
            'position'  => 'common',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 11,
            'updated_by'    => 11,
        ];
        ShopUser::multiCreate($shopUserData);
        User::where('id', 2)->update(['shop_user_id' => 1]);
        User::where('id', 3)->update(['shop_user_id' => 2]);
        User::where('id', 4)->update(['shop_user_id' => 3]);
        User::where('id', 5)->update(['shop_user_id' => 4]);
        User::where('id', 6)->update(['shop_user_id' => 5]);
        User::where('id', 7)->update(['shop_user_id' => 6]);
        User::where('id', 8)->update(['shop_user_id' => 7]);
        User::where('id', 9)->update(['shop_user_id' => 8]);
        User::where('id', 10)->update(['shop_user_id' => 9]);
        User::where('id', 11)->update(['shop_user_id' => 10]);
        User::where('id', 12)->update(['shop_user_id' => 11]);
        User::where('id', 13)->update(['shop_user_id' => 12]);
        User::where('id', 14)->update(['shop_user_id' => 13]);
        User::where('id', 15)->update(['shop_user_id' => 14]);
    }
}
