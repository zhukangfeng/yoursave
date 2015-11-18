<?php

use App\Models\Shop;

use Illuminate\Database\Seeder;

class ShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')
            ->where('id', '<', DB::raw(3))
            ->delete();
        
        $shopData = [];
        // 商店1
        $shopData[] = [
            'id'        => 1,
            'name'      => '商店1',
            'address'   => '商店1地址',
            'phone_num' => '0123456789',
            'web_addr'  => 'http://shop1.com',
            'shop_info' => '这是商店1',
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'status'        => DB_SHOPS_STATUS_AUTHENTICATED,
            'response_user_id'  => 2,
            'created_by'    => 2,
            'updated_by'    => 2
        ];
        // 商店2
        $shopData[] = [
            'id'        => 2,
            'name'      => '商店2',
            'address'   => '商店2地址',
            'phone_num' => '0123456789',
            'web_addr'  => 'http://shop2.com',
            'shop_info' => '这是商店2',
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'status'        => DB_SHOPS_STATUS_UNAUTHENTICATED,
            'response_user_id'  => 9,
            'created_by'    => 9,
            'updated_by'    => 9
        ];

        Shop::multiCreate($shopData);
    }
}
