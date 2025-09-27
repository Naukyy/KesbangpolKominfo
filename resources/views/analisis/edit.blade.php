{{-- filepath: c:\xampp\htdocs\formulir-kesbangpol3\resources\views\analisis\edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Analisis Perubahan</h2>
    <form method="POST" action="{{ route('analisis.update', $dokuman) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ old('deskripsi', $analisis->deskripsi) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="prioritas" class="form-label">Prioritas</label>
            <select name="prioritas" id="prioritas" class="form-control" required>
                <option value="Tinggi" {{ old('prioritas', $analisis->prioritas) == 'Tinggi' ? 'selected' : '' }}>Tinggi</option>
                <option value="Sedang" {{ old('prioritas', $analisis->prioritas) == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                <option value="Rendah" {{ old('prioritas', $analisis->prioritas) == 'Rendah' ? 'selected' : '' }}>Rendah</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select name="kategori" id="kategori" class="form-control" required>
                <option value="Darurat" {{ old('kategori', $analisis->kategori) == 'Darurat' ? 'selected' : '' }}>Darurat</option>
                <option value="Major" {{ old('kategori', $analisis->kategori) == 'Major' ? 'selected' : '' }}>Major</option>
                <option value="Minor" {{ old('kategori', $analisis->kategori) == 'Minor' ? 'selected' : '' }}>Minor</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="risiko" class="form-label">Risiko</label>
            <textarea name="risiko" id="risiko" class="form-control">{{ old('risiko', $analisis->risiko) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="dampak" class="form-label">Dampak</label>
            <textarea name="dampak" id="dampak" class="form-control">{{ old('dampak', $analisis->dampak) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="mitigasi" class="form-label">Mitigasi</label>
            <textarea name="mitigasi" id="mitigasi" class="form-control">{{ old('mitigasi', $analisis->mitigasi) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('dokumen.show', $dokuman) }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection