@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="bi bi-door-open-fill me-2"></i>Data Kelas</h4>
    <a href="{{ route('kelas.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle me-1"></i> Tambah Kelas
    </a>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Tingkat</th>
                    <th>Tahun Ajaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_kelas as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->nama_kelas }}</td>
                    <td>{{ $k->tingkat }}</td>
                    <td>{{ $k->tahun_ajaran }}</td>
                    <td>
                        <a href="{{ route('kelas.edit', $k) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('kelas.destroy', $k) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus kelas ini?')">
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