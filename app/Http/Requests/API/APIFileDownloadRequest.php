<?php
namespace App\Http\Requests\API;

// Requests
use App\Http\Requests\Request;

// Services
use Session;

class APIFileDownloadRequest extends Request
{
    /**
     * 查看是否有下载文件的权限
     *
     * @return bool
     */
    public function authorize()
    {
        $user = Session::get('User');

        return false;
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
