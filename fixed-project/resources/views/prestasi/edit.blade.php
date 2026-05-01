@extends('layouts.app')
@section('content')
<div class="mb-4">
    <h4><i class="bi bi-pencil me-2"></i>Edit Prestasi</h4>
</div>
<div class="card" style="max-width: 600px;">
    <div class="card-body">
        <form action="{{ route('prestasi.update', $prestasi->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Siswa</label>
                <select name="siswa_id" class="form-select" required>
                    @foreach($siswa as $s)
                        <option value="{{ $s->id }}" {{ $prestasi->siswa_id == $s->id ? 'selected' : '' }}>
                            {{ $s->nama }} ({{ $s->nis }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Prestasi</label>
                <select name="jenis_prestasi_id" class="form-select" required>
                    @foreach($jenisPrestasi as $j)
                        <option value="{{ $j->id }}" {{ $prestasi->jenis_prestasi_id == $j->id ? 'selected' : '' }}>
                            {{ $j->nama_jenis }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Lomba</label>
                <input type="text" name="nama_lomba" class="form-control" value="{{ $prestasi->nama_lomba }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tingkat</label>
                <select name="tingkat" class="form-select" required>
                    @foreach(['Sekolah','Kabupaten','Provinsi','Nasional','Internasional'] as $t)
                        <option value="{{ $t }}" {{ $prestasi->tingkat == $t ? 'selected' : '' }}>{{ $t }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Juara</label>
                <select name="juara" class="form-select" required>
                    @foreach(['Juara 1','Juara 2','Juara 3','Harapan 1','Harapan 2'] as $j)
                        <option value="{{ $j }}" {{ $prestasi->juara == $j ? 'selected' : '' }}>{{ $j }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ $prestasi->tanggal }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="2">{{ $prestasi->keterangan }}</textarea>
            </div>
            <a href="{{ route('prestasi.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
@endsection