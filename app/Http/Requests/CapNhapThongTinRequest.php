<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CapNhapThongTinRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'id'                    =>  'required|exists:customers,id',
            'ho_va_ten'             =>  'required|min:6|max:50',
            'email'                 =>  'required|email|unique:customers,email,' . $this->id,
            'so_dien_thoai'         =>  'required|digits:10',
            'dia_chi'               =>  'required|min:6|max:50',
            'gioi_tinh'             =>  'required|numeric|min:0|max:1',
            'ngay_sinh'             =>  'required|date',
        ];
    }

    public function messages()
    {
        return [
            'ho_va_ten.*'             =>  'Họ và tên phải từ 6 đến 50 ký tự',
            'email.email'             =>  'Email không đúng định dạng',
            'email.unique'            =>  'Email đã tồn tại',
            'so_dien_thoai.*'         =>  'Số điện thoại phải 10 chữ số',
            'dia_chi.*'               =>  'Họ và tên phải từ 6 đến 50 ký tự',
            'gioi_tinh.*'             =>  'Giới tính phải chọn theo yêu cầu',
            'ngay_sinh.*'             =>  'Ngày sinh không đúng định dạng',
        ];
    }
}
