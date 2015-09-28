<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRelationGroup extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'name',
        'group_info'
    ];
}
