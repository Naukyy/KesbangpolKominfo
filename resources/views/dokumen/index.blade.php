@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Dokumen Perubahan</h4>
                <a href="{{ route('dokumen.create') }}" class="btn btn-primary btn-sm">Buat Dokumen Baru</a>
            </div>
            <div class="card-body">
                @if($dokumen->isEmpty())
                    <div class="alert alert-info">
                        Belum ada dokumen. <a href="{{ route('dokumen.create') }}">Buat dokumen pertama Anda</a>.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No. Dokumen</th>
                                    <th>Judul</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dokumen as $doc)
                                <tr>
                                    <td>{{ $doc->nomor_dokumen }}</td>
                                    <td>{{ Str::limit($doc->judul, 50) }}</td>
                                    <td>{{ $doc->tanggal_dokumen->format('d/m/Y') }}</td>
                                    <td>
                                        @if($doc->pemantauanPerubahan && $doc->pemantauanPerubahan->status)
                                            <span class="badge bg-{{ $doc->pemantauanPerubahan->status == 'Disetujui' ? 'success' : ($doc->pemantauanPerubahan->status == 'Ditunda' ? 'warning' : 'danger') }}">
                                                {{ $doc->pemantauanPerubahan->status }}
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">Draft</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('dokumen.show', $doc) }}" class="btn btn-info btn-sm">Lihat</a>
                                            <a href="{{ route('dokumen.edit', $doc) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{ route('analisis.edit', $doc) }}" class="btn btn-primary btn-sm">Analisis</a>
                                            <a href="{{ route('pengembangan.edit', $doc) }}" class="btn btn-success btn-sm">Pengembangan</a>
                                            <a href="{{ route('pemantauan.edit', $doc) }}" class="btn btn-secondary btn-sm">Pemantauan</a>
                                            <a href="{{ route('dokumen.cetakPdf', $doc) }}" class="btn btn-dark btn-sm" target="_blank" id="btn-cetak-pdf-{{ $doc->id }}">PDF</a>
                                            <form action="{{ route('dokumen.destroy', $doc) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus dokumen?')">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.querySelectorAll('a[id^="btn-cetak-pdf-"]').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        window.open(this.href, '_blank');
    });
});
</script>
@endpush