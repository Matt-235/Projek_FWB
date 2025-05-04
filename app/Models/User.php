<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relasi one-to-one ke Dosen
    public function dosen()
    {
        return $this->hasOne(Dosen::class);
    }

    // Relasi one-to-one ke Mahasiswa
    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class);
    }
}
