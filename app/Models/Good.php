<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class Good extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at', 'expirate_time'];

    protected $fillable = [
        'good_kind_id',
        'good_name',
        'produce_company_id',
        'good_info',
        'currency',
        'expirate_time',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
