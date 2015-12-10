<?php

// Models
use App\Models\ShopGood;

// Services
use Illuminate\Database\Seeder;

class ShopGoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ShopGood::where('id', '<', '20')->delete();

        $shopGoodData = [];

        $shopGoodData[] = [
            'id'    => 1,
            'shop_id'   => 1,
            'good_id'   => 1,
            'produce_company_id'    => 1,
            'cost'  => 200,
            'price' => 300,
            'good_info' => '测试用商品1',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];

        $shopGoodData[] = [
            'id'    => 2,
            'shop_id'   => 1,
            'good_id'   => 2,
            'produce_company_id'    => 1,
            'cost'  => 201,
            'price' => 301,
            'good_info' => '测试用商品2',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 3,
            'updated_by'    => 3,
        ];

        $shopGoodData[] = [
            'id'    => 3,
            'shop_id'   => 1,
            'good_id'   => 3,
            'produce_company_id'    => 1,
            'cost'  => 203,
            'price' => 303,
            'good_info' => '测试用商品3',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 3,
            'updated_by'    => 3,
        ];

        $shopGoodData[] = [
            'id'    => 4,
            'shop_id'   => 1,
            'good_id'   => 4,
            'produce_company_id'    => 1,
            'cost'  => 201,
            'price' => 301,
            'good_info' => '测试用商品4',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];

        $shopGoodData[] = [
            'id'    => 5,
            'shop_id'   => 1,
            'good_id'   => 5,
            'produce_company_id'    => 1,
            'cost'  => 205,
            'price' => 305,
            'good_info' => '测试用商品',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];

        $shopGoodData[] = [
            'id'    => 6,
            'shop_id'   => 1,
            'good_id'   => 6,
            'produce_company_id'    => 2,
            'cost'  => 206,
            'price' => 306,
            'good_info' => '测试用商品11',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];

        $shopGoodData[] = [
            'id'    => 7,
            'shop_id'   => 1,
            'good_id'   => 1,
            'produce_company_id'    => 2,
            'cost'  => 222,
            'price' => 333,
            'good_info' => '测试用商品22',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];

        $shopGoodData[] = [
            'id'    => 8,
            'shop_id'   => 1,
            'good_id'   => 2,
            'produce_company_id'    => 2,
            'cost'  => 233,
            'price' => 344,
            'good_info' => '测试用商品33',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];

        $shopGoodData[] = [
            'id'    => 9,
            'shop_id'   => 1,
            'good_id'   => 3,
            'produce_company_id'    => 2,
            'cost'  => 244,
            'price' => 355,
            'good_info' => '测试用商品44',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 3,
            'updated_by'    => 2,
        ];

        $shopGoodData[] = [
            'id'    => 10,
            'shop_id'   => 1,
            'good_id'   => 4,
            'produce_company_id'    => 2,
            'cost'  => 255,
            'price' => 366,
            'good_info' => '测试用商品55',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];

        $shopGoodData[] = [
            'id'    => 11,
            'shop_id'   => 1,
            'good_id'   => 5,
            'produce_company_id'    => 2,
            'cost'  => 266,
            'price' => 377,
            'good_info' => '测试用商品66',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];

        $shopGoodData[] = [
            'id'    => 12,
            'shop_id'   => 1,
            'good_id'   => 6,
            'produce_company_id'    => 2,
            'cost'  => 277,
            'price' => 388,
            'good_info' => '测试用商品77',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];

        $shopGoodData[] = [
            'id'    => 13,
            'shop_id'   => 2,
            'good_id'   => 1,
            'produce_company_id'    => 1,
            'cost'  => 200,
            'price' => 300,
            'good_info' => '测试用商品1',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];

        $shopGoodData[] = [
            'id'    => 14,
            'shop_id'   => 2,
            'good_id'   => 2,
            'produce_company_id'    => 1,
            'cost'  => 201,
            'price' => 301,
            'good_info' => '测试用商品2',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 3,
            'updated_by'    => 3,
        ];

        $shopGoodData[] = [
            'id'    => 15,
            'shop_id'   => 2,
            'good_id'   => 3,
            'produce_company_id'    => 1,
            'cost'  => 203,
            'price' => 303,
            'good_info' => '测试用商品3',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 3,
            'updated_by'    => 3,
        ];

        $shopGoodData[] = [
            'id'    => 16,
            'shop_id'   => 2,
            'good_id'   => 4,
            'produce_company_id'    => 1,
            'cost'  => 201,
            'price' => 301,
            'good_info' => '测试用商品4',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];

        $shopGoodData[] = [
            'id'    => 17,
            'shop_id'   => 2,
            'good_id'   => 5,
            'produce_company_id'    => 1,
            'cost'  => 205,
            'price' => 305,
            'good_info' => '测试用商品',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];

        $shopGoodData[] = [
            'id'    => 18,
            'shop_id'   => 2,
            'good_id'   => 6,
            'produce_company_id'    => 2,
            'cost'  => 206,
            'price' => 306,
            'good_info' => '测试用商品11',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];

        $shopGoodData[] = [
            'id'    => 19,
            'shop_id'   => 2,
            'good_id'   => 1,
            'produce_company_id'    => 2,
            'cost'  => 222,
            'price' => 333,
            'good_info' => '测试用商品22',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];

        $shopGoodData[] = [
            'id'    => 20,
            'shop_id'   => 2,
            'good_id'   => 2,
            'produce_company_id'    => 2,
            'cost'  => 233,
            'price' => 344,
            'good_info' => '测试用商品33',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];

        $shopGoodData[] = [
            'id'    => 21,
            'shop_id'   => 2,
            'good_id'   => 3,
            'produce_company_id'    => 2,
            'cost'  => 244,
            'price' => 355,
            'good_info' => '测试用商品44',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 3,
            'updated_by'    => 2,
        ];

        $shopGoodData[] = [
            'id'    => 22,
            'shop_id'   => 2,
            'good_id'   => 4,
            'produce_company_id'    => 2,
            'cost'  => 255,
            'price' => 366,
            'good_info' => '测试用商品55',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];

        $shopGoodData[] = [
            'id'    => 23,
            'shop_id'   => 2,
            'good_id'   => 5,
            'produce_company_id'    => 2,
            'cost'  => 266,
            'price' => 377,
            'good_info' => '测试用商品66',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];

        $shopGoodData[] = [
            'id'    => 24,
            'shop_id'   => 2,
            'good_id'   => 6,
            'produce_company_id'    => 2,
            'cost'  => 277,
            'price' => 388,
            'good_info' => '测试用商品77',
            'status'    => DB_SHOP_GOODS_STATUS_AUTHENTICATED,
            'public_type'   => DB_COMMON_PUBLIC_TYPE_YES_FOR_ALL,
            'created_by'    => 2,
            'updated_by'    => 2,
        ];

        ShopGood::multiCreate($shopGoodData);
    }
}
