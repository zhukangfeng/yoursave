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
        DB::table('shops')->delete();
        
        $shopData = [];
        $shopData[] = [
            'name'      => '商店1',
            'address'   => '商店1地址',
            'phone_num' => '0123456789',
            'web_addr'  => 'http://shop1.com',
            'shop_info' => '这是商店1',
            'popularity'    => 90,
            'user_keep_num' => 9876,
            'status'        => DB_SHOPS_STATUS_AUTHENTICATED,
            'response_user_id'  => 2,
            'created_by'    => 2,
            'updated_by'    => 2
        ];

        Shop::massCreate($shopData);
    }
}
