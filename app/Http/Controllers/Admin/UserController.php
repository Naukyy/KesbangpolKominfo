<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Admin only.');
        }

        $users = User::where('role', '!=', 'admin')->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Admin only.');
        }

        if ($user->role === 'admin') {
            abort(403, 'Tidak bisa menghapus akun admin.');
        }

        // Hapus data terkait
        $user->informasiRencanaPerubahan()->delete();
        
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Akun pengguna berhasil dihapus.');
    }
}

