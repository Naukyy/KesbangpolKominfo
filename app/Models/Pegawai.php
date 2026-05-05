<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nip',
        'jabatan',
    ];

    public function diusulkanPemantauans()
    {
        return $this->hasMany(PemantauanPerubahan::class, 'diusulkan_oleh_id');
    }

    public function disetujuiPemantauans()
    {
        return $this->hasMany(PemantauanPerubahan::class, 'disetujui_oleh_id');
    }
}

