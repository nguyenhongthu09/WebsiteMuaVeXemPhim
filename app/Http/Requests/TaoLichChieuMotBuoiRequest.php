<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class TaoLichChieuMotBuoiRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $now = Carbon::today();
        return [
            'id_phong'                  =>  'required|exists:phongs,id',
            'id_phim'                   =>  'required|exists:phims,id',
            'thoi_gian_chieu_chinh'     =>  'required|numeric|min:0',
            'thoi_gian_quang_cao'       =>  'required|numeric|min:0',
            'ngay_chieu'                =>  'required|date|after_or_equal:'. $now,
            'ngay_ket_thuc'             =>  'nullable|date|after_or_equal:ngay_bat_dau',
            'gio_bat_dau'               =>  'required',
            'gio_ket_thuc'              =>  'required',
        ];
    }
    public function messages()
    {
        return [
            'id_phong.*'                 => 'Phòng không được để trống!',
            'id_phim.*'                  => 'Phòng không được để trống',
            'thoi_gian_chieu_chinh.*'    => 'Thời gian chiếu chính không được để trống',
            'thoi_gian_quang_cao.*'      => 'Thời lượng quảng cáo không được để trống!',
            'ngay_chieu.*'               => 'Ngày chiếu phim phải lớn hơn hoặc bằng ngày hôm nay!',
            'ngay_ket_thuc.*'            => 'Ngày kết thúc không được để trống!',
            'gio_bat_dau.*'              => 'Giờ bắt đầu không được để trống!',
            'gio_ket_thuc.*'             => 'Giờ kết thúc không được để trống!',

        ];
    }

}
