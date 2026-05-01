@extends('layouts.app')
@section('page-title', 'Edit Kelas')
@section('content')
<div class="mb-4">
    <h4><i class="bi bi-pencil me-2"></i>Edit Kelas</h4>
</div>
<div class="section-card" style="max-width: 500px;">
    <div class="card-body p-4">
        <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Kelas</label>
                <input type="text" name="nama_kelas" class="form-control" value="{{ $kelas->nama_kelas }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tingkat</label>
                <select name="tingkat" class="form-select" required>
                    <option value="X"   {{ $kelas->tingkat == 'X'   ? 'selected' : '' }}>X</option>
                    <option value="XI"  {{ $kelas->tingkat == 'XI'  ? 'selected' : '' }}>XI</option>
                    <option value="XII" {{ $kelas->tingkat == 'XII' ? 'selected' : '' }}>XII</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Tahun Ajaran</label>
                <input type="text" name="tahun_ajaran" class="form-control" value="{{ $kelas->tahun_ajaran }}" required>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection