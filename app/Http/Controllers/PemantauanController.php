<?php
// app/Http/Controllers/PemantauanController.php

namespace App\Http\Controllers;

use App\Models\InformasiRencanaPerubahan;
use App\Models\PemantauanPerubahan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class PemantauanController extends Controller
{
    use AuthorizesRequests;

    public function edit(InformasiRencanaPerubahan $dokuman)
    {
        $this->authorize('view', $dokuman);
        
        $pemantauan = $dokuman->pemantauanPerubahan;
        return view('pemantauan.edit', compact('dokuman', 'pemantauan'));
    }

    public function update(Request $request, InformasiRencanaPerubahan $dokuman)
    {
        $this->authorize('update', $dokuman);

        $validated = $request->validate([
            'status' => 'nullable|in:Disetujui,Ditunda,Ditolak',
            'keterangan' => 'nullable|string',
            'penugasan' => 'nullable|string',
            'diusulkan_oleh_jabatan' => 'nullable|string|max:100',
            'diusulkan_oleh_nama' => 'nullable|string|max:100',
            'diusulkan_oleh_nip' => 'nullable|string|max:50',
            'disetujui_oleh_jabatan' => 'nullable|string|max:100',
            'disetujui_oleh_nama' => 'nullable|string|max:100',
            'disetujui_oleh_nip' => 'nullable|string|max:50'
        ]);

        $dokuman->pemantauanPerubahan->update($validated);

        return redirect()->route('dokumen.show', $dokuman)->with('success', 'Pemantauan perubahan berhasil diperbarui');
    }
}