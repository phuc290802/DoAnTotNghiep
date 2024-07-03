<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnhNho extends Model
{
    use HasFactory;

    protected $table = 'anhnho'; // Tên bảng


    public $timestamps = false; // Sử dụng timestamps

    protected $fillable = [
        'id',
        'MaSach', 
        'TenFileAnh'
    ];
}
