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
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Kebijakan" id="kebijakan">
                                    <label class="form-check-label" for="kebijakan">Kebijakan</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Prosedur" id="prosedur">
                                    <label class="form-check-label" for="prosedur">Prosedur</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Struktur Organisasi" id="struktur">
                                    <label class="form-check-label" for="struktur">Struktur Organisasi</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Sistem Teknologi" id="teknologi">
                                    <label class="form-check-label" for="teknologi">Sistem Teknologi</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Sumber Daya Manusia" id="sdm">
                                    <label class="form-check-label" for="sdm">Sumber Daya Manusia</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Proses Bisnis" id="proses_bisnis">
                                    <label class="form-check-label" for="proses_bisnis">Proses Bisnis</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Aplikasi" id="aplikasi">
                                    <label class="form-check-label" for="aplikasi">Aplikasi</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Infrastruktur" id="infrastruktur">
                                    <label class="form-check-label" for="infrastruktur">Infrastruktur</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Lingkungan Organisasi" id="lingkungan_organisasi">
                                    <label class="form-check-label" for="lingkungan_organisasi">Lingkungan Organisasi</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Data" id="data">
                                    <label class="form-check-label" for="data">Data</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Perangkat Lunak" id="perangkat_lunak">
                                    <label class="form-check-label" for="perangkat_lunak">Perangkat Lunak</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Perangkat Keras" id="perangkat_keras">
                                    <label class="form-check-label" for="perangkat_keras">Perangkat Keras</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Layanan" id="layanan">
                                    <label class="form-check-label" for="layanan">Layanan</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Keamanan" id="keamanan">
                                    <label class="form-check-label" for="keamanan">Keamanan</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Arsitektur" id="arsitektur">
                                    <label class="form-check-label" for="arsitektur">Arsitektur</label>
                                </div>
                            </div>
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