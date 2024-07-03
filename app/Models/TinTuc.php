<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    use HasFactory;
    protected $table = 'tintuc';
    public $timestamps = false;
    // Các thuộc tính có thể điền vào
    protected $fillable = [
        'id',
        'MaNV',
        'AnhDaiDien',
        'ThoiGian',
        'TieuDe',
        'NoiDung',
    ];
}
