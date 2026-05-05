<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InformasiRencanaPerubahan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $dokumen = InformasiRencanaPerubahan::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.laporan.index', compact('dokumen'));
    }
}

