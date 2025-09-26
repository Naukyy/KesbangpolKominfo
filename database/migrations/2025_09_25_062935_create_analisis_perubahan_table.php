<?php
// database/migrations/2024_01_01_000002_create_analisis_perubahan_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('analisis_perubahan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('informasi_rencana_perubahan_id')->constrained('informasi_rencana_perubahan')->onDelete('cascade');
            $table->text('deskripsi');
            $table->enum('prioritas', ['Tinggi', 'Sedang', 'Rendah']);
            $table->enum('kategori', ['Darurat', 'Major', 'Minor']);
            $table->text('risiko')->nullable();
            $table->text('dampak')->nullable();
            $table->text('mitigasi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('analisis_perubahan');
    }
};