<?php
// database/migrations/2024_01_01_000001_create_informasi_rencana_perubahan_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('informasi_rencana_perubahan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nomor_dokumen', 100);
            $table->date('tanggal_dokumen');
            $table->text('judul');
            $table->json('lingkup_perubahan');
            $table->string('penyusun');
            $table->date('target_penyelesaian');
            $table->string('lokasi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('informasi_rencana_perubahan');
    }
};