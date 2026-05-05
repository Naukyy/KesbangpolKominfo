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
        'diusulkan_oleh_id',
        'disetujui_oleh_id'
    ];

    public function diusulkanOleh()
    {
        return $this->belongsTo(Pegawai::class, 'diusulkan_oleh_id');
    }

    public function disetujuiOleh()
    {
        return $this->belongsTo(Pegawai::class, 'disetujui_oleh_id');
    }

    public function getDiusulkanOlehNamaAttribute()
    {
        return $this->diusulkanOleh?->nama;
    }

    public function getDiusulkanOlehNipAttribute()
    {
        return $this->diusulkanOleh?->nip;
    }

    public function getDiusulkanOlehJabatanAttribute()
    {
        return $this->diusulkanOleh?->jabatan;
    }

    public function getDisetujuiOlehNamaAttribute()
    {
        return $this->disetujuiOleh?->nama;
    }

    public function getDisetujuiOlehNipAttribute()
    {
        return $this->disetujuiOleh?->nip;
    }

    public function getDisetujuiOlehJabatanAttribute()
    {
        return $this->disetujuiOleh?->jabatan;
    }

    public function informasiRencanaPerubahan()
    {
        return $this->belongsTo(InformasiRencanaPerubahan::class);
    }
}