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
            <input type="date" name="tanggal_dokumen" id="tanggal_dokumen" class="form-control" value="{{ old('tanggal_dokumen', $dokumen->tanggal_dokumen) }}" required>
        </div>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $dokumen->judul) }}" required>
        </div>
        <div class="mb-3">
            <label for="lingkup_perubahan" class="form-label">Lingkup Perubahan</label>
            <select name="lingkup_perubahan[]" id="lingkup_perubahan" class="form-control" multiple required>
                @php
                    $selected = old('lingkup_perubahan', $dokumen->lingkup_perubahan ?? []);
                @endphp
                <option value="Organisasi" {{ in_array('Organisasi', $selected) ? 'selected' : '' }}>Organisasi</option>
                <option value="Proses Bisnis" {{ in_array('Proses Bisnis', $selected) ? 'selected' : '' }}>Proses Bisnis</option>
                <option value="SDM" {{ in_array('SDM', $selected) ? 'selected' : '' }}>SDM</option>
                <option value="Teknologi" {{ in_array('Teknologi', $selected) ? 'selected' : '' }}>Teknologi</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="penyusun" class="form-label">Penyusun</label>
            <input type="text" name="penyusun" id="penyusun" class="form-control" value="{{ old('penyusun', $dokumen->penyusun) }}" required>
        </div>
        <div class="mb-3">
            <label for="target_penyelesaian" class="form-label">Target Penyelesaian</label>
            <input type="date" name="target_penyelesaian" id="target_penyelesaian" class="form-control" value="{{ old('target_penyelesaian', $dokumen->target_penyelesaian) }}" required>
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