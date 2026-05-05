@extends('layouts.app')

@section('title', 'Akun Pengguna - Admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="header-glow mb-0"><i class="fas fa-users-cog me-2"></i>Akun Pengguna</h4>
        <a href="#" class="btn btn-primary" onclick="alert('Fitur tambah user melalui register');">
            <i class="fas fa-plus me-1"></i>Tambah User
        </a>
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
                                        <button class="btn btn-secondary btn-sm" disabled title="Tidak bisa hapus admin">
                                            <i class="fas fa-lock"></i>
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

