<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGiaKH extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'danhgiakh';
    public $timestamps = false;
    protected $fillable = [
        'MaDG', 'MaKH', 'ThoiGian', 'DanhGia', 'MaSach', 'Vote'
    ];
}
