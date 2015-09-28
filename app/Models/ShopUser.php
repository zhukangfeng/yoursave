<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopUser extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'shop_id',
        'type',
        'email',
        'name',
        'position',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
