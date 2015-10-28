<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class ProduceCompanyUser extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'produce_company_id',
        'user_id',
        'type',
        'email',
        'name',
        'position',
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
        'produce_company_id'    => 'integer',
        'user_id'   => 'integer',
        'type'  => 'integer',
        'email' => 'string',
        'name'  => 'string',
        'position'  => 'string',
        'status'    => 'integer',
        'created_by'    => 'integer',
        'updated_by'    => 'integer',
        'deleted_by'    => 'integer',
    ];
}
