<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class PreferenceComment extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'preference_id',
        'user_id',
        'parent_id',
        'comment_info',
        'is_public'
    ];
}
