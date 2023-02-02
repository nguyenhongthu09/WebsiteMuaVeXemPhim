<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLichChieuRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_phong'                  =>  'required|exists:phongs,id',
            'id_phim'                   =>  'required|exists:phims,id',
            'thoi_gian_chieu_chinh'     =>  'required|numeric|min:0',
            'thoi_gian_quang_cao'       =>  'required|numeric|min:0',
            'ngay_bat_dau'              =>  'required|date',
            'ngay_ket_thuc'             =>  'required|date|after_or_equal:ngay_bat_dau',
            'gio_bat_dau'               =>  'required',
            'gio_ket_thuc'              =>  'required',
        ];
    }
}
