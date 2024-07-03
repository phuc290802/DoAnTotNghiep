<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';
    public $timestamps = false;
    protected $fillable = [
        'MaNV',
        'MaKH',
        'message',
        'thoigiannhan',
        'check',
        'ThongBao',
        'emoji',

    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'MaNV');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'MaKh');
    }
}
