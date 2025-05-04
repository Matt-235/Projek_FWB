<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bimbingan extends Model
{
    protected $fillable = [
        'dosen_id', 'judul_skripsi_id', 'komentar',
    ];

    // Relasi many-to-one ke Dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    // Relasi many-to-one ke JudulSkripsi
    public function judulSkripsi()
    {
        return $this->belongsTo(JudulSkripsi::class);
    }
}
