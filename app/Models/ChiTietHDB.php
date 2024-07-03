<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHDB extends Model
{
    use HasFactory;

    protected $table = 'chitiethdb';
    public $timestamps = false;

    protected $fillable = [
        'SoHDB',
        'MaSach',
        'SoLuongBan',
        'KhuyenMai',
        'TenSach',
        'GiaBan',
        'AnhDaiDien',
    ];

    public function sach()
    {
        return $this->belongsTo(Sach::class, 'MaSach', 'MaSach');
    }

    public function hoadonban()
    {
        return $this->belongsTo(HoaDonBan::class, 'SoHDB', 'SoHDB');
    }
}
