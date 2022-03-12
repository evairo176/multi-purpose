<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_moving_average extends Model
{
    use HasFactory;
    protected $table = 'tb_moving_average';
    protected $fillable = [
        'bulan', 'pa'
    ];
}
