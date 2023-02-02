<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'password'              =>  'required|min:6|max:30',
            're_password'           =>  'required|same:password',
            'hash_reset'            =>  'required|exists:customers,hash_reset',
            // 'g-recaptcha-response'  => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'hash_reset.*'            =>  'Liên kết không tồn tại',
            'password.*'              =>  'Mật khẩu phải từ 6 đến 30 ký tự',
            're_password.*'           =>  'Mật khẩu nhập lại không giống',
            'g-recaptcha-response.*'  =>  'Vui lòng phải chọn vào recaptcha'
        ];
    }
}
