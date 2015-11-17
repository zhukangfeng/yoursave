<?php

use Illuminate\Database\Seeder;

// Models
use App\Models\Consume;

// Services
use Carbon\Carbon;

class ConsumeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consumes')->where('id', '<', 25)->delete();

        $consumeData = [];

        $consumeData[] = [
            'id'            => 1,
            'user_id'       => 1,
            'good_id'       => 1,
            'good_name'     => '商品1',
            'shop_good_id'  => null,
            'shop_id'       => '商店1',
            'shop_name'     => null,
            'consume_name'  => '消费1',
            'consume_cost'  => '123',
            'currency'      => null,
            'consume_info'  => '这是第1笔消费',
            'consume_time'  => Carbon::now()->subDays(51),
            'place'         => '东京'
        ];
        $consumeData[] = [
            'id'            => 2,
            'user_id'       => 1,
            'good_id'       => 1,
            'good_name'     => '商品1',
            'shop_good_id'  => null,
            'shop_id'       => '商店1',
            'shop_name'     => null,
            'consume_name'  => '消费2',
            'consume_cost'  => '223',
            'currency'      => null,
            'consume_info'  => '这是第2笔消费',
            'consume_time'  => Carbon::now()->subDays(41),
            'place'         => '东京'
        ];
        $consumeData[] = [
            'id'            => 3,
            'user_id'       => 1,
            'good_id'       => 1,
            'good_name'     => '商品1',
            'shop_good_id'  => null,
            'shop_id'       => '商店1',
            'shop_name'     => null,
            'consume_name'  => '消费3',
            'consume_cost'  => '323',
            'currency'      => null,
            'consume_info'  => '这是第3笔消费',
            'consume_time'  => Carbon::now()->subDays(31),
            'place'         => '东京'
        ];
        $consumeData[] = [
            'id'            => 4,
            'user_id'       => 1,
            'good_id'       => 1,
            'good_name'     => '商品1',
            'shop_good_id'  => null,
            'shop_id'       => '商店1',
            'shop_name'     => null,
            'consume_name'  => '消费4',
            'consume_cost'  => '423',
            'currency'      => null,
            'consume_info'  => '这是第4笔消费',
            'consume_time'  => Carbon::now()->subDays(20),
            'place'         => '东京'
        ];
        $consumeData[] = [
            'id'            => 5,
            'user_id'       => 1,
            'good_id'       => 1,
            'good_name'     => '商品1',
            'shop_good_id'  => null,
            'shop_id'       => '商店1',
            'shop_name'     => null,
            'consume_name'  => '消费5',
            'consume_cost'  => '523',
            'currency'      => null,
            'consume_info'  => '这是第5笔消费',
            'consume_time'  => Carbon::now()->subDays(10),
            'place'         => '东京'
        ];
        $consumeData[] = [
            'id'            => 6,
            'user_id'       => 1,
            'good_id'       => 1,
            'good_name'     => '商品1',
            'shop_good_id'  => null,
            'shop_id'       => '商店1',
            'shop_name'     => null,
            'consume_name'  => '消费6',
            'consume_cost'  => '623',
            'currency'      => null,
            'consume_info'  => '这是第一笔消费',
            'consume_time'  => Carbon::now(),
            'place'         => '东京'
        ];

        $consumeData[] = [
            'id'            => 7,
            'user_id'       => 2,
            'good_id'       => 2,
            'good_name'     => '商品2',
            'shop_good_id'  => null,
            'shop_id'       => 2,
            'shop_name'     => '商店2',
            'consume_name'  => '消费1',
            'consume_cost'  => '123',
            'currency'      => null,
            'consume_info'  => '这是第1笔消费',
            'consume_time'  => Carbon::now()->subDays(51),
            'place'         => '东京'
        ];
        $consumeData[] = [
            'id'            => 8,
            'user_id'       => 2,
            'good_id'       => 2,
            'good_name'     => '商品2',
            'shop_good_id'  => null,
            'shop_id'       => 2,
            'shop_name'     => '商店2',
            'consume_name'  => '消费2',
            'consume_cost'  => '223.8',
            'currency'      => null,
            'consume_info'  => '这是第2笔消费',
            'consume_time'  => Carbon::now()->subDays(41),
            'place'         => '东京'
        ];
        $consumeData[] = [
            'id'            => 9,
            'user_id'       => 2,
            'good_id'       => 2,
            'good_name'     => '商品2',
            'shop_good_id'  => null,
            'shop_id'       => 2,
            'shop_name'     => '商店2',
            'consume_name'  => '消费3',
            'consume_cost'  => '323.9',
            'currency'      => null,
            'consume_info'  => '这是第3笔消费',
            'consume_time'  => Carbon::now()->subDays(31),
            'place'         => '东京'
        ];
        $consumeData[] = [
            'id'            => 10,
            'user_id'       => 2,
            'good_id'       => 2,
            'good_name'     => '商品2',
            'shop_good_id'  => null,
            'shop_id'       => 2,
            'shop_name'     => '商店2',
            'consume_name'  => '消费4',
            'consume_cost'  => '423.10',
            'currency'      => null,
            'consume_info'  => '这是第4笔消费',
            'consume_time'  => Carbon::now()->subDays(20),
            'place'         => '东京'
        ];
        $consumeData[] = [
            'id'            => 11,
            'user_id'       => 2,
            'good_id'       => 2,
            'good_name'     => '商品2',
            'shop_good_id'  => null,
            'shop_id'       => 2,
            'shop_name'     => '商店2',
            'consume_name'  => '消费5',
            'consume_cost'  => '523.11',
            'currency'      => null,
            'consume_info'  => '这是第5笔消费',
            'consume_time'  => Carbon::now()->subDays(10),
            'place'         => '东京'
        ];
        $consumeData[] = [
            'id'            => 12,
            'user_id'       => 2,
            'good_id'       => 2,
            'good_name'     => '商品2',
            'shop_good_id'  => null,
            'shop_id'       => 2,
            'shop_name'     => '商店2',
            'consume_name'  => '消费6',
            'consume_cost'  => '623.12',
            'currency'      => null,
            'consume_info'  => '这是第一笔消费',
            'consume_time'  => Carbon::now(),
            'place'         => '东京'
        ];

        $consumeData[] = [
            'id'            => 13,
            'user_id'       => 2,
            'good_id'       => 3,
            'good_name'     => '商品3',
            'shop_good_id'  => null,
            'shop_id'       => 2,
            'shop_name'     => '商店2',
            'consume_name'  => '消费1',
            'consume_cost'  => '123.13',
            'currency'      => null,
            'consume_info'  => '这是第1笔消费',
            'consume_time'  => Carbon::now()->subDays(51),
            'place'         => '东京'
        ];
        $consumeData[] = [
            'id'            => 14,
            'user_id'       => 2,
            'good_id'       => 3,
            'good_name'     => '商品3',
            'shop_good_id'  => null,
            'shop_id'       => 2,
            'shop_name'     => '商店2',
            'consume_name'  => '消费2',
            'consume_cost'  => '223.14',
            'currency'      => null,
            'consume_info'  => '这是第2笔消费',
            'consume_time'  => Carbon::now()->subDays(41),
            'place'         => '东京'
        ];
        $consumeData[] = [
            'id'            => 15,
            'user_id'       => 2,
            'good_id'       => 3,
            'good_name'     => '商品3',
            'shop_good_id'  => null,
            'shop_id'       => 2,
            'shop_name'     => '商店2',
            'consume_name'  => '消费3',
            'consume_cost'  => '323.15',
            'currency'      => null,
            'consume_info'  => '这是第3笔消费',
            'consume_time'  => Carbon::now()->subDays(31),
            'place'         => '东京'
        ];
        $consumeData[] = [
            'id'            => 16,
            'user_id'       => 2,
            'good_id'       => 3,
            'good_name'     => '商品3',
            'shop_good_id'  => null,
            'shop_id'       => 2,
            'shop_name'     => '商店2',
            'consume_name'  => '消费4',
            'consume_cost'  => '423.16',
            'currency'      => null,
            'consume_info'  => '这是第4笔消费',
            'consume_time'  => Carbon::now()->subDays(20),
            'place'         => '东京'
        ];
        $consumeData[] = [
            'id'            => 17,
            'user_id'       => 2,
            'good_id'       => 3,
            'good_name'     => '商品3',
            'shop_good_id'  => null,
            'shop_id'       => 2,
            'shop_name'     => '商店2',
            'consume_name'  => '消费5',
            'consume_cost'  => '523.17',
            'currency'      => null,
            'consume_info'  => '这是第5笔消费',
            'consume_time'  => Carbon::now()->subDays(10),
            'place'         => '东京'
        ];
        $consumeData[] = [
            'id'            => 18,
            'user_id'       => 2,
            'good_id'       => 3,
            'good_name'     => '商品3',
            'shop_good_id'  => null,
            'shop_id'       => 2,
            'shop_name'     => '商店2',
            'consume_name'  => '消费6',
            'consume_cost'  => '623.18',
            'currency'      => null,
            'consume_info'  => '这是第一笔消费',
            'consume_time'  => Carbon::now(),
            'place'         => '东京'
        ];

        $consumeData[] = [
            'id'            => 19,
            'user_id'       => 2,
            'good_id'       => 3,
            'good_name'     => '商品3',
            'shop_good_id'  => null,
            'shop_id'       => 1,
            'shop_name'     => '商店2',
            'consume_name'  => '消费1',
            'consume_cost'  => '123.19',
            'currency'      => null,
            'consume_info'  => '这是第1笔消费',
            'consume_time'  => Carbon::now()->subDays(51),
            'place'         => '东京'
        ];
        $consumeData[] = [
            'id'            => 20,
            'user_id'       => 2,
            'good_id'       => 3,
            'good_name'     => '商品3',
            'shop_good_id'  => null,
            'shop_id'       => 1,
            'shop_name'     => '商店2',
            'consume_name'  => '消费2',
            'consume_cost'  => '223.20',
            'currency'      => null,
            'consume_info'  => '这是第2笔消费',
            'consume_time'  => Carbon::now()->subDays(41),
            'place'         => '东京'
        ];
        $consumeData[] = [
            'id'            => 21,
            'user_id'       => 2,
            'good_id'       => 3,
            'good_name'     => '商品3',
            'shop_good_id'  => null,
            'shop_id'       => 1,
            'shop_name'     => '商店2',
            'consume_name'  => '消费3',
            'consume_cost'  => '323.21',
            'currency'      => null,
            'consume_info'  => '这是第3笔消费',
            'consume_time'  => Carbon::now()->subDays(31),
            'place'         => '东京'
        ];
        $consumeData[] = [
            'id'            => 22,
            'user_id'       => 2,
            'good_id'       => 3,
            'good_name'     => '商品3',
            'shop_good_id'  => null,
            'shop_id'       => 1,
            'shop_name'     => '商店2',
            'consume_name'  => '消费4',
            'consume_cost'  => '423.22',
            'currency'      => null,
            'consume_info'  => '这是第4笔消费',
            'consume_time'  => Carbon::now()->subDays(20),
            'place'         => '东京'
        ];
        $consumeData[] = [
            'id'            => 23,
            'user_id'       => 2,
            'good_id'       => 3,
            'good_name'     => '商品3',
            'shop_good_id'  => null,
            'shop_id'       => 1,
            'shop_name'     => '商店2',
            'consume_name'  => '消费5',
            'consume_cost'  => '523.23',
            'currency'      => null,
            'consume_info'  => '这是第5笔消费',
            'consume_time'  => Carbon::now()->subDays(10),
            'place'         => '东京'
        ];
        $consumeData[] = [
            'id'            => 24,
            'user_id'       => 2,
            'good_id'       => 3,
            'good_name'     => '商品3',
            'shop_good_id'  => null,
            'shop_id'       => 1,
            'shop_name'     => '商店2',
            'consume_name'  => '消费6',
            'consume_cost'  => '623.24',
            'currency'      => null,
            'consume_info'  => '这是第一笔消费',
            'consume_time'  => Carbon::now(),
            'place'         => '东京'
        ];
        Consume::multiCreate($consumeData);
    }
}
