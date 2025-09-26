<?php
// app/Models/AnalisisPerubahan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalisisPerubahan extends Model
{
    use HasFactory;

    protected $table = 'analisis_perubahan';

    protected $fillable = [
        'informasi_rencana_perubahan_id',
        'deskripsi',
        'prioritas',
        'kategori',
        'risiko',
        'dampak',
        'mitigasi'
    ];

    public function informasiRencanaPerubahan()
    {
        return $this->belongsTo(InformasiRencanaPerubahan::class);
    }
}