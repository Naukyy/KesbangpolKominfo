<?php
// app/Http/Controllers/DokumenController.php

namespace App\Http\Controllers;

use App\Models\InformasiRencanaPerubahan;
use App\Models\AnalisisPerubahan;
use App\Models\RencanaPengembanganPerubahan;
use App\Models\PemantauanPerubahan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DokumenController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $dokumen = InformasiRencanaPerubahan::where('user_id', auth()->id())
            ->with(['analisisPerubahan', 'pemantauanPerubahan'])
            ->latest()
            ->get();

        return view('dokumen.index', compact('dokumen'));
    }

    public function create()
    {
        return view('dokumen.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_dokumen' => 'required|string|max:100',
            'tanggal_dokumen' => 'required|date',
            'judul' => 'required|string',
            'lingkup_perubahan' => 'required|array',
            'penyusun' => 'required|string|max:100',
            'target_penyelesaian' => 'required|date',
            'lokasi' => 'required|string|max:100'
        ]);

        DB::transaction(function () use ($validated) {
            $dokumen = InformasiRencanaPerubahan::create([
                'user_id' => auth()->id(),
                ...$validated
            ]);

            // Buat record kosong untuk bagian lainnya, isi field wajib dengan nilai default
            AnalisisPerubahan::create([
                'informasi_rencana_perubahan_id' => $dokumen->id,
                'deskripsi' => '', // default value
            ]);
            RencanaPengembanganPerubahan::create([
                'informasi_rencana_perubahan_id' => $dokumen->id,
                'deskripsi' => '', // default value
            ]);
            PemantauanPerubahan::create([
                'informasi_rencana_perubahan_id' => $dokumen->id,
                'deskripsi' => '', // default value
            ]);
        });

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil dibuat');
    }

    public function show(InformasiRencanaPerubahan $dokuman)
    {
        $this->authorize('view', $dokuman);
        
        $dokumen = $dokuman->load(['analisisPerubahan', 'rencanaPengembanganPerubahan', 'pemantauanPerubahan']);
        return view('dokumen.show', compact('dokumen'));
    }

    public function edit(InformasiRencanaPerubahan $dokuman)
    {
        $this->authorize('update', $dokuman);
        
        $dokumen = $dokuman;
        return view('dokumen.edit', compact('dokumen'));
    }

    public function update(Request $request, InformasiRencanaPerubahan $dokuman)
    {
        $this->authorize('update', $dokuman);

        $validated = $request->validate([
            'nomor_dokumen' => 'required|string|max:100',
            'tanggal_dokumen' => 'required|date',
            'judul' => 'required|string',
            'lingkup_perubahan' => 'required|array',
            'penyusun' => 'required|string|max:100',
            'target_penyelesaian' => 'required|date',
            'lokasi' => 'required|string|max:100'
        ]);

        $dokuman->update($validated);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil diperbarui');
    }

    public function destroy(InformasiRencanaPerubahan $dokuman)
    {
        $this->authorize('delete', $dokuman);
        
        $dokuman->delete();
        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil dihapus');
    }

    public function cetakPdf(InformasiRencanaPerubahan $dokuman)
    {
        $this->authorize('view', $dokuman);
        
        $dokumen = $dokuman->load(['analisisPerubahan', 'rencanaPengembanganPerubahan', 'pemantauanPerubahan']);
        
        $pdf = Pdf::loadView('pdf.dokumen', compact('dokumen'))
            ->setPaper('a4', 'portrait');
            
        return $pdf->stream('dokumen-' . $dokumen->nomor_dokumen . '.pdf');
    }
}