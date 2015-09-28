<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class UserShareComment extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_share_id',
        'parent_id',
        'comment_info',
        'is_public',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
