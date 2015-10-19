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
}
