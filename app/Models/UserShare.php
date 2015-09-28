<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class UserShare extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'preference_id',
        'share_info',
        'type',
        'public_type',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
