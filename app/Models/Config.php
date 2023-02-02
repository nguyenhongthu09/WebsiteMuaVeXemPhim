<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $table = 'configs';

    protected $fillable = [
        'bg_homepage',
        'id_phim',
        'phim_2',
        'phim_3',
    ];
}
