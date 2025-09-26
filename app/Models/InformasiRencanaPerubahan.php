<?php
// app/Models/InformasiRencanaPerubahan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiRencanaPerubahan extends Model
{
    use HasFactory;

    protected $table = 'informasi_rencana_perubahan';

    protected $fillable = [
        'user_id',
        'nomor_dokumen',
        'tanggal_dokumen',
        'judul',
        'lingkup_perubahan',
        'penyusun',
        'target_penyelesaian',
        'lokasi'
    ];

    protected $casts = [
        'lingkup_perubahan' => 'array',
        'tanggal_dokumen' => 'date',
        'target_penyelesaian' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function analisisPerubahan()
    {
        return $this->hasOne(AnalisisPerubahan::class);
    }

    public function rencanaPengembanganPerubahan()
    {
        return $this->hasOne(RencanaPengembanganPerubahan::class);
    }

    public function pemantauanPerubahan()
    {
        return $this->hasOne(PemantauanPerubahan::class, 'informasi_rencana_perubahan_id');
    }
}