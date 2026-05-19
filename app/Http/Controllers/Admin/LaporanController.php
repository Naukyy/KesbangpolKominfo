<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InformasiRencanaPerubahan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = InformasiRencanaPerubahan::with('user');

        if ($request->filled('nomor_dokumen')) {
            $query->where('nomor_dokumen', 'like', '%' . $request->nomor_dokumen . '%');
        }

        if ($request->filled('judul')) {
            $query->where('judul', 'like', '%' . $request->judul . '%');
        }

        if ($request->filled('tanggal_dokumen')) {
            $query->whereDate('tanggal_dokumen', $request->tanggal_dokumen);
        }

        $dokumen = $query->orderBy('created_at', 'desc')->paginate(10);
        $dokumen->appends($request->all());

        return view('admin.laporan.index', compact('dokumen'));
    }

    public function cetakPdf($id)
    {
        $dokumen = InformasiRencanaPerubahan::with(['analisisPerubahan', 'rencanaPengembanganPerubahan', 'pemantauanPerubahan'])->findOrFail($id);

        $pdf = Pdf::loadView('pdf.dokumen', compact('dokumen'))
            ->setPaper('a4', 'portrait');

        $filename = str_replace(['/', '\\'], '-', $dokumen->nomor_dokumen);

        return $pdf->stream('dokumen-' . $filename . '.pdf');
    }
}

