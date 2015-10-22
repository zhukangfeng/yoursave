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
    use SoftDeletes;

    protected $dates = [
        'deleted_at',
        'remember_token_time',
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
        'password',
        'post_code',
        'address',
        'home_phone',
        'mobile_phone',
        'birthday',
        'sex',
        'currency',
        'language',
        'shop_user_id',
        'produce_company_user_id',
        'autheriticate_type',
        'receive_collection_message_type',
        'approve_times',
        'remember_token_time',
        'active_token',
        'active_token_time',
        'status',
        'public_type',
        'created_ip'
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

    public static function de()
    {
        var_dump(with(new static)->getTable());
    }
}
