<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAccountRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ho_va_ten'             =>  'required|min:6|max:50',
            'email'                 =>  'required|email|unique:customers,email',
            'password'              =>  'required|min:6|max:30',
            're_password'           =>  'required|same:password',
            'so_dien_thoai'         =>  'required|digits:10',
            'dia_chi'               =>  'required|min:6|max:50',
            'gioi_tinh'             =>  'required|numeric|min:0|max:1',
            'ngay_sinh'             =>  'required|date',
            // 'g-recaptcha-response'  => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'ho_va_ten.*'             =>  'Họ và tên phải từ 6 đến 50 ký tự',
            'email.email'             =>  'Email không đúng định dạng',
            'email.unique'            =>  'Email đã tồn tại',
            'password.*'              =>  'Mật khẩu phải từ 6 đến 30 ký tự',
            're_password.*'           =>  'Mật khẩu nhập lại không giống',
            'so_dien_thoai.*'         =>  'Số điện thoại phải 10 chữ số',
            'dia_chi.*'               =>  'Họ và tên phải từ 6 đến 50 ký tự',
            'gioi_tinh.*'             =>  'Giới tính phải chọn theo yêu cầu',
            'ngay_sinh.*'             =>  'Ngày sinh không đúng định dạng',
            'g-recaptcha-response.*'  =>  'Vui lòng phải chọn vào recaptcha'
        ];
    }
}
