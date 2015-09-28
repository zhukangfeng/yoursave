<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRank extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'rank_user_id',
        'rank',
        'rank_info',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
