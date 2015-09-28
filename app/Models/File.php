<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'shop_id',
        'type',
        'path',
        'save_name',
        'real_name',
        'size',
        'created_by',
        'deleted_by'
    ];
}
