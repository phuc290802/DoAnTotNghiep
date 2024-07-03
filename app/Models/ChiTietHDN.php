<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHDN extends Model
{
    use HasFactory;
    protected $table = 'chitiethdn';
    public $timestamps = false;

    protected $fillable = [
        'SoHDN',
        'MaSach',
        'SoLuongNhap',
        'KhuyenMai',
    ];

    public function sach()
    {
        return $this->belongsTo(Sach::class, 'MaSach', 'MaSach');
    }

    public function hoadonnhap()
    {
        return $this->belongsTo(HoaDonNhap::class, 'SoHDN', 'SoHDN');
    }
}
