<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('berkas_pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_id')->constrained('pendaftarans')->onDelete('cascade');
            $table->enum('jenis_berkas', ['ijazah', 'rapor', 'kk', 'foto']);
            $table->string('file_path');
            $table->enum('status_verifikasi', ['pending', 'diterima', 'ditolak'])
                  ->default('pending');
            $table->text('catatan')->nullable();
            $table->timestamps();
        }); 
    }

    public function down(): void
    {
        Schema::dropIfExists('berkas_pendaftarans');
    }
};
