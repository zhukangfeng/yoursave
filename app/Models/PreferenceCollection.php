<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class PreferenceCollection extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'preference_id',
        'original_price',
        'collection_info',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
