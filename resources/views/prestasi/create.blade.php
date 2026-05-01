@extends('layouts.app')
@section('content')
<div class="mb-4">
    <h4><i class="bi bi-plus-circle me-2"></i>Tambah Prestasi</h4>
</div>
<div class="card" style="max-width: 600px;">
    <div class="card-body">
        <form action="{{ route('prestasi.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Siswa</label>
                <select name="siswa_id" class="form-select" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach($siswa as $s)
                        <option value="{{ $s->id }}">{{ $s->nama }} ({{ $s->nis }})</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Prestasi</label>
                <select name="jenis_prestasi_id" class="form-select" required>
                    <option value="">-- Pilih Jenis --</option>
                    @foreach($jenisPrestasi as $j)
                        <option value="{{ $j->id }}">{{ $j->nama_jenis }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Lomba</label>
                <input type="text" name="nama_lomba" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tingkat</label>
                <select name="tingkat" class="form-select" required>
                    <option value="">-- Pilih Tingkat --</option>
                    <option value="Sekolah">Sekolah</option>
                    <option value="Kabupaten">Kabupaten</option>
                    <option value="Provinsi">Provinsi</option>
                    <option value="Nasional">Nasional</option>
                    <option value="Internasional">Internasional</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Juara</label>
                <select name="juara" class="form-select" required>
                    <option value="">-- Pilih --</option>
                    <option value="Juara 1">Juara 1</option>
                    <option value="Juara 2">Juara 2</option>
                    <option value="Juara 3">Juara 3</option>
                    <option value="Harapan 1">Harapan 1</option>
                    <option value="Harapan 2">Harapan 2</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan (opsional)</label>
                <textarea name="keterangan" class="form-control" rows="2"></textarea>
            </div>
            <a href="{{ route('prestasi.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection