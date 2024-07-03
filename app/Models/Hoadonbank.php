<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoadonbank extends Model
{
    use HasFactory;
    protected $table = 'hoadonbank';
    public $timestamps = false;
    protected $fillable = [
        'SoHDBK', 'MaNV', 'TenKH', 'email', 'DienThoai', 'DiaChi', 'NgayBan', 'TrangThai'
    ];

    public function chitiethdbk()
    {
        return $this->hasMany(Chitiethdbk::class, 'SoHDBK', 'SoHDBK');
    }
}
