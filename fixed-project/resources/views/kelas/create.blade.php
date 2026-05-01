@extends('layouts.app')
@section('content')
<div class="mb-4">
    <h4><i class="bi bi-plus-circle me-2"></i>Tambah Kelas</h4>
</div>
<div class="card" style="max-width: 500px;">
    <div class="card-body">
        <form action="{{ route('kelas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Kelas</label>
                <input type="text" name="nama_kelas" class="form-control" placeholder="Contoh: XII IPA 1" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tingkat</label>
                <select name="tingkat" class="form-select" required>
                    <option value="">-- Pilih --</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tahun Ajaran</label>
                <input type="text" name="tahun_ajaran" class="form-control" placeholder="Contoh: 2024/2025" required>
            </div>
            <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection