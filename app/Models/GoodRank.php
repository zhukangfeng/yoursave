<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class GoodRank extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'good_id',
        'rank',
        'rank_info',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
