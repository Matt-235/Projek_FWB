<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bimbingans', function (Blueprint $t) {
            $t->id();
            $t->foreignId('dosen_id')->constrained('dosens')->onDelete('cascade');
            $t->foreignId('judul_skripsi_id')->constrained('judul_skripsis')->onDelete('cascade');
            $t->text('komentar');
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimbingans');
    }
};
