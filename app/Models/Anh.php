<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anh extends Model
{
    protected $table = 'anh';

    protected $primaryKey = 'TenFileAnh';

    public $incrementing = false;

    protected $fillable = [
        'TenFileAnh',
        'MaSach',
    ];

    public function sach()
    {
        return $this->belongsTo(Sach::class, 'MaSach', 'MaSach');
    }
}
