<?php
// app/Models/PemantauanPerubahan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemantauanPerubahan extends Model
{
    use HasFactory;

    protected $table = 'pemantauan_perubahan';

    protected $fillable = [
        'informasi_rencana_perubahan_id',
        'status',
        'keterangan',
        'penugasan',
        'diusulkan_oleh_jabatan',
        'diusulkan_oleh_nama',
        'diusulkan_oleh_nip',
        'disetujui_oleh_jabatan',
        'disetujui_oleh_nama',
        'disetujui_oleh_nip'
    ];

    public function informasiRencanaPerubahan()
    {
        return $this->belongsTo(InformasiRencanaPerubahan::class);
    }
}