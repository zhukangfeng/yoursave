<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class MessageRemindUserRelation extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'message_id',
        'remind_user_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
