<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'ho_va_ten',
        'email',
        'password',
        'so_dien_thoai',
        'dia_chi',
        'hash_mail',
        'gioi_tinh',
        'loai_tai_khoan',
        'ngay_sinh',
        'hash_reset'
    ];
}
