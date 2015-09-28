<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class LogLogin extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'log_ip',
        'log_http_info',
        'status'
    ];
}
