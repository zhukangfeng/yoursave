<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class ProduceCompany extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'address',
        'phone_num',
        'post_addr',
        'response_email',
        'response_user_id',
        'corp_info',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
