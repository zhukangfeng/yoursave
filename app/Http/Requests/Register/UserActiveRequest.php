<?php
namespace App\Http\Requests\Register;

// Requests
use App\Http\Requests\Request;

class UserActiveRequest extends Request
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
            'password'  => 'required|min:6',
            'confirm'   => 'same:password'
        ];
    }
}
