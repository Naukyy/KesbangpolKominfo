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
        $dokumen = InformasiRencanaPerubahan::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

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

