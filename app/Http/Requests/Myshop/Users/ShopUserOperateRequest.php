<?php
namespace App\Http\Requests\Myshop\Users;

// Models
use App\Models\ShopUser;

// Requests
use App\Http\Requests\Request;

// Services
use Session;

class ShopUserOperateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $shopUser = Session::get('ShopUser');

        switch ($this->getMethod()) {
            case 'PUT':
                // 账户信息修改
                $operateShopUserId = $this->route('users');
                $operateShopUser = ShopUser::find($operateShopUserId);

                $operateUserType = $this->input('type');

                // 账户类型判断
                if (!is_null($operateUserType)) {
                    if (!array_key_exists($operateUserType, trans('database.shop_users.column_value.type'))) {
                        // 账户类型不正确
                        return false;
                    }
                    if ($shopUser->id === $operateShopUser->id) {
                        if ((int)$operateUserType < $shopUser->type) {
                            // 自己的账户只能修改权限小于或等于操作者类型的账户
                            return false;
                        }
                    } else {
                        if ((int)$operateUserType <= $shopUser->type) {
                            // 别人的账户只能修改权限小于操作者类型的账户
                            return false;
                        }
                    }
                }

                break;
            case 'POST':
                // 新建账户
                $operateUserType = $this->input('type');
                
                // 账户类型判断
                if (!is_null($operateUserType)) {
                    if (!array_key_exists($operateUserType, trans('database.shop_users.column_value.type'))) {
                        return false;
                    }

                    if ((int)$operateUserType < $shopUser->type) {
                        // 自己的账户只能修改权限小于或等于操作者类型的账户
                        return false;
                    }
                }
                break;
            case 'DELETE':
                // 删除帐户
                if ($shopUser->type !== DB_SHOP_USERS_TYPE_ADMIN) {
                    // 删除帐户只能是管理员账户
                    return false;
                }
            default:
                # code...
                break;
        }

        // 如果有账户状态信息
        $operateShopUserStatus = $this->input('status');
        if (!is_null($operateShopUserStatus)) {
            if (!array_key_exists($operateShopUserStatus, trans('database.shop_users.column_value.status'))) {
                // 账户有效状态
                return false;
            }                    
        }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->getMethod()) {
            case 'POST':
                $rules = [
                    'login_mails' => 'required',
                    'type'  => 'required'
                ];
                break;
            case 'PUT':
                $rules = [
                    'type'  => 'required',
                    'email' => 'sometimes|email',
                    'status'    => 'required'
                ];
                break;
            default:
                $rules = [];
                break;
        }

        return $rules;
    }
}
