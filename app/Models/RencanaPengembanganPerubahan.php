<?php
// app/Models/RencanaPengembanganPerubahan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaPengembanganPerubahan extends Model
{
    use HasFactory;

    protected $table = 'rencana_pengembangan_perubahan';

    protected $fillable = [
        'informasi_rencana_perubahan_id',
        'persiapan_deskripsi',
        'persiapan_durasi',
        'pelaksanaan_deskripsi',
        'pelaksanaan_durasi'
    ];

    public function informasiRencanaPerubahan()
    {
        return $this->belongsTo(InformasiRencanaPerubahan::class);
    }
}