{{-- filepath: c:\xampp\htdocs\formulir-kesbangpol3\resources\views\pemantauan\edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pemantauan Perubahan</h2>
    <form method="POST" action="{{ route('pemantauan.update', $dokuman) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="">- Pilih Status -</option>
                <option value="Disetujui" {{ old('status', $pemantauan->status) == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                <option value="Ditunda" {{ old('status', $pemantauan->status) == 'Ditunda' ? 'selected' : '' }}>Ditunda</option>
                <option value="Ditolak" {{ old('status', $pemantauan->status) == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan', $pemantauan->keterangan) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="penugasan" class="form-label">Penugasan</label>
            <input type="text" name="penugasan" id="penugasan" class="form-control" value="{{ old('penugasan', $pemantauan->penugasan) }}">
        </div>
        <div class="mb-3">
            <label for="diusulkan_oleh_jabatan" class="form-label">Diusulkan Oleh (Jabatan)</label>
            <input type="text" name="diusulkan_oleh_jabatan" id="diusulkan_oleh_jabatan" class="form-control" value="{{ old('diusulkan_oleh_jabatan', $pemantauan->diusulkan_oleh_jabatan) }}">
        </div>
        <div class="mb-3">
            <label for="diusulkan_oleh_nama" class="form-label">Diusulkan Oleh (Nama)</label>
            <input type="text" name="diusulkan_oleh_nama" id="diusulkan_oleh_nama" class="form-control" value="{{ old('diusulkan_oleh_nama', $pemantauan->diusulkan_oleh_nama) }}">
        </div>
        <div class="mb-3">
            <label for="diusulkan_oleh_nip" class="form-label">Diusulkan Oleh (NIP)</label>
            <input type="text" name="diusulkan_oleh_nip" id="diusulkan_oleh_nip" class="form-control" value="{{ old('diusulkan_oleh_nip', $pemantauan->diusulkan_oleh_nip) }}">
        </div>
        <div class="mb-3">
            <label for="disetujui_oleh_jabatan" class="form-label">Disetujui Oleh (Jabatan)</label>
            <input type="text" name="disetujui_oleh_jabatan" id="disetujui_oleh_jabatan" class="form-control" value="{{ old('disetujui_oleh_jabatan', $pemantauan->disetujui_oleh_jabatan) }}">
        </div>
        <div class="mb-3">
            <label for="disetujui_oleh_nama" class="form-label">Disetujui Oleh (Nama)</label>
            <input type="text" name="disetujui_oleh_nama" id="disetujui_oleh_nama" class="form-control" value="{{ old('disetujui_oleh_nama', $pemantauan->disetujui_oleh_nama) }}">
        </div>
        <div class="mb-3">
            <label for="disetujui_oleh_nip" class="form-label">Disetujui Oleh (NIP)</label>
            <input type="text" name="disetujui_oleh_nip" id="disetujui_oleh_nip" class="form-control" value="{{ old('disetujui_oleh_nip', $pemantauan->disetujui_oleh_nip) }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('dokumen.show', $dokuman) }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection