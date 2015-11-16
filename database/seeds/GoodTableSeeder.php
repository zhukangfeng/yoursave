<?php

use Illuminate\Database\Seeder;

use App\Models\Good;

class GoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goods')
            ->where('id', '<', 17)
            ->delete();

        $goodData = [];

        $goodData[] = [
            'id'            => 1,
            'good_kind_id'  => 56,
            'good_name' => '猪五花肉',
            'good_info' => '这是鲜美的五花肉',
            'status'    => DB_GOOD_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodData[] = [
            'id'            => 2,
            'good_kind_id'  => 56,
            'good_name' => '猪肥肉',
            'good_info' => '这是鲜美的肥肉',
            'status'    => DB_GOOD_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodData[] = [
            'id'            => 3,
            'good_kind_id'  => 56,
            'good_name' => '猪大腿肉',
            'good_info' => '这是鲜美的大腿肉',
            'status'    => DB_GOOD_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodData[] = [
            'id'            => 4,
            'good_kind_id'  => 56,
            'good_name' => '猪瘦肉',
            'good_info' => '这是鲜美的瘦肉',
            'status'    => DB_GOOD_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodData[] = [
            'id'            => 5,
            'good_kind_id'  => 56,
            'good_name' => '猪猪皮',
            'good_info' => '这是鲜美的猪皮',
            'status'    => DB_GOOD_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodData[] = [
            'id'            => 6,
            'good_kind_id'  => 56,
            'good_name' => '猪五花肉',
            'good_info' => '这是鲜美的五花肉',
            'status'    => DB_GOOD_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodData[] = [
            'id'            => 7,
            'good_kind_id'  => 56,
            'good_name' => '猪五花肉',
            'good_info' => '这是鲜美的五花肉',
            'status'    => DB_GOOD_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodData[] = [
            'id'            => 8,
            'good_kind_id'  => 57,
            'good_name' => '牛大腿肉',
            'good_info' => '这是鲜美的牛大腿肉',
            'status'    => DB_GOOD_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodData[] = [
            'id'            => 9,
            'good_kind_id'  => 57,
            'good_name' => '牛骨头',
            'good_info' => '这是鲜美的牛骨头',
            'status'    => DB_GOOD_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodData[] = [
            'id'            => 10,
            'good_kind_id'  => 57,
            'good_name' => '牛肚',
            'good_info' => '这是鲜美的牛肚',
            'status'    => DB_GOOD_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodData[] = [
            'id'            => 11,
            'good_kind_id'  => 57,
            'good_name' => '牛头肉',
            'good_info' => '这是鲜美的牛头肉',
            'status'    => DB_GOOD_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodData[] = [
            'id'            => 12,
            'good_kind_id'  => 62,
            'good_name' => '圆心大白菜',
            'good_info' => '这是鲜美的圆心大白菜',
            'status'    => DB_GOOD_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodData[] = [
            'id'            => 13,
            'good_kind_id'  => 62,
            'good_name' => '卷心大白菜',
            'good_info' => '这是鲜美的卷心大白菜',
            'status'    => DB_GOOD_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodData[] = [
            'id'            => 14,
            'good_kind_id'  => 62,
            'good_name' => '空心大白菜',
            'good_info' => '这是鲜美的空心大白菜',
            'status'    => DB_GOOD_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodData[] = [
            'id'            => 15,
            'good_kind_id'  => 63,
            'good_name' => '大青菜',
            'good_info' => '这是鲜美的大青菜',
            'status'    => DB_GOOD_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodData[] = [
            'id'            => 16,
            'good_kind_id'  => 63,
            'good_name' => '小青菜',
            'good_info' => '这是鲜美的小青菜',
            'status'    => DB_GOOD_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];

        Good::multiCreate($goodData);
    }
}
