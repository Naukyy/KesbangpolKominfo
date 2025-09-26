@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Dokumen Perubahan: {{ $dokumen->nomor_dokumen }}</h4>
                <div class="btn-group">
                    <a href="{{ route('dokumen.cetakPdf', $dokumen) }}" class="btn btn-dark btn-sm" target="_blank" id="btn-cetak-pdf">Cetak PDF</a>
                    <a href="{{ route('dokumen.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                
                <!-- Informasi Rencana Perubahan -->
                <div class="mb-4">
                    <h5 class="border-bottom pb-2">I. INFORMASI RENCANA PERUBAHAN</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Nomor Dokumen:</strong> {{ $dokumen->nomor_dokumen }}</p>
                            <p><strong>Tanggal:</strong> {{ $dokumen->tanggal_dokumen->format('d/m/Y') }}</p>
                            <p><strong>Judul:</strong> {{ $dokumen->judul }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Lingkup Perubahan:</strong> 
                                {{ implode(', ', $dokumen->lingkup_perubahan) }}</p>
                            <p><strong>Penyusun:</strong> {{ $dokumen->penyusun }}</p>
                            <p><strong>Target Penyelesaian:</strong> {{ $dokumen->target_penyelesaian->format('d/m/Y') }}</p>
                            <p><strong>Lokasi:</strong> {{ $dokumen->lokasi }}</p>
                        </div>
                    </div>
                </div>

                <!-- Analisis Perubahan -->
                <div class="mb-4">
                    <h5 class="border-bottom pb-2">II. ANALISIS PERUBAHAN</h5>
                    @if($dokumen->analisisPerubahan)
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Deskripsi:</strong> {{ $dokumen->analisisPerubahan->deskripsi }}</p>
                            <p><strong>Prioritas:</strong> {{ $dokumen->analisisPerubahan->prioritas }}</p>
                            <p><strong>Kategori:</strong> {{ $dokumen->analisisPerubahan->kategori }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Risiko:</strong> {{ $dokumen->analisisPerubahan->risiko ?? '-' }}</p>
                            <p><strong>Dampak:</strong> {{ $dokumen->analisisPerubahan->dampak ?? '-' }}</p>
                            <p><strong>Mitigasi:</strong> {{ $dokumen->analisisPerubahan->mitigasi ?? '-' }}</p>
                        </div>
                    </div>
                    @else
                    <p class="text-muted">Belum ada data analisis perubahan.</p>
                    @endif
                </div>

                <!-- Rencana Pengembangan -->
                <div class="mb-4">
                    <h5 class="border-bottom pb-2">III. RENCANA PENGEMBANGAN PERUBAHAN</h5>
                    @if($dokumen->rencanaPengembanganPerubahan)
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Persiapan:</h6>
                            <p><strong>Deskripsi:</strong> {{ $dokumen->rencanaPengembanganPerubahan->persiapan_deskripsi ?? '-' }}</p>
                            <p><strong>Durasi:</strong> {{ $dokumen->rencanaPengembanganPerubahan->persiapan_durasi ?? '-' }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Pelaksanaan:</h6>
                            <p><strong>Deskripsi:</strong> {{ $dokumen->rencanaPengembanganPerubahan->pelaksanaan_deskripsi ?? '-' }}</p>
                            <p><strong>Durasi:</strong> {{ $dokumen->rencanaPengembanganPerubahan->pelaksanaan_durasi ?? '-' }}</p>
                        </div>
                    </div>
                    @else
                    <p class="text-muted">Belum ada data rencana pengembangan.</p>
                    @endif
                </div>

                <!-- Pemantauan Perubahan -->
                <div class="mb-4">
                    <h5 class="border-bottom pb-2">IV. PEMANTAUAN PERUBAHAN</h5>
                    @if($dokumen->pemantauanPerubahan)
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Status:</strong> 
                                @if($dokumen->pemantauanPerubahan->status)
                                    <span class="badge bg-{{ $dokumen->pemantauanPerubahan->status == 'Disetujui' ? 'success' : ($dokumen->pemantauanPerubahan->status == 'Ditunda' ? 'warning' : 'danger') }}">
                                        {{ $dokumen->pemantauanPerubahan->status }}
                                    </span>
                                @else
                                    <span class="badge bg-secondary">Draft</span>
                                @endif
                            </p>
                            <p><strong>Keterangan:</strong> {{ $dokumen->pemantauanPerubahan->keterangan ?? '-' }}</p>
                            <p><strong>Penugasan:</strong> {{ $dokumen->pemantauanPerubahan->penugasan ?? '-' }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Diusulkan Oleh:</h6>
                            <p><strong>Jabatan:</strong> {{ $dokumen->pemantauanPerubahan->diusulkan_oleh_jabatan ?? '-' }}</p>
                            <p><strong>Nama:</strong> {{ $dokumen->pemantauanPerubahan->diusulkan_oleh_nama ?? '-' }}</p>
                            <p><strong>NIP:</strong> {{ $dokumen->pemantauanPerubahan->diusulkan_oleh_nip ?? '-' }}</p>
                            
                            <h6>Disetujui Oleh:</h6>
                            <p><strong>Jabatan:</strong> {{ $dokumen->pemantauanPerubahan->disetujui_oleh_jabatan ?? '-' }}</p>
                            <p><strong>Nama:</strong> {{ $dokumen->pemantauanPerubahan->disetujui_oleh_nama ?? '-' }}</p>
                            <p><strong>NIP:</strong> {{ $dokumen->pemantauanPerubahan->disetujui_oleh_nip ?? '-' }}</p>
                        </div>
                    </div>
                    @else
                    <p class="text-muted">Belum ada data pemantauan perubahan.</p>
                    @endif
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('analisis.edit', $dokumen) }}" class="btn btn-primary me-md-2">Edit Analisis</a>
                    <a href="{{ route('pengembangan.edit', $dokumen) }}" class="btn btn-success me-md-2">Edit Pengembangan</a>
                    <a href="{{ route('pemantauan.edit', $dokumen) }}" class="btn btn-secondary">Edit Pemantauan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
document.getElementById('btn-cetak-pdf').addEventListener('click', function(e) {
    e.preventDefault();
    window.open(this.href, '_blank');
});
</script>
@endpush
@endsection