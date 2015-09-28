<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class ChatGroupUserRelation extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'chat_group_info',
        'chat_group_owner',
        'type',
        'created_by',
        'updated_by',
        'delted_by'
    ];
}
