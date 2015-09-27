<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class Preference extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at', 'begin_time', 'end_time'];

    protected $fillable = [
        'good_id',
        'shop_id',
        'original_price',
        'discount_price',
        'collect_times',
        'figure',
        'begin_time',
        'end_time',
        'is_public',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
