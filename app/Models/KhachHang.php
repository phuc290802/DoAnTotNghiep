<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class KhachHang extends Model implements Authenticatable
{
    use Notifiable;

    protected $table = 'KhachHang';
    public $timestamps = false;

    protected $fillable = [
        'MaKH',
        'TenKH',
        'UserName',
        'GioiTinh',
        'DiaChi',
        'DienThoai',
        'AnhDaiDien',
        'password',
    ];
    public function messages()
    {
        return $this->hasMany(Message::class, 'MaKH', 'MaKH');
    }
    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'MaKH';
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
        return 'password';// Replace 'password' with the actual column name in your database table
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
