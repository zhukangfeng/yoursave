<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class Consume extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at', 'consume_time'];

    protected $fillable = [
        'user_id',
        'good_id',
        'good_name',
        'shop_id',
        'shop_good_id',
        'shop_name',
        'consume_name',
        'consume_cost',
        'currency',
        'consume_info',
        'consume_time',
        'place'
    ];

    /**
     * 检索条件
     *
     * @param $query
     * @param array $data compact('order', 'order_type', 'key', 'name')
     * @return $query
     */
    public function scopeOfCandition($query, $data)
    {
        // 消费名搜索
        if (isset($data['name']) && $data['name'] != '') {
            $query->searchQuery('consumes.consume_name', $data['name']);
        }

        // 关键词搜索
        if (isset($data['key']) && $data['key'] != '') {
            $query->searchQuery([
                'consumes.consume_name',
                'consumes.consume_info'
            ], $data['key']);
        }
        if (isset($data['order']) && is_array($data['order'])) {
            foreach ($data['order'] as $orderKey => $order) {
                $query->orderBy($order, $data['order_type'][$orderKey]);
            }
        }

        return $query;
    }

    /**
     * 添加商店信息
     *
     * @param $query
     * @param string $shopTableName
     * @param array $selectColumns compact(['columnName' => 'name', 'asName' => 'shop_name'])
     * @return $query
     */
    public function scopeWithShop(
        $query,
        $shopTableName = 'shops',
        $selectColumns = [['columnName' => 'name', 'asName' => 'shop_name']]
    ) {
        // 要选择的内容
        $selectValue = [];
        foreach ($selectColumns as $selectKey => $selectData) {
            $selectValue[] = $shopTableName . '.' . $selectData['columnName'] . ' AS ' . $selectData['asName'];
        }

        return $query->leftJoin('shops AS ' . $shopTableName, function ($join) use ($shopTableName) {
            $join->on('consumes.shop_id', '=', $shopTableName . '.id')
                ->on($shopTableName . '.status', '!=', DB_SHOPS_STATUS_INVALID);
        })
            ->addSelect(implode(',', $selectValue));
    }
}
