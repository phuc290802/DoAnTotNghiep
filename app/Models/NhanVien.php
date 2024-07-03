<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model implements Authenticatable
{
    use HasFactory;
    protected $table = 'nhanvien';
    public $timestamps = false;
    protected $fillable = [
        'MaNV',
        'TenNV',
        'UserName',
        'GioiTinh',
        'DiaChi',
        'DienThoai',
        'NgaySinh',
        'AnhDaiDien',
        'password',
    ];
   /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'MaKH';
    }
    public function isAdmin()
    {
        // Logic to determine if the user is an admin
        return $this->role === 'admin';
    }
    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }
    public function getAuthPasswordName()
    {
        return 'password'; // Replace 'password' with the actual column name in your database table
    }
    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return null;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        // Do nothing, as remember token is not used
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        // Do nothing, as remember token is not used
    }
}
