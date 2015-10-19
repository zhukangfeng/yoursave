<?php

use App\Models\ShopUser;

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
        DB::table('shop_users')->delete();

        $shopUserData = [];
        $shopUserData[] = [
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_ADMIN,
            'email'     => 'admin@shop1.com',
            'name'      => 'shop1_admin',
            'position'  => 'admin',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];
        $shopUserData[] = [
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_MANAGER,
            'email'     => 'manage1@shop1.com',
            'name'      => 'shop1_manage1',
            'position'  => 'manage',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];
        $shopUserData[] = [
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_MANAGER,
            'email'     => 'manage2@shop1.com',
            'name'      => 'shop1_manage2',
            'position'  => 'manage',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];
        $shopUserData[] = [
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_COMMON,
            'email'     => 'common1@shop1.com',
            'name'      => 'shop1_common1',
            'position'  => 'common',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 3,
            'updated_by'    => 3,
        ];
        $shopUserData[] = [
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_COMMON,
            'email'     => 'common2@shop1.com',
            'name'      => 'shop1_common2',
            'position'  => 'common',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 3,
            'updated_by'    => 3,
        ];
        $shopUserData[] = [
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_COMMON,
            'email'     => 'common3@shop1.com',
            'name'      => 'shop1_common3',
            'position'  => 'common',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 4,
            'updated_by'    => 4,
        ];
        $shopUserData[] = [
            'shop_id'   => 1,
            'type'      => DB_SHOP_USERS_TYPE_COMMON,
            'email'     => 'common3@shop1.com',
            'name'      => 'shop1_common4',
            'position'  => 'common',
            'status'    => DB_SHOP_USERS_STATUS_EFFECTIVE,
            'created_by'    => 4,
            'updated_by'    => 4,
        ];

        ShopUser::multiCreate($shopUserData);
    }
}
