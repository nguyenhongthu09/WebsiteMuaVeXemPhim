<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ghe extends Model
{
    use HasFactory;

    protected $table = 'ghes';

    protected $fillable = [
        'ten_ghe',
        'tinh_trang',
        'id_phong',
    ];
}
