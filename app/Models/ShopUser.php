<?php
namespace App\Models;

// Services
use App;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopUser extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'shop_id',
        'user_id',
        'type',
        'email',
        'position',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'    => 'integer',
        'shop_id'   => 'integer',
        'user_id' => 'integer',
        'type'  => 'integer',
        'email' => 'string',
        'position'  => 'string',
        'status'    => 'integer',
        'created_by'    => 'integer',
        'updated_by'    => 'integer',
        'deleted_by'    => 'integer',
    ];

    /**
     * 加入用户姓名
     *
     * @param \Illuminate\Database\Eloquent\Builder $query <不需要赋值，系统自动复制>
     * @param $tableName users表的别名
     * @param $fullname 全名的名称
     * @param $userIdName user_id的别名
     * @return \Illuminate\Database\Eloquent\Builder $query
     */
    public function scopeWithUserName($query, $tableName = 'users', $fullname = 'fullname', $userIdName = 'user_id')
    {
        $query->join('users', function($join) {
            $join->on('shop_users.user_id', '=', 'users.id')
                ->on('users.deleted_at', ' IS ', DB::raw('NULL'));
        });

        if (App::getLocale() === 'en') {
            return $query->addSelect(
                DB::raw('CONCAT(' . $tableName . '.f_name, " ", ' . $tableName . '.l_name) AS ' . $fullname)
            );
        } else {
            return $query->addSelect(
                DB::raw('CONCAT(' . $tableName . '.l_name, " ", ' . $tableName . '.f_name) AS ' . $fullname)
            );
        }
    }

    /**
     * 加入商店信息
     *
     * @param \Illuminate\Database\Eloquent\Builder $query <不需要赋值，系统自动复制>
     * @param $tableName shops表的别名
     * @param $selectData array compact(['columnName' => 'name', 'asName' => 'shop_name'])
     * @return \Illuminate\Database\Eloquent\Builder $query
     */
    public function scopeWithShop($query,
        $tableName = 'shops',
        $selectData = [['columnName' => 'name', 'asName' => 'shop_name']])
    {
        $data = [];
        foreach ($selectData as $key => $selectDatum) {
            $data[] = $tableName . '.' . $selectDatum['columnName'] . ' AS ' . $selectDatum['asName'];
        }
        return $query->join('shops AS ' . $tableName, 'shop_users.shop_id', '=', 'shops.id')
            ->addSelect(implode(', ', $data));
    }
}