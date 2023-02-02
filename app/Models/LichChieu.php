<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichChieu extends Model
{
    use HasFactory;

    protected $table = 'lich_chieus';

    protected $fillable = [
        'id_phong',
        'id_phim',
        'thoi_gian_chieu_chinh',
        'thoi_gian_quang_cao',
        'thoi_gian_bat_dau',
        'thoi_gian_ket_thuc',
    ];
}
