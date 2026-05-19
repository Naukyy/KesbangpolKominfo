@extends('layouts.app')

@section('title', 'Laporan Dokumen - Admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="header-glow mb-4">
                    <i class="fas fa-file-chart-line me-2"></i>Laporan Dokumen
                </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-list me-2"></i>Semua Dokumen oleh Pegawai</h4>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('admin.laporan.index') }}" class="row g-3 mb-4">
                        <div class="col-md-4">
                            <input type="text" name="nomor_dokumen" class="form-control" placeholder="Cari Nomor Dokumen" value="{{ request('nomor_dokumen') }}">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="judul" class="form-control" placeholder="Cari Judul" value="{{ request('judul') }}">
                        </div>
                        <div class="col-md-4">
                            <input type="date" name="tanggal_dokumen" class="form-control" placeholder="Cari Tanggal" value="{{ request('tanggal_dokumen') }}">
                        </div>
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-search me-1"></i>Cari
                            </button>
                            <a href="{{ route('admin.laporan.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-times me-1"></i>Reset
                            </a>
                        </div>
                    </form>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Pegawai/User</th>
                                    <th>Nomor Dokumen</th>
                                    <th>Tanggal Dokumen</th>
                                    <th>Judul</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dokumen as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <strong>{{ $item->user->name ?? 'N/A' }}</strong>
                                            @if($item->user)
                                                <br><small class="text-muted">{{ $item->user->email }}</small>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-primary">{{ $item->nomor_dokumen }}</span>
                                        </td>
                                        <td>
                                            {{ $item->tanggal_dokumen ? $item->tanggal_dokumen->format('d/m/Y') : '-' }}
                                            <br><small class="text-muted">{{ $item->created_at->diffForHumans() }}</small>
                                        </td>
                                        <td>{{ Str::limit($item->judul, 50) }}</td>
                                        <td>
                                            @if($item->status)
                                                <span class="badge bg-{{ $item->status == 'disetujui' ? 'success' : ($item->status == 'ditolak' ? 'danger' : 'warning') }}">
                                                    {{ ucfirst($item->status ?? 'pending') }}
                                                </span>
                                            @else
                                                <span class="badge bg-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.laporan.cetakPdf', $item->id) }}" class="btn btn-sm btn-info text-white" target="_blank" title="Cetak PDF">
                                                <i class="fas fa-print"></i> Cetak
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                    <td colspan="7" class="text-center py-4">
                                            <i class="fas fa-file fa-3x text-muted mb-3"></i>
                                            <p class="text-muted">Belum ada dokumen yang dibuat.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-3">
                        {{ $dokumen->links() }}
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
    
    .table th {
        font-weight: 600;
        border-top: none;
    }
    
    .badge {
        font-size: 0.8em;
    }
</style>
@endsection

