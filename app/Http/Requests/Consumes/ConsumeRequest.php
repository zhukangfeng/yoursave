<?php
namespace App\Http\Requests\Consumes;

// Models
use App\Models\Consume;

// Requests
use App\Http\Requests\Request;

// Services
use Session;

class ConsumeRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $consumeId = $this->route('consumeId');
        if ($consumeId) {
            $consume = Consume::where('user_id', Session::get('User')->id)
                ->where('id', $consumeId)
                ->first();
            if (is_null($consume)) {
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
        $method = $this->getMethod();

        if ($method !== 'PUT' && $method !== 'POST') {
            return [];
        }

        return [
            'consume_name'  => 'required',
            'consume_time'  => 'required|date',
            'consume_cost'  => 'sometimes|numeric|min:0',
            'good_id'   => 'sometimes|exists:goods,id',
            'shop_id'   => 'sometimes|exists:shops,id'
        ];
    }

    public function messages()
    {
        return [
            'good_id.exists'    => trans('error_messages.consumes.good_id_error'),
            'shop_id.exists'    => trans('error_messages.consumes.shop_id_error')
        ];
    }
}
