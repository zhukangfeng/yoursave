<?php
namespace App\Models;

// Services
use Illuminate\Database\Eloquent\SoftDeletes;

class FileRelation extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'file_id',
        'relation_table_name',
        'relation_table_id',
        'file_type',
        'comment',
        'created_by',
        'deleted_by'
    ];
}
