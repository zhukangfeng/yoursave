<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopRank extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'rank_shop_id',
        'rank',
        'rank_info',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
