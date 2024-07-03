<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonBan extends Model
{
    use HasFactory;
    protected $table = 'hoadonban';
    public $timestamps = false;
    protected $fillable = [
        'SoHDB', 'MaNV', 'MaKH', 'NgayBan','TrangThai',
    ];

    public function chitiethdb()
    {
        return $this->hasMany(ChiTietHDB::class, 'SoHDB', 'SoHDB');
    }
}
