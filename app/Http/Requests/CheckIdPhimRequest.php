<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckIdPhimRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id'    =>  'required|exists:phims,id',
        ];
    }

    public function messages()
    {
        return [
            'id.*'  => 'Phim phải tồn tại trong hệ thống!',
        ];
    }
}
