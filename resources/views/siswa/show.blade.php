@extends('layouts.app')
@section('content')
<div class="mb-4">
    <h4><i class="bi bi-person-lines-fill me-2"></i>Detail Siswa</h4>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card text-center p-3">
            @if($siswa->foto)
                <img src="{{ asset('storage/'.$siswa->foto) }}" class="rounded-circle mx-auto mb-3"
                     style="width:120px;height:120px;object-fit:cover;">
            @else
                <div class="rounded-circle bg-secondary mx-auto mb-3 d-flex align-items-center justify-content-center"
                     style="width:120px;height:120px;font-size:3rem;color:white;">
                    <i class="bi bi-person"></i>
                </div>
            @endif
            <h5>{{ $siswa->nama }}</h5>
            <span class="badge bg-success">{{ $siswa->nis }}</span>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-body">
                <table class="table table-borderless">
                    <tr><th width="150">Kelas</th><td>{{ $siswa->kelas->nama_kelas ?? '-' }}</td></tr>
                    <tr><th>Jenis Kelamin</th><td>{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td></tr>
                    <tr><th>Tempat, Tgl Lahir</th><td>{{ $siswa->tempat_lahir }}, {{ $siswa->tanggal_lahir }}</td></tr>
                    <tr><th>Alamat</th><td>{{ $siswa->alamat }}</td></tr>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-success text-white">
                <i class="bi bi-trophy-fill me-2"></i>Riwayat Prestasi
            </div>
            <div class="card-body">
                @if($siswa->prestasi->count())
                    <table class="table table-sm">
                        <thead><tr><th>Lomba</th><th>Jenis</th><th>Tingkat</th><th>Juara</th><th>Tanggal</th></tr></thead>
                        <tbody>
                            @foreach($siswa->prestasi as $p)
                            <tr>
                                <td>{{ $p->nama_lomba }}</td>
                                <td>{{ $p->jenisPrestasi->nama_jenis }}</td>
                                <td>{{ $p->tingkat }}</td>
                                <td><span class="badge bg-warning text-dark">{{ $p->juara }}</span></td>
                                <td>{{ $p->tanggal }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-muted">Belum ada data prestasi.</p>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="mt-3">
    <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i>Kembali
    </a>
</div>
@endsection