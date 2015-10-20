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

    /**
     * 对输入字符串和保存的密码进行对比
     *
     * @param string $password 原始密码
     * @param string $encryptedPassword 加密后的密码
     * @return bool 比对结果
     */
    public static function checkPassword($password, $encryptedPassword)
    {
        return Hash::check($password, $encryptedPassword);
    }

    /**
     * 生成认证辨认码
     *
     * @param string $string
     * @return string
     */
    public static function createToken($string = null)
    {
        return sha1($string . Carbon::now());
    }

}