<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class GoodKind extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'parent_id',
        'name',
        'kind_info',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
