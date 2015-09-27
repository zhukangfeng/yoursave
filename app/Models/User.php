<?php
namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable;
    use CanResetPassword;
    use SoftDeletion;

    protected $dates = [
        'deleted_at',
        'birthday',
        'remember_token_tim',
        'active_token_time'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'u_name',
        'f_name',
        'l_name',
        'login_mail',
        'email',
        'post_code',
        'address',
        'home_phone',
        'mobile_phone',
        'birthday',
        'sex',
        'currency',
        'language',
        'user_type',
        'shop_user_id',
        'produce_company_user_id',
        'autheriticate_type',
        'receive_collection_message_type',
        'approve_times',
        'remember_token_time',
        'active_token_time',
        'status',
        'public_type',
        'created_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'active_token'
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

}
