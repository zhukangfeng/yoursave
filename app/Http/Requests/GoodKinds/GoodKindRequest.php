<?php
namespace App\Http\Requests\GoodKinds;

use App\Http\Requests\Request;

/**
 * 商品分类请求
 */
class GoodKindRequest extends Request
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
        $rules = [];
        switch ($this->getMethod()) {
            case 'PUT':
                // no break
            case 'POST':
                $rules = [
                    'has_parent'    => 'required|in:0,1',
                    'parent'        => 'required_if:has_parent,1',
                    'has_children'  => 'required|in:0,1',
                    'name'          => 'required'
                ];
                # code...
                break;
            
            default:
                # code...
                break;
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'has_parent.required'   => trans('error_messages.good_kinds.whether_has_parent'),
            'has_parent.in'         => trans('error_messages.good_kinds.whether_has_parent'),
            'parent.required_if'    => trans('error_messages.good_kinds.need_parent_id'),
            'has_children.required' => trans('error_messages.good_kinds.whether_has_children'),
            'has_children.in'       => trans('error_messages.good_kinds.whether_has_children'),
            'name.required'         => trans('error_messages.good_kinds.need_name')
        ];
    }
}
