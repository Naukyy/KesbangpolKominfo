@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4 header-glow"><i class="fas fa-tachometer-alt me-2"></i>Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p class="lead mb-4">Panel Administrasi Kesbangpol - Kelola data pegawai dan akun pengguna.</p>
        </div>
    </div>
    
    <div class="row g-4 mb-5">
        <div class="col-xl-3 col-md-6">
            <div class="card h-100">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-3x text-primary mb-3"></i>
                    <h3 class="card-title">{{ $pegawaiCount ?? 0 }}</h3>
                    <p class="card-text">Total Pegawai</p>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <div class="card h-100">
                <div class="card-body text-center">
                    <i class="fas fa-user-friends fa-3x text-success mb-3"></i>
                    <h3 class="card-title">{{ $userCount ?? 0 }}</h3>
                    <p class="card-text">Total Pengguna</p>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <a href="{{ route('admin.laporan.index') }}" class="text-decoration-none">
            <div class="card h-100" style="cursor: pointer; transition: transform 0.2s;">
                <div class="card-body text-center">
                    <i class="fas fa-file-alt fa-3x text-info mb-3"></i>
                    <h3 class="card-title">{{ $dokumenCount ?? 0 }}</h3>
                    <p class="card-text">Dokumen</p>
                </div>
            </div>
            </a>
        </div>
        
        <div class="col-xl-3 col-md-6">
            <div class="card h-100">
                <div class="card-body text-center">
                    <i class="fas fa-clock fa-3x text-warning mb-3"></i>
                    <h3 class="card-title">{{ $pendingCount ?? 0 }}</h3>
                    <p class="card-text">Pending Analisis</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-chart-line me-2"></i>Aktivitas Terbaru</h4>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex align-items-center">
                            <i class="fas fa-user-plus text-success me-3"></i>
                            <div>
                                <strong>Pegawai Baru Ditambahkan</strong><br>
                                <small class="text-muted">{{ $lastPegawai ? $lastPegawai->nama . ' - ' . $lastPegawai->created_at->diffForHumans() : 'Belum ada' }}</small>
                            </div>
                        </div>
                        <div class="list-group-item d-flex align-items-center">
                            <i class="fas fa-user-check text-info me-3"></i>
                            <div>
                                <strong>Pengguna Terakhir Login</strong><br>
                                <small class="text-muted">{{ $lastUser ? $lastUser->name . ' - ' . $lastUser->updated_at->diffForHumans() : 'Belum ada' }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-cogs me-2"></i>Quick Actions</h4>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-6">
                            <a href="{{ route('admin.pegawai.create') }}" class="btn btn-primary w-100">
                                <i class="fas fa-plus me-2"></i>Tambah Pegawai
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-info w-100">
                                <i class="fas fa-users-cog me-2"></i>Kelola Users
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .header-glow {
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
    }
</style>
@endsection

