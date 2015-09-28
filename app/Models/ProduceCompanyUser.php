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
        'status',
        'type',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
