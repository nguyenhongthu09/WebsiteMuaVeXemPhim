<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GheBan extends Model
{
    use HasFactory;

    protected $table = 'ghe_bans';

    protected $fillable = [
        'ten_ghe',
        'id_lich',
        'co_the_ban',
        'ma_giao_dich',
        'id_khach_hang',
        'trang_thai',
        'id_bill_ngan_hang'
    ];
}
