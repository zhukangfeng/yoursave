<?php
namespace App\Models;

// Services
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Good extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'good_kind_id',
        'good_name',
        'good_info',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    /**
     * 加入商品种类信息
     *
     * @param $query
     * @param $selectValue compact(['columnName' => 'name', 'asName' => 'good_kind_name'])
     * @return $query
     */
    public function scopeWithGoodKind(
        $query,
        $parentTableName = 'good_kinds',
        $selectColumns = [['columnName' => 'name', 'asName' => 'good_kind_name']]
    ) {

        $selectValue = [];
        foreach ($selectColumns as $key => $selectColumn) {
            isset($selectColumn['asName'])
                ? $asName = $selectColumn['asName']
                : $asName = $selectColumn['columnName'];
            $selectValue[] = $parentTableName . '.' . $selectColumn['columnName'] . ' AS ' . $asName;
        }
        return $query->leftJoin('good_kinds', function ($join) use ($parentTableName) {
            $join->on('goods.good_kind_id', '=', $parentTableName . '.id')
                ->on($parentTableName . '.deleted_at', 'IS', DB::raw('NULL'));
        })
            ->addSelect(implode(',', $selectValue));
    }
}
