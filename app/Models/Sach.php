<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    use HasFactory;
    protected $table = 'sach';
    public $timestamps = false;
    protected $fillable = [
        'TenSach',
        'MaTL',
        'MaTLCon',
        'MaNXB',
        'MaTG',
        'GiaNhap',
        'GiaBan',
        'SoTrang',
        'TrongLuong',
        'AnhDaiDien',
        'SoLuong',
        'MoTa',
        'NamXB',
        'SachMoi',
        'SachTBo',
    ];

    protected static function booted()
    {
        static::creating(function ($sach) {
            $latestSach = Sach::orderBy('MaSach', 'desc')->first();
            if ($latestSach) {
                $lastId = intval(substr($latestSach->MaSach, 1));
                $nextId = $lastId + 1;
                $sach->MaSach = 'S' . str_pad($nextId, 2, '0', STR_PAD_LEFT);
            } else {
                $sach->MaSach = 'S01';
            }
            session(['newMaSach' => $sach->MaSach]);
        });
    }
    public function theLoai()
    {
        return $this->belongsTo(TheLoai::class, 'MaTL', 'MaTL');
    }
    public function nhaxuatban()
    {
        return $this->belongsTo(NhaXuatBan::class, 'MaNXB', 'MaNXB');
    }
    public function theloainho()
    {
        return $this->belongsTo(TheloaiNho::class, 'MaTLCon', 'MaTLCon');
    }
}
