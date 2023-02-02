<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaiKhoanRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ho_va_ten'     =>  'required|min:5',
            'email'         =>  'required|email|unique:admins,email',
            'password'      =>  'required|min:6|max:30',
        ];
    }
}
