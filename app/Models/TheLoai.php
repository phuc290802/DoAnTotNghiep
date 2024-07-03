<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    use HasFactory;

    protected $table = 'theloai';
    public $timestamps = false;

    protected $fillable = [
        'MaTL',
        'TenTL',
    ];
    public function theloainho()
    {
        return $this->hasMany(TheloaiNho::class, 'MaTL', 'MaTL');
    }
}
