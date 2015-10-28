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
        'web_addr',
        'shop_info',
        'response_user_id',
        'status',
        'public_type',
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
        'web_addr'  => 'string',
        'shop_info' => 'string',
        'response_user_id'  => 'integer',
        'status'    => 'integer',
        'public_type'   => 'integer',
        'created_by'    => 'integer',
        'updated_by'    => 'integer',
        'deleted_by'    => 'integer',
    ];
}
