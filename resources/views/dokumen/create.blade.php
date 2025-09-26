@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Buat Dokumen Perubahan Baru</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('dokumen.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nomor_dokumen" class="form-label">Nomor Dokumen *</label>
                                <input type="text" class="form-control" id="nomor_dokumen" name="nomor_dokumen" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_dokumen" class="form-label">Tanggal Dokumen *</label>
                                <input type="date" class="form-control" id="tanggal_dokumen" name="tanggal_dokumen" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Perubahan *</label>
                        <textarea class="form-control" id="judul" name="judul" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lingkup Perubahan *</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Kebijakan" id="kebijakan">
                            <label class="form-check-label" for="kebijakan">Kebijakan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Prosedur" id="prosedur">
                            <label class="form-check-label" for="prosedur">Prosedur</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Struktur Organisasi" id="struktur">
                            <label class="form-check-label" for="struktur">Struktur Organisasi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Sistem Teknologi" id="teknologi">
                            <label class="form-check-label" for="teknologi">Sistem Teknologi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Sumber Daya Manusia" id="sdm">
                            <label class="form-check-label" for="sdm">Sumber Daya Manusia</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="penyusun" class="form-label">Penyusun *</label>
                                <input type="text" class="form-control" id="penyusun" name="penyusun" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="target_penyelesaian" class="form-label">Target Penyelesaian *</label>
                                <input type="date" class="form-control" id="target_penyelesaian" name="target_penyelesaian" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi *</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('dokumen.index') }}" class="btn btn-secondary me-md-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Dokumen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection