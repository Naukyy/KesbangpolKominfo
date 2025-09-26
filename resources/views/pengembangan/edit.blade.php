{{-- filepath: c:\xampp\htdocs\formulir-kesbangpol3\resources\views\pengembangan\edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Rencana Pengembangan Perubahan</h2>
    <form method="POST" action="{{ route('pengembangan.update', $dokuman) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="persiapan_deskripsi" class="form-label">Deskripsi Persiapan</label>
            <textarea name="persiapan_deskripsi" id="persiapan_deskripsi" class="form-control">{{ old('persiapan_deskripsi', $pengembangan->persiapan_deskripsi) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="persiapan_durasi" class="form-label">Durasi Persiapan</label>
            <input type="text" name="persiapan_durasi" id="persiapan_durasi" class="form-control" value="{{ old('persiapan_durasi', $pengembangan->persiapan_durasi) }}">
        </div>
        <div class="mb-3">
            <label for="pelaksanaan_deskripsi" class="form-label">Deskripsi Pelaksanaan</label>
            <textarea name="pelaksanaan_deskripsi" id="pelaksanaan_deskripsi" class="form-control">{{ old('pelaksanaan_deskripsi', $pengembangan->pelaksanaan_deskripsi) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="pelaksanaan_durasi" class="form-label">Durasi Pelaksanaan</label>
            <input type="text" name="pelaksanaan_durasi" id="pelaksanaan_durasi" class="form-control" value="{{ old('pelaksanaan_durasi', $pengembangan->pelaksanaan_durasi) }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('dokumen.show', $dokuman) }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection