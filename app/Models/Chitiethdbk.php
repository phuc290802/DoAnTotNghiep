<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chitiethdbk extends Model
{
    use HasFactory;
    protected $table = 'chitiethdbk';
    public $timestamps = false;
    protected $fillable = [
        'SoHDBK', 'MaSach', 'SoLuongBan', 'TenSach', 'AnhDaiDien', 'GiaBan'
    ];
    public function sach()
    {
        return $this->belongsTo(Sach::class, 'MaSach', 'MaSach');
    }
    public function hoadonbank()
    {
        return $this->belongsTo(Hoadonbank::class, 'SoHDBK', 'SoHDBK');
    }
}
