<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'address',
        'phone_num',
        'contact_mail',
        'web_addr',
        'shop_info',
        'response_user_id',
        'status',
        'public_type',
        'currency',
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
        'name'  => 'string',
        'address'   => 'string',
        'phone_num' => 'string',
        'contact_mail'  => 'string',
        'web_addr'  => 'string',
        'shop_info' => 'string',
        'response_user_id'  => 'integer',
        'status'    => 'integer',
        'public_type'   => 'integer',
        'currency'      => 'integer',
        'created_by'    => 'integer',
        'updated_by'    => 'integer',
        'deleted_by'    => 'integer',
    ];

    /**
     * 商店搜索条件
     *
     * @param @query
     * @param array $data compct('key', 'name', 'status')
     * @return $query
     */
    public function scopeOfCandition($query, $data)
    {
        // 关键词
        if (isset($data['key']) && $data['key'] != '') {
            $query->searchQuery([
                'shops.name',
                'shops.shop_info'
            ], $data['key']);
        }
        // 商店姓名
        if (isset($data['name']) && $data['name'] != '') {
            $query->searchQuery('shops.name', $data['name']);
        }
        // 商店状态
        if (isset($data['status']) && $data['status'] != '') {
            $query->where('shops.status', $data['status']);
        }

        return $query;
    }
}
