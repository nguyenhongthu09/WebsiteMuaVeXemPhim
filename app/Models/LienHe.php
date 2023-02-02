<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LienHe extends Model
{
    use HasFactory;

    protected $table = 'lien_hes';

    protected $fillable = [
        'ho_va_ten',
        'email',
        'tieu_de',
        'noi_dung',
        'is_xu_ly',
    ];
}
