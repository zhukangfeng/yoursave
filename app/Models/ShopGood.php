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
}
