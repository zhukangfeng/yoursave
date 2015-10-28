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

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'    => 'integer',
        'name'  => 'string',
        'address'   => 'string',
        'phone_num' => 'string',
        'post_addr' => 'string',
        'response_email'    => 'string',
        'response_user_id'  => 'integer',
        'corp_info' => 'string',
        'status'    => 'integer',
        'created_by'    => 'integer',
        'updated_by'    => 'integer',
        'deleted_by'    => 'integer',
    ];
 
}
