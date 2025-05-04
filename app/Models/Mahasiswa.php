<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
        'user_id', 'nim', 'jurusan',
    ];

    // Relasi many-to-one ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi one-to-many ke JudulSkripsi
    public function judulSkripsis()
    {
        return $this->hasMany(JudulSkripsi::class);
    }
}
