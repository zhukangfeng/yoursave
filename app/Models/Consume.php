<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class Consume extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at', 'consume_time'];

    protected $fillable = [
        'user_id',
        'good_id',
        'shop_good_id',
        'shop_id',
        'shop_name',
        'consume_name',
        'consume_cost',
        'currency',
        'consume_info',
        'consume_time',
        'place'
    ];
}
