<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\User;
use App\Models\InformasiRencanaPerubahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Admin only.');
        }

        $pegawaiCount = Pegawai::count();
        $userCount = User::where('role', '!=', 'admin')->count();
        $dokumenCount = InformasiRencanaPerubahan::count();
        $pendingCount = InformasiRencanaPerubahan::whereNull('status')->count();
        
        $lastPegawai = Pegawai::latest()->first();
        $lastUser = User::latest()->first();

        return view('admin.dashboard', compact(
            'pegawaiCount', 
            'userCount', 
            'dokumenCount', 
            'pendingCount', 
            'lastPegawai', 
            'lastUser'
        ));
    }
}

