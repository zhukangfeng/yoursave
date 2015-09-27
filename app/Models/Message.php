<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'chat_group_id',
        'send_to',
        'parent_id',
        'content',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
