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
                                    </tr>
                                @empty
                                    <tr>
                                    <td colspan="6" class="text-center py-4">
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

