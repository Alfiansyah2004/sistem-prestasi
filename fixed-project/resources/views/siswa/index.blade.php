@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="bi bi-people-fill me-2"></i>Data Siswa</h4>
    <a href="{{ route('siswa.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle me-1"></i> Tambah Siswa
    </a>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>JK</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_siswa as $s)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($s->foto)
                            <img src="{{ asset('storage/'.$s->foto) }}" width="40" height="40"
                                 class="rounded-circle object-fit-cover">
                        @else
                            <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center"
                                 style="width:40px;height:40px;color:white;font-size:1.2rem;">
                                <i class="bi bi-person"></i>
                            </div>
                        @endif
                    </td>
                    <td>{{ $s->nis }}</td>
                    <td>{{ $s->nama }}</td>
                    <td>{{ $s->kelas->nama_kelas ?? '-' }}</td>
                    <td>{{ $s->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>
                        <a href="{{ route('siswa.show', $s) }}" class="btn btn-sm btn-info text-white">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('siswa.edit', $s) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('siswa.destroy', $s) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus siswa ini?')">
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