<?php
namespace App\Http\Requests\Accounts;

// Models
use App\Models\ShopUser;
use App\Models\ProduceCompanyUser;

// Requests
use App\Http\Requests\Request;

// Services
use Session;

class AccountRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        $user = Session::get('User');

        $isAuthorize = false;
        switch ($this->getMethod()) {
            case 'POST':
                // 商店账户
                $shopUserId = $this->input('shop_user_id');
                $produceCompanyUserId = $this->input('produce_company_user_id');
                if (!is_null($shopUserId)) {
                    // 存在shop user id 则对其认证
                    $shopUser = ShopUser::where('id', $shopUserId)
                        ->where('user_id', $user->id)
                        ->where('status', '!=', DB_PRODUCE_COMPANY_USERS_STATUS_INVALID)
                        ->first();
                    if (!is_null($shopUser)) {
                        $isAuthorize = true;
                    }
                }
                if (!is_null($produceCompanyUserId)) {
                    $produceCompanyUser = ProduceCompanyUser::where('id', $produceCompanyUserId)
                        ->where('user_id', $user->id)
                        ->where('status', '!=', DB_SHOP_USERS_STATUS_INVALID)
                        ->first();
                    if (!is_null($produceCompanyUser)) {
                        $isAuthorize = true;
                    }
                }
                break;
            
            default:
                # code...
                break;
        }
        return $isAuthorize;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
