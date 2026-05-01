@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="bi bi-trophy-fill me-2"></i>Data Prestasi</h4>
    <a href="{{ route('prestasi.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle me-1"></i> Tambah Prestasi
    </a>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Nama Lomba</th>
                    <th>Jenis</th>
                    <th>Tingkat</th>
                    <th>Juara</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_prestasi as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->siswa->nama }}</td>
                    <td>{{ $p->nama_lomba }}</td>
                    <td>{{ $p->jenisPrestasi->nama_jenis }}</td>
                    <td>{{ $p->tingkat }}</td>
                    <td><span class="badge bg-warning text-dark">{{ $p->juara }}</span></td>
                    <td>{{ $p->tanggal }}</td>
                    <td>
                        <a href="{{ route('prestasi.edit', $p) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('prestasi.destroy', $p) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus prestasi ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection