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
        'shop_id',
        'consume_name',
        'consume_price',
        'consume_info',
        'currency',
        'consume_time'
    ];
}
