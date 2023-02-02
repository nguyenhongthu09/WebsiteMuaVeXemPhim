<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuanLyBaiViet extends Model
{
    use HasFactory;

    protected $table = 'quan_ly_bai_viets';

    protected $fillable = [
        'tieu_de',
        'mo_ta_ngan',
        'noi_dung',
        'hinh_anh',
        'is_open',
    ];
}
