<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'                 =>  'required|email|exists:customers,email',
            // 'g-recaptcha-response'  => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'email.email'             =>  'Email không đúng định dạng',
            'email.exists'            =>  'Email không tồn tại trong hệ thống',
            'g-recaptcha-response.*'  =>  'Vui lòng phải chọn vào recaptcha',
        ];
    }
}
