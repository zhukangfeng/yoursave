<?php
namespace App\Models;

// Services
use App;
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
        'contact_email',
        'password',
        'post_code',
        'address',
        'home_phone',
        'mobile_phone',
        'birthday',
        'sex',
        'currency',
        'language',
        'autheriticate_type',
        'receive_collection_message_type',
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'    => 'integer',
        'u_nuam'    => 'string',
        'f_name'    => 'string',
        'l_name'    => 'string',
        'login_mail'    => 'string',
        'contact_email' => 'string',
        'password'  => 'string',
        'post_code' => 'string',
        'address'   => 'string',
        'home_phone'    => 'string',
        'mobile_phone'  => 'string',
        // 'birthday'  => 'date',
        'sex'       => 'integer',
        'currency'  => 'integer',
        'language'  => 'string',
        'autheriticate_type'    => 'integer',
        'receive_collection_message_type'   => 'integer',
        'remember_token_time'   => 'string',
        'active_token'  => 'string',
        'active_token_time' => 'datetime',
        'status'    => 'integer',
        'public_type'   => 'integer',
        'created_ip'    => 'string'
    ];

    public static function de()
    {
        var_dump(with(new static)->getTable());
    }

    public function getFullName()
    {
        if (App::getLocale() === 'en') {
            return $this->f_name . ' ' . $this->l_name;
        } else {
            return $this->l_name . ' ' . $this->f_name;
        }
    }

    /**
     * 获得全名
     *
     * @param \Illuminate\Database\Eloquent\Builder $query <不需要赋值，系统自动复制>
     * @param string $createdBy 数据列名称 <可选>
     * @param string $tableName join后创建者数据表名称 <可选>
     * @param string $fullname 全名的名称 <可选>
     * @return \Illuminate\Database\Eloquent\Builder $query
     *
     * @author zhukangfeng
     */
    public function scopeWithFullName($query, $tableName = 'users', $tableName = 'users', $fullname = 'fullname')
    {
        if (App::getLocale() === 'en') {
            return $query->addSelect(
                DB::raw('CONCAT(' . $tableName . '.f_name, " ", ' . $tableName . '.l_name) AS ' . $fullname)
            );
        } else {
            return $query->addSelect(
                DB::raw('CONCAT(' . $tableName . '.l_name, " ", ' . $tableName . '.f_name) AS ' . $fullname)
            );
        }

    }

}
