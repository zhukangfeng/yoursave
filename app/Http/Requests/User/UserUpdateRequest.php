<?php
namespace App\Http\Requests\User;

// Requests
use App\Http\Requests\Request;

// Services
use Session;

class UserUpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = Session::get('User');

        return [
            'username'  => 'required|unique:users,u_name,' . $user->id . ',id|max:255',
            'firstname' => 'required|max:255',
            'lastname'  => 'required|max:255',
            'login_mail_addr'  => 'required|email|unique:users,login_mail,' . $user->id . ',id',
            'contact_email'    => 'sometimes|email',
            'post_code' => 'string',
            'address'   => 'string',
            'home_phone'    => 'string',
            'mobile_phone'  => 'string',
            'birthday'  => 'string',
            'sex'       => 'in:' . implode(',', array_keys(trans('database.users.column_value.sex'))),
            'language'  => 'in:' . implode(',', array_keys(trans('database.users.column_value.language'))),
            'currency'  => 'in:' . implode(',', array_keys(trans('database.common.column_value.currency'))),
        ];
    }
}
