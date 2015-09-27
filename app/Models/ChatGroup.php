<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * 讨论组（群组）分析信息表
 *
 */
class ChatGroup extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'chat_group_id',
        'type',
        'user_id',
        'invited_by',
        'created_by',
        'delted_by'
    ];
}
