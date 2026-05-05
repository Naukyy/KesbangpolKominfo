@extends('layouts.app')

@section('title', 'Data Pegawai - Admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="header-glow mb-0"><i class="fas fa-users me-2"></i>Data Pegawai</h4>
                        <a href="{{ route('admin.pegawai.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>Tambah Pegawai
                        </a>
                    </div>
                    <div class="card-body">
                        @if($pegawais->isEmpty())
                            <div class="empty-state">
                                <i class="fas fa-users-slash"></i>
                                <h3>Belum ada data pegawai</h3>
                                <p>Tambah pegawai pertama Anda untuk memulai pengelolaan</p>
                                <a href="{{ route('admin.pegawai.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus me-1"></i>Tambah Pegawai Pertama
                                </a>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Jabatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($pegawais as $pegawai)
                                            <tr>
                                                <td><strong>{{ $pegawai->nama }}</strong></td>
                                                <td>{{ $pegawai->nip }}</td>
                                                <td>{{ $pegawai->jabatan }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('admin.pegawai.show', $pegawai) }}" class="btn btn-info btn-sm" title="Lihat">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('admin.pegawai.edit', $pegawai) }}" class="btn btn-warning btn-sm" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('admin.pegawai.destroy', $pegawai) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus pegawai ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">Tidak ada data pegawai</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
</script>
@endpush

