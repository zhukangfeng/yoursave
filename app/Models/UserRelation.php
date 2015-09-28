<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRelation extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'owner_id',
        'friend_user_id',
        'status',
        'user_relation_group_id'
    ];
}
