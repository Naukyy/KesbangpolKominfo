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
        $pegawai = \App\Models\Pegawai::all();
        return view('pemantauan.edit', compact('dokuman', 'pemantauan', 'pegawai'));
    }

    public function update(Request $request, InformasiRencanaPerubahan $dokuman)
    {
        $this->authorize('update', $dokuman);

        $validated = $request->validate([
            'status' => 'nullable|in:Disetujui,Ditunda,Ditolak',
            'keterangan' => 'nullable|string',
            'penugasan' => 'nullable|string',
            'diusulkan_oleh_id' => 'nullable|exists:pegawais,id',
            'disetujui_oleh_id' => 'nullable|exists:pegawais,id'
        ]);

        $dokuman->pemantauanPerubahan->update($validated);

        return redirect()->route('dokumen.show', $dokuman)->with('success', 'Pemantauan perubahan berhasil diperbarui');
    }
}