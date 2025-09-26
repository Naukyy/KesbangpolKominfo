<?php
// database/migrations/2024_01_01_000004_create_pemantauan_perubahan_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pemantauan_perubahan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('informasi_rencana_perubahan_id')->constrained('informasi_rencana_perubahan')->onDelete('cascade');
            $table->enum('status', ['Disetujui', 'Ditunda', 'Ditolak'])->nullable();
            $table->text('keterangan')->nullable();
            $table->text('penugasan')->nullable();
            $table->string('diusulkan_oleh_jabatan', 100)->nullable();
            $table->string('diusulkan_oleh_nama', 100)->nullable();
            $table->string('diusulkan_oleh_nip', 50)->nullable();
            $table->string('disetujui_oleh_jabatan', 100)->nullable();
            $table->string('disetujui_oleh_nama', 100)->nullable();
            $table->string('disetujui_oleh_nip', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemantauan_perubahan');
    }
};