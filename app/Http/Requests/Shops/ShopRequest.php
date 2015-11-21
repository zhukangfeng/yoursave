<?php
namespace App\Http\Requests\Shops;

// Models
use App\Models\Shop;

// Requests
use App\Http\Requests\Request;

// Services
use Session;

class ShopRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $method = $this->getMethod();
        $isAuthorize = false;
        switch ($method) {
            case 'GET':
                $isAuthorize = true;
                break;
            case 'POST':
                $isAuthorize = true;
                break;
            case 'PUT':
                $shopUser = Session::get('ShopUser');
                if ($shopUser->type === DB_SHOP_USERS_TYPE_ADMIN) {
                    $isAuthorize = true;
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
        $method = $this->getMethod();
        if ($method !== 'PUT' && $method !== 'POST') {
            return [];
        }

        $publicTypes = array_keys(trans('database.common.column_value.public_type'));
        $currencies = array_keys(trans('database.common.column_value.currency'));
        return [
            'name'  => 'required',
            'contact_mail'  => 'sometimes|email',
            'web_addr'      => 'sometimes|url',
            'public_type'   => 'required|in:' . implode(',', $publicTypes),
            'currency'      => 'sometimes|in:' . implode(',', $currencies)
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validation.required', ['attribute' => trans('database.shops.name')])
        ];
    }
}
