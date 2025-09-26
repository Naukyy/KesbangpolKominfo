<?php
// app/Http/Controllers/PengembanganController.php

namespace App\Http\Controllers;

use App\Models\InformasiRencanaPerubahan;
use App\Models\RencanaPengembanganPerubahan;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PengembanganController extends Controller
{
    use AuthorizesRequests;

    public function edit(InformasiRencanaPerubahan $dokuman)
    {
        $this->authorize('view', $dokuman);
        
        $pengembangan = $dokuman->rencanaPengembanganPerubahan;
        return view('pengembangan.edit', compact('dokuman', 'pengembangan'));
    }

    public function update(Request $request, InformasiRencanaPerubahan $dokuman)
    {
        $this->authorize('update', $dokuman);

        $validated = $request->validate([
            'persiapan_deskripsi' => 'nullable|string',
            'persiapan_durasi' => 'nullable|string|max:50',
            'pelaksanaan_deskripsi' => 'nullable|string',
            'pelaksanaan_durasi' => 'nullable|string|max:50'
        ]);

        $dokuman->rencanaPengembanganPerubahan->update($validated);

        return redirect()->route('dokumen.show', $dokuman)->with('success', 'Rencana pengembangan berhasil diperbarui');
    }
}