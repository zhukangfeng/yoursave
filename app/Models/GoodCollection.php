<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class GoodCollection extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at', 'collect_time'];

    protected $fillable = [
        'shop_id',
        'good_id',
        'collect_time',
        'collect_info',
        'created_by',
        'deleted_by'
    ];
}
