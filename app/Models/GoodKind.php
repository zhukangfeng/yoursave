<?php
namespace App\Models;

// Services
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoodKind extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'parent_id',    // 父分类名称
        'can_has_children', // 能否含有子分类
        'name',         // 商品分类名
        'kind_info',    // 分类信息
        'status',       // 分类信息状态：0:无效；1:认证；2:未认证（一般用户创建）；
                        // 3:未认证（商店职员创建）；4：未认证（生产厂家创建）
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    /**
     * 加上父亲分类
     *
     * @param $query
     * @param $parentTableName 父亲分类表的别名
     * @param array selectColumns [['columnName' => 'name', 'asName' => 'parent_name']]
     * @return $query
     */
    public function scopeWithParent($query,
        $parentTableName = 'parent_good_kinds',
        $selectColumns = [['columnName' => 'name', 'asName' => 'parent_name']]
    ) {

        $selectValue = [];
        foreach ($selectColumns as $key => $selectColumn) {
            isset($selectColumn['asName'])
                ? $asName = $selectColumn['asName']
                : $asName = $selectColumn['columnName'];
            $selectValue[] = $parentTableName . '.' . $selectColumn['columnName'] . ' AS ' . $asName;
        }

        $query->leftJoin('good_kinds AS ' . $parentTableName, function ($join) use ($parentTableName) {
            $join->on('good_kinds.parent_id', '=', $parentTableName . '.id')
                ->on($parentTableName . '.deleted_at', 'IS', DB::raw('NULL'));
        })
            ->addSelect(implode(',', $selectValue));

        return $query;
    }

    /**
     * 获取子分类
     *
     * @param $status default null 分类状态
     * @return array compact(GoodKind);
     */
    public function children($status = null)
    {
        $query = GoodKind::where('parent_id', $this->id);

        if (!is_null($status)) {
            $query->where('status', $status);
        }

        return $query->select('good_kinds.*')->get();
    }
}
