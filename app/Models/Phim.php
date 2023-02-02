<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phim extends Model
{
    use HasFactory;

    protected $table ='phims';
    protected $fillable = [
        'ten_phim',
        'slug_ten_phim',
        'dao_dien',
        'dien_vien',
        'the_loai',
        'thoi_luong',
        'ngay_khoi_chieu',
        'avatar',
        'mo_ta',
        'trailer',
        'tinh_trang',
    ];
}
