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
        'popularity',
        'user_keep_num',
        'status',
        'response_user_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
