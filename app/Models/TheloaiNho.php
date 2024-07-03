<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheloaiNho extends Model
{
    use HasFactory;

    protected $table = 'theloainho';
    public $timestamps = false; 
    protected $fillable = [
        'id',
        'MaTLCon',
        'MaTL',
        'TenTL',
    ];

    // Define relationship with main category
    public function theloai()
    {
        return $this->belongsTo(TheLoai::class, 'MaTL', 'MaTL');
    }

    // Define relationship with books
    public function books()
    {
        return $this->hasMany(Sach::class, 'MaTLCon', 'MaTLCon');
    }
}
