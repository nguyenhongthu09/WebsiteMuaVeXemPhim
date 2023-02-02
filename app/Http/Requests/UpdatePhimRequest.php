<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePhimRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id'                => 'required|exists:phims,id',
            'ten_phim'          => 'required',
            'slug_ten_phim'     => 'required|unique:phims,slug_ten_phim,' . $this->id,
            'dao_dien'          => 'required',
            'ngay_khoi_chieu'   => 'required|date',
            'dien_vien'         => 'required',
            'the_loai'          => 'required',
            'thoi_luong'        => 'required|numeric|min:5',
            'mo_ta'             => 'required|min:20',
            'avatar'            => 'required',
            'trailer'           => 'required',
            'tinh_trang'        => 'required|numeric|max:2|min:0',
        ];
    }

    public function messages()
    {
        return [
            'id.*'                      => 'Phim phải tồn tại trong hệ thống!',
            'ten_phim.*'                => 'Tên phim không được để trống',
            'slug_ten_phim.required'    => 'Slug không được để trống',
            'slug_ten_phim.unique'      => 'Slug đã tồn tại!',
            'dao_dien.*'                => 'Đạo diễn không được để trống',
            'ngay_khoi_chieu.*'         => 'Ngày khởi chiếu phải là định dạng ngày tháng',
            'dien_vien.*'               => 'Diễn viên không được để trống',
            'the_loai.*'                => 'Thể loại không được để trống',
            'thoi_luong.*'              => 'Thời lượng phải từ 5p trở lên',
            'mo_ta.*'                   => 'Mô tả phải từ 20 đến 200 ký tự',
            'avatar.*'                  => 'Avatar không được để trống',
            'trailer.*'                 => 'Trailler không được để trống',
            'tinh_trang.*'              => 'Tình trạng phải chọn theo yêu cầu',
        ];
    }
}
