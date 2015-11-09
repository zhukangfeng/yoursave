<?php

// Models
use App\Models\GoodKind;

// Services
use Illuminate\Database\Seeder;

class GoodKindTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('good_kinds')
            ->where('id', '<', DB::raw(70))
            ->delete();

        $goodKindsData = [];

        $goodKindsData[] = [
            'id'        => 1,
            'parent_id' => null,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '食品',
            'kind_info' => '这是食品分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodKindsData[] = [
            'id'        => 2,
            'parent_id' => null,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '日常用品',
            'kind_info' => '这是日常用品分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodKindsData[] = [
            'id'        => 3,
            'parent_id' => null,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '办公用品',
            'kind_info' => '这是办公用品分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodKindsData[] = [
            'id'        => 4,
            'parent_id' => null,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '运动用品',
            'kind_info' => '这是运动用品分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];


        // 食品的子分类
        $goodKindsData[] = [
            'id'        => 51,
            'parent_id' => 1,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '速冻食品',
            'kind_info' => '这是速冻食品分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodKindsData[] = [
            'id'        => 52,
            'parent_id' => 1,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '冷冻食品',
            'kind_info' => '这是冷冻食品分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodKindsData[] = [
            'id'        => 53,
            'parent_id' => 1,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '生鲜食品',
            'kind_info' => '这是生鲜食品分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodKindsData[] = [
            'id'        => 54,
            'parent_id' => 1,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '肉类食品',
            'kind_info' => '这是肉类食品分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodKindsData[] = [
            'id'        => 55,
            'parent_id' => 1,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '蔬菜食品',
            'kind_info' => '这是蔬菜食品分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];

        // 肉类食品的子分类
        $goodKindsData[] = [
            'id'        => 56,
            'parent_id' => 54,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '猪肉',
            'kind_info' => '这是猪肉食品分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodKindsData[] = [
            'id'        => 57,
            'parent_id' => 54,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '牛肉',
            'kind_info' => '这是牛肉食品分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodKindsData[] = [
            'id'        => 58,
            'parent_id' => 54,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '羊肉',
            'kind_info' => '这是羊肉食品分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodKindsData[] = [
            'id'        => 59,
            'parent_id' => 54,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '鱼肉',
            'kind_info' => '这是鱼肉食品分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodKindsData[] = [
            'id'        => 10,
            'parent_id' => 54,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '虾',
            'kind_info' => '这是虾食品分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodKindsData[] = [
            'id'        => 61,
            'parent_id' => 54,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '兔肉',
            'kind_info' => '这是兔肉食品分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];

        // 蔬菜分类的子类
        $goodKindsData[] = [
            'id'        => 62,
            'parent_id' => 55,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '大白菜',
            'kind_info' => '这是大白菜分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodKindsData[] = [
            'id'        => 63,
            'parent_id' => 55,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '青菜',
            'kind_info' => '这是青菜分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodKindsData[] = [
            'id'        => 64,
            'parent_id' => 55,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '青椒',
            'kind_info' => '这是青椒分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodKindsData[] = [
            'id'        => 65,
            'parent_id' => 55,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '萝卜',
            'kind_info' => '这是萝卜分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodKindsData[] = [
            'id'        => 66,
            'parent_id' => 55,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '生菜',
            'kind_info' => '这是生菜分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodKindsData[] = [
            'id'        => 67,
            'parent_id' => 55,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '洋葱',
            'kind_info' => '这是洋葱分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodKindsData[] = [
            'id'        => 68,
            'parent_id' => 55,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '胡萝卜',
            'kind_info' => '这是胡萝卜分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];
        $goodKindsData[] = [
            'id'        => 69,
            'parent_id' => 55,
            'has_children'  => DB_GOOD_KINDS_HAS_CHILDREN_YES,
            'name'      => '韭菜',
            'kind_info' => '这是韭菜分类，下面有可以其他分类',
            'status'    => DB_GOOD_KINDS_STATUS_AUTHENTICATED,
            'created_by'    => 1,
            'updated_by'    => 1,
        ];

        GoodKind::multiCreate($goodKindsData);
    }
}
