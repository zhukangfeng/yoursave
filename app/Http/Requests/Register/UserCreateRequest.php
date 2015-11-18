<?php
namespace App\Http\Requests\Register;

use App\Http\Requests\Request;

class UserCreateRequest extends Request
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
        return [
            'username'  => 'required|min:4|unique:users,u_name',
            'lastname'  => 'required',
            'firstname' => 'required',
            'login_mail_addr'   => 'required|email|unique:users,login_mail'
        ];
    }
}
