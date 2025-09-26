<?php
// app/Http/Controllers/AnalisisController.php

namespace App\Http\Controllers;

use App\Models\InformasiRencanaPerubahan;
use App\Models\AnalisisPerubahan;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AnalisisController extends Controller
{
    use AuthorizesRequests;

    public function edit(InformasiRencanaPerubahan $dokuman)
    {
        $this->authorize('view', $dokuman);
        
        $analisis = $dokuman->analisisPerubahan;
        return view('analisis.edit', compact('dokuman', 'analisis'));
    }

    public function update(Request $request, InformasiRencanaPerubahan $dokuman)
    {
        $this->authorize('update', $dokuman);

        $validated = $request->validate([
            'deskripsi' => 'required|string',
            'prioritas' => 'required|in:Tinggi,Sedang,Rendah',
            'kategori' => 'required|in:Darurat,Major,Minor',
            'risiko' => 'nullable|string',
            'dampak' => 'nullable|string',
            'mitigasi' => 'nullable|string'
        ]);

        $dokuman->analisisPerubahan->update($validated);

        return redirect()->route('dokumen.show', $dokuman)->with('success', 'Analisis perubahan berhasil diperbarui');
    }
}