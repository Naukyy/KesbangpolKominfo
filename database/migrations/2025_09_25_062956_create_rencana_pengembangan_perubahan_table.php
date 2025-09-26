<?php
// database/migrations/2024_01_01_000003_create_rencana_pengembangan_perubahan_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rencana_pengembangan_perubahan', function (Blueprint $table) {
            $table->id();
            // KODE PERBAIKAN
            $table->foreignId('informasi_rencana_perubahan_id');

            // Definisikan foreign key dengan nama kustom yang lebih pendek
            $table->foreign('informasi_rencana_perubahan_id', 'fk_pengembangan_to_informasi')
                ->references('id')
                ->on('informasi_rencana_perubahan')
                ->onDelete('cascade');
            $table->text('persiapan_deskripsi')->nullable();
            $table->string('persiapan_durasi', 50)->nullable();
            $table->text('pelaksanaan_deskripsi')->nullable();
            $table->string('pelaksanaan_durasi', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rencana_pengembangan_perubahan');
    }
};