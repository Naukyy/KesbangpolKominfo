{{-- filepath: c:\xampp\htdocs\formulir-kesbangpol3\resources\views\dokumen\edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Dokumen Rencana Perubahan</h2>
    <form method="POST" action="{{ route('dokumen.update', $dokumen) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nomor_dokumen" class="form-label">Nomor Dokumen</label>
            <input type="text" name="nomor_dokumen" id="nomor_dokumen" class="form-control" value="{{ old('nomor_dokumen', $dokumen->nomor_dokumen) }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_dokumen" class="form-label">Tanggal Dokumen</label>
            <input type="date" name="tanggal_dokumen" id="tanggal_dokumen" class="form-control" value="{{ old('tanggal_dokumen', $dokumen->tanggal_dokumen ? $dokumen->tanggal_dokumen->format('Y-m-d') : '') }}" required>
        </div>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $dokumen->judul) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Lingkup Perubahan *</label>
            @php
                $selected = old('lingkup_perubahan', $dokumen->lingkup_perubahan ?? []);
            @endphp
            <div class="row mb-2">
                <div class="col-md-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Kebijakan" id="kebijakan" {{ in_array('Kebijakan', $selected) ? 'checked' : '' }}>
                        <label class="form-check-label" for="kebijakan">Kebijakan</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Prosedur" id="prosedur" {{ in_array('Prosedur', $selected) ? 'checked' : '' }}>
                        <label class="form-check-label" for="prosedur">Prosedur</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Struktur Organisasi" id="struktur" {{ in_array('Struktur Organisasi', $selected) ? 'checked' : '' }}>
                        <label class="form-check-label" for="struktur">Struktur Organisasi</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Sistem Teknologi" id="teknologi" {{ in_array('Sistem Teknologi', $selected) ? 'checked' : '' }}>
                        <label class="form-check-label" for="teknologi">Sistem Teknologi</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Sumber Daya Manusia" id="sdm" {{ in_array('Sumber Daya Manusia', $selected) ? 'checked' : '' }}>
                        <label class="form-check-label" for="sdm">Sumber Daya Manusia</label>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Proses Bisnis" id="proses_bisnis" {{ in_array('Proses Bisnis', $selected) ? 'checked' : '' }}>
                        <label class="form-check-label" for="proses_bisnis">Proses Bisnis</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Aplikasi" id="aplikasi" {{ in_array('Aplikasi', $selected) ? 'checked' : '' }}>
                        <label class="form-check-label" for="aplikasi">Aplikasi</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Infrastruktur" id="infrastruktur" {{ in_array('Infrastruktur', $selected) ? 'checked' : '' }}>
                        <label class="form-check-label" for="infrastruktur">Infrastruktur</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Lingkungan Organisasi" id="lingkungan_organisasi" {{ in_array('Lingkungan Organisasi', $selected) ? 'checked' : '' }}>
                        <label class="form-check-label" for="lingkungan_organisasi">Lingkungan Organisasi</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Data" id="data" {{ in_array('Data', $selected) ? 'checked' : '' }}>
                        <label class="form-check-label" for="data">Data</label>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Perangkat Lunak" id="perangkat_lunak" {{ in_array('Perangkat Lunak', $selected) ? 'checked' : '' }}>
                        <label class="form-check-label" for="perangkat_lunak">Perangkat Lunak</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Perangkat Keras" id="perangkat_keras" {{ in_array('Perangkat Keras', $selected) ? 'checked' : '' }}>
                        <label class="form-check-label" for="perangkat_keras">Perangkat Keras</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Layanan" id="layanan" {{ in_array('Layanan', $selected) ? 'checked' : '' }}>
                        <label class="form-check-label" for="layanan">Layanan</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Keamanan" id="keamanan" {{ in_array('Keamanan', $selected) ? 'checked' : '' }}>
                        <label class="form-check-label" for="keamanan">Keamanan</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Arsitektur" id="arsitektur" {{ in_array('Arsitektur', $selected) ? 'checked' : '' }}>
                        <label class="form-check-label" for="arsitektur">Arsitektur</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="penyusun" class="form-label">Penyusun</label>
            <input type="text" name="penyusun" id="penyusun" class="form-control" value="{{ old('penyusun', $dokumen->penyusun) }}" required>
        </div>
        <div class="mb-3">
            <label for="target_penyelesaian" class="form-label">Target Penyelesaian</label>
            <input type="date" name="target_penyelesaian" id="target_penyelesaian" class="form-control" value="{{ old('target_penyelesaian', $dokumen->target_penyelesaian ? $dokumen->target_penyelesaian->format('Y-m-d') : '') }}" required>
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ old('lokasi', $dokumen->lokasi) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('dokumen.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection