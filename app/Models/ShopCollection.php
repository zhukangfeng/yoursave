
<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopCollection extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'shop_id',
        'collection_info',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
