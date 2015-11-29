<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopGood extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'shop_id',
        'good_id',
        'produce_company_id',
        'cost',
        'price',
        'currency',
        'good_info',
        'status',
        'public_type',
        'created_by',
        'updated_by',
        'deleted_by',
    ];


    /**
     * 商店搜索条件
     *
     * @param @query
     * @param array $data compct('key', 'name', 'status')
     * @param array $sort [['column_name' => 'shop_goods.updated_at', 'sort_type' => 'DESC']]
     * @param array $selectColumns [['columnName' => 'name', 'asName' => 'good_kind_name']]
     * @return $query
     */
    public function scopeOfCandition(
        $query,
        $data,
        $sort = [['column_name' => 'shop_goods.updated_at', 'sort_type' => 'DESC']],
        $selectColumns = [['columnName' => 'name', 'asName' => 'good_kind_name']]
    ) {
        $goodTableName = 'goods_' . __LINE__;
        $query->join('goods AS ' . $goodTableName, 'shop_goods.good_id', '=', $goodTableName . '.id');
        // 关键词
        if (isset($data['key']) && $data['key'] != '') {
            $query->searchQuery([
                'shop_goods.good_info',
                $goodTableName . '.good_name',
            ], $data['key']);
        }
        // 商店商品姓名
        if (isset($data['name']) && $data['name'] != '') {
            $query->searchQuery($goodTableName . '.name', $data['name']);
        }
        // 商店商品状态
        if (isset($data['status']) && $data['status'] != '') {
            $query->where('shop_goods.status', $data['status']);
        }
        // 商店名
        if (isset($data['shop_name']) && $data['shop_name'] != '') {
            $shopTableName = 'shops_' . __LINE__;
            $query->join('shops AS ' . $shopTableName, 'shop_goods.shop_id', '=', $shopTableName . '.id')
                ->searchQuery($shopTableName . '.name', $data['shop_name']);
        }
        // 生产厂家
        if (isset($data['produce_company_name']) && $data['produce_company_name'] != '') {
            $produceCompanyTable = 'produce_companies_' . __LINE__;
            $query->join('produce_companies AS ' . $produceCompanyTable, 'shop_goods.produce_company_id', '=', $produceCompanyTable . '.id')
                ->searchQuery($produceCompanyTable . '.name', $data['produce_company_name']);
        }

        foreach ($sort as $sortKey => $sortValue) {
            $query->orderBy($sortValue['column_name'], $sortValue['sort_type']);
        }

        return $query;
    }

    /**
     * 加入商店信息
     *
     * @param \Illuminate\Database\Eloquent\Builder $query <不需要赋值，系统自动复制>
     * @param $tableName shops表的别名
     * @param $selectData array compact(['columnName' => 'name', 'asName' => 'shop_name'])
     * @return \Illuminate\Database\Eloquent\Builder $query
     */
    public function scopeWithShop(
        $query,
        $tableName = 'shops',
        $selectData = [['columnName' => 'name', 'asName' => 'shop_name']]
    ) {
        $data = [];
        foreach ($selectData as $key => $selectDatum) {
            $data[] = $tableName . '.' . $selectDatum['columnName'] . ' AS ' . $selectDatum['asName'];
        }
        return $query->join('shops AS ' . $tableName, 'shop_goods.shop_id', '=', 'shops.id')
            ->addSelect(implode(', ', $data));
    }

    /**
     * 加入生产厂家信息
     *
     * @param \Illuminate\Database\Eloquent\Builder $query <不需要赋值，系统自动复制>
     * @param $tableName shops表的别名
     * @param $selectData array compact(['columnName' => 'name', 'asName' => 'shop_name'])
     * @return \Illuminate\Database\Eloquent\Builder $query
     */
    public function scopeWithProduceCompany(
        $query,
        $tableName = 'produce_companies',
        $selectData = [['columnName' => 'name', 'asName' => 'produce_company_name']]
    ) {
        $data = [];
        foreach ($selectData as $key => $selectDatum) {
            $data[] = $tableName . '.' . $selectDatum['columnName'] . ' AS ' . $selectDatum['asName'];
        }
        return $query->join('produce_companies AS ' . $tableName, 'shop_goods.produce_company_id', '=', 'produce_companies.id')
            ->addSelect(implode(', ', $data));
    }

    /**
     * 加入商品信息
     *
     * @param \Illuminate\Database\Eloquent\Builder $query <不需要赋值，系统自动复制>
     * @param $tableName shops表的别名
     * @param $selectData array compact(['columnName' => 'name', 'asName' => 'shop_name'])
     * @return \Illuminate\Database\Eloquent\Builder $query
     */
    public function scopeWithGood(
        $query,
        $tableName = 'goods',
        $selectData = [['columnName' => 'good_name', 'asName' => 'good_name']]
    ) {
        $data = [];
        foreach ($selectData as $key => $selectDatum) {
            $data[] = $tableName . '.' . $selectDatum['columnName'] . ' AS ' . $selectDatum['asName'];
        }
        return $query->join('goods AS ' . $tableName, 'shop_goods.good_id', '=', 'goods.id')
            ->addSelect(implode(', ', $data));
    }
}
