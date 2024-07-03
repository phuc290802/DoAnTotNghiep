<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonNhap extends Model
{
    use HasFactory;
    protected $table = 'hoadonnhap';
    public $timestamps = false;
    protected $fillable = [
        'SoHDN', 'MaNV', 'MaNXB', 'NgayNhap',
    ];
    public function chitiethdn()
    {
        return $this->hasMany(ChiTietHDB::class, 'SoHDN', 'SoHDN');
    }
}
