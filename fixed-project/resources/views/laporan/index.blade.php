@extends('layouts.app')
@section('page-title', 'Laporan Prestasi')
@section('content')

<style>
.filter-card {
    background: white;
    border-radius: 16px;
    padding: 24px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    margin-bottom: 24px;
}
.section-card {
    background: white;
    border-radius: 16px;
    border: none;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    overflow: hidden;
}
.section-card .card-header {
    background: white;
    border-bottom: 1px solid #f0f0f0;
    padding: 18px 24px;
    font-weight: 700;
    font-size: 0.95rem;
}
</style>

<!-- Filter & Export -->
<div class="filter-card">
    <div class="row align-items-end g-3">
        <div class="col-md-3">
            <label class="form-label fw-semibold">Filter Kelas</label>
            <select id="filterKelas" class="form-select">
                <option value="">Semua Kelas</option>
                @foreach($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label fw-semibold">Filter Tingkat</label>
            <select id="filterTingkat" class="form-select">
                <option value="">Semua Tingkat</option>
                @foreach(['Sekolah','Kabupaten','Provinsi','Nasional','Internasional'] as $t)
                    <option value="{{ $t }}">{{ $t }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <a id="btnExportPdf" href="{{ route('laporan.pdf') }}"
               class="btn btn-danger w-100">
                <i class="bi bi-file-earmark-pdf-fill me-2"></i>Export PDF
            </a>
        </div>
        <div class="col-md-3">
            <button onclick="window.print()" class="btn btn-outline-secondary w-100">
                <i class="bi bi-printer-fill me-2"></i>Cetak Halaman
            </button>
        </div>
    </div>
</div>

<!-- Tabel Laporan -->
<div class="section-card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-table me-2 text-success"></i>Data Laporan Prestasi</span>
        <small class="text-muted">Total: {{ $prestasi->count() }} prestasi</small>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead style="background:#f8fffe;">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Nama Lomba</th>
                    <th>Jenis</th>
                    <th>Tingkat</th>
                    <th>Juara</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($prestasi as $p)
                <tr>
                    <td class="px-4">{{ $loop->iteration }}</td>
                    <td>{{ $p->siswa->nama }}</td>
                    <td>{{ $p->siswa->kelas->nama_kelas ?? '-' }}</td>
                    <td>{{ $p->nama_lomba }}</td>
                    <td><span class="badge bg-light text-dark">{{ $p->jenisPrestasi->nama_jenis }}</span></td>
                    <td>{{ $p->tingkat }}</td>
                    <td>
                        @if($p->juara == 'Juara 1') 🥇
                        @elseif($p->juara == 'Juara 2') 🥈
                        @elseif($p->juara == 'Juara 3') 🥉
                        @endif
                        <span class="badge bg-warning text-dark">{{ $p->juara }}</span>
                    </td>
                    <td><small class="text-muted">{{ $p->tanggal }}</small></td>
                    <td>
                        <a href="{{ route('laporan.siswa.pdf', $p->siswa->id) }}"
                           class="btn btn-sm btn-outline-danger" title="PDF Siswa ini">
                            <i class="bi bi-file-person-fill"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center text-muted py-4">
                        <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                        Belum ada data prestasi
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
// Update link PDF saat filter berubah
function updatePdfLink() {
    const kelas   = document.getElementById('filterKelas').value;
    const tingkat = document.getElementById('filterTingkat').value;
    let url = "{{ route('laporan.pdf') }}?";
    if (kelas)   url += 'kelas_id=' + kelas + '&';
    if (tingkat) url += 'tingkat=' + tingkat;
    document.getElementById('btnExportPdf').href = url;
}
document.getElementById('filterKelas').addEventListener('change', updatePdfLink);
document.getElementById('filterTingkat').addEventListener('change', updatePdfLink);
</script>
@endsection