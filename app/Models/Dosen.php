<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = [
        'user_id', 'keahlian',
    ];

    // Relasi many-to-one ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi one-to-many ke Bimbingan
    public function bimbingans()
    {
        return $this->hasMany(Bimbingan::class);
    }
}
