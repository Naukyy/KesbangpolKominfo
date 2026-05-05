@extends('layouts.app')

@section('title', 'Edit Pegawai - Admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-glow mb-0"><i class="fas fa-user-edit me-2"></i>Edit Pegawai: {{ $pegawai->nama ?? '' }}</h4>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admin.pegawai.update', $pegawai ?? '') }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="form-label"><i class="fas fa-user me-1"></i>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $pegawai->nama ?? '') }}" required>
                            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label"><i class="fas fa-id-card me-1"></i>NIP</label>
                            <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip', $pegawai->nip ?? '') }}" required>
                            @error('nip') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label"><i class="fas fa-briefcase me-1"></i>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ old('jabatan', $pegawai->jabatan ?? '') }}" required>
                            @error('jabatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="d-flex gap-3 justify-content-between">
                            <a href="{{ route('admin.pegawai.index') }}" class="btn btn-secondary flex-fill">
                                <i class="fas fa-arrow-left me-1"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-primary flex-fill">
                                <i class="fas fa-save me-1"></i>Update Pegawai
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

