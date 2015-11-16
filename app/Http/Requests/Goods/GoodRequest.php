<?php
namespace App\Http\Requests\Goods;

// Models
use App\Models\Good;

// Requests
use App\Http\Requests\Request;

// Services
use Session;

class GoodRequest extends Request
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
            'good_kind' => 'required|exists:good_kinds,id',
            'good_name' => 'required'
        ];
    }

    /**
     * 错误信息
     *
     * @return array
     */
    public function messages()
    {
        return [
            'good_kind.exists'  => trans('error_messages.goods.no_good_kind')
        ];
    }
}
