<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JudulSkripsi extends Model
{
    protected $fillable = [
        'mahasiswa_id', 'judul', 'deskripsi', 'status',
    ];

    // Relasi many-to-one ke Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    // Relasi one-to-many ke Bimbingan
    public function bimbingans()
    {
        return $this->hasMany(Bimbingan::class);
    }
}
