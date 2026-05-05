@extends('layouts.app')

@section('title', 'Detail Pegawai - Admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="header-glow mb-0"><i class="fas fa-user me-2"></i>Detail Pegawai</h4>
                    <div>
                        <a href="{{ route('admin.pegawai.edit', $pegawai) }}" class="btn btn-warning me-2">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                        <a href="{{ route('admin.pegawai.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body p-5">
                    <div class="detail-value">
                        <div class="detail-label"><i class="fas fa-user-circle me-2"></i>Nama Lengkap</div>
                        <h2>{{ $pegawai->nama ?? '' }}</h2>
                    </div>
                    <div class="detail-value">
                        <div class="detail-label"><i class="fas fa-id-card me-2"></i>NIP</div>
                        <h3>{{ $pegawai->nip ?? '' }}</h3>
                    </div>
                    <div class="detail-value">
                        <div class="detail-label"><i class="fas fa-briefcase me-2"></i>Jabatan</div>
                        <h3>{{ $pegawai->jabatan ?? '' }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .detail-label {
        font-weight: 600;
        color: var(--neon-blue-dark);
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
    }
    
    .detail-value {
        font-size: 1.25rem;
        color: var(--text-dark);
        padding: 1rem;
        background: linear-gradient(135deg, rgba(144, 224, 239, 0.3), rgba(167, 199, 231, 0.3));
        border-radius: 10px;
        border-left: 4px solid var(--neon-blue);
        margin-bottom: 1.5rem;
    }
    
    .header-glow {
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
    }
    
    @media (max-width: 768px) {
        .card-header {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }
    }
</style>
@endsection

