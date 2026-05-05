<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pemantauan_perubahan', function (Blueprint $table) {
            $table->foreignId('diusulkan_oleh_id')->nullable()->after('penugasan')
                  ->constrained('pegawais')->onDelete('set null');
            $table->foreignId('disetujui_oleh_id')->nullable()->after('diusulkan_oleh_id')
                  ->constrained('pegawais')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('pemantauan_perubahan', function (Blueprint $table) {
            $table->dropForeign(['diusulkan_oleh_id']);
            $table->dropForeign(['disetujui_oleh_id']);
            $table->dropColumn(['diusulkan_oleh_id', 'disetujui_oleh_id']);
        });
    }
};

