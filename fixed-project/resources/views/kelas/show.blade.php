@extends('layouts.app')
@section('content')
<div class="mb-4">
    <h4><i class="bi bi-journal-text me-2"></i>Detail Kelas</h4>
</div>
<div class="card" style="max-width: 500px;">
    <div class="card-body">
        <table class="table table-borderless">
            <tr><th width="150">Nama Kelas</th><td>{{ $kelas->nama_kelas }}</td></tr>
            <tr><th>Tingkat</th><td>{{ $kelas->tingkat }}</td></tr>
            <tr><th>Tahun Ajaran</th><td>{{ $kelas->tahun_ajaran }}</td></tr>
            <tr><th>Jumlah Siswa</th><td>{{ $kelas->siswa->count() }} siswa</td></tr>
        </table>
    </div>
</div>
<div class="mt-3">
    <a href="{{ route('kelas.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i>Kembali
    </a>
    <a href="{{ route('kelas.edit', $kelas->id) }}" class="btn btn-warning ms-2">
        <i class="bi bi-pencil me-1"></i>Edit
    </a>
</div>
@endsection
