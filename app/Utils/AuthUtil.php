<?php
namespace App\Utils;

// Models
use App\Models\User;

// Services
use Carbon\Carbon;
use Hash;

/**
* 用户权限相关类
*/
class AuthUtil
{
    /**
     * 对用户密码进行加密
     *
     * @param string $password 原始密码字符串
     * @return string $encryptedPassword 加密后的密码字符串
     */
    public static function encryptPassword($password)
    {
        return bcrypt($password);
    }

    public static function checkPassword($password, $encryptedPassword)
    {
        return Hash::check($password, $encryptedPassword);
    }
}