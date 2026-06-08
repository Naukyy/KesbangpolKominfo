@extends('layouts.app')

@section('title', 'Akun Pengguna - Admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="header-glow mb-0"><i class="fas fa-users-cog me-2"></i>Akun Pengguna</h4>
        <div>
            <span class="badge bg-danger px-3 py-2 fs-6 shadow-sm rounded-pill">
                <i class="fas fa-user-shield me-1"></i> Total Admin: {{ $adminCount }}
            </span>
        </div>
    </div>

    @if($users->isEmpty())
        <div class="empty-state text-center py-5">
            <i class="fas fa-users-slash fa-4x mb-3" style="color: var(--pastel-blue);"></i>
            <h3>Tidak ada akun pengguna</h3>
            <p class="text-muted">Semua akun admin dan pengguna akan muncul di sini.</p>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Google ID</th>
                        <th>Verified</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>
                                <strong>{{ $user->name }}</strong>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge {{ $user->role === 'admin' ? 'bg-danger' : 'bg-info' }}">
                                    {{ $user->role ?? 'user' }}
                                </span>
                            </td>
                            <td>{{ $user->google_id ?: '-' }}</td>
                            <td>
                                <i class="{{ $user->email_verified_at ? 'fas fa-check-circle text-success' : 'fas fa-times-circle text-danger' }}"></i>
                            </td>
                            <td>{{ $user->created_at->format('d/m/Y') }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-info btn-sm" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if($user->role !== 'admin')
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline" 
                                              onsubmit="return confirm('Yakin hapus akun {{ $user->name }}? Data terkait akan dihapus.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus Akun">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @else
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#adminInfoModal" title="Hapus Akun Admin">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">Tidak ada pengguna non-admin</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            {{ $users->links() }}
        </div>
    @endif
</div>

<!-- Modal Informasi Admin -->
<div class="modal fade" id="adminInfoModal" tabindex="-1" aria-labelledby="adminInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px);">
            <div class="modal-header border-0 bg-danger text-white py-3" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">
                <h5 class="modal-title d-flex align-items-center" id="adminInfoModalLabel">
                    <i class="fas fa-exclamation-triangle me-2"></i> Tindakan Ditolak
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-5">
                <div class="mb-4">
                    <span class="fa-stack fa-3x">
                        <i class="fas fa-circle fa-stack-2x" style="color: #fce8e6;"></i>
                        <i class="fas fa-user-shield fa-stack-1x text-danger"></i>
                    </span>
                </div>
                <h4 class="mb-3 text-dark fw-bold">Tidak Bisa Menghapus Admin</h4>
                <p class="text-muted mb-4">
                    Demi keamanan sistem, Anda tidak diperbolehkan menghapus sesama akun administrator.
                </p>
                <div class="p-3 bg-light rounded-4 mb-2 border">
                    <small class="text-uppercase tracking-wider text-muted d-block mb-1">Jumlah Akun Admin</small>
                    <span class="fs-4 fw-bold text-danger">
                        <i class="fas fa-users-cog me-1"></i> {{ $adminCount }} Admin
                    </span>
                    <span class="d-block text-muted small mt-1">aktif dalam sistem saat ini</span>
                </div>
            </div>
            <div class="modal-footer border-0 justify-content-center pb-4">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<style>
    .header-glow {
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
    }
    
    .empty-state h3 {
        color: var(--text-dark);
    }
    
    .badge {
        font-size: 0.75em;
    }
</style>
@endsection

