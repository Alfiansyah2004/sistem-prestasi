@extends('layouts.app')
@section('page-title', 'Dashboard')
@section('content')

<style>
.stat-card {
    border-radius: 18px;
    border: none;
    padding: 24px;
    color: white;
    position: relative;
    overflow: hidden;
    transition: transform 0.25s, box-shadow 0.25s;
}
.stat-card:hover { transform: translateY(-5px); box-shadow: 0 16px 40px rgba(0,0,0,0.15); }
.stat-card .stat-icon {
    font-size: 3.2rem; opacity: 0.18;
    position: absolute; right: 18px; top: 12px;
}
.stat-card .stat-number { font-size: 2.6rem; font-weight: 800; line-height: 1; }
.stat-card .stat-label { font-size: 0.85rem; opacity: 0.85; margin-top: 5px; }
.stat-card .stat-change {
    font-size: 0.75rem; margin-top: 10px;
    background: rgba(255,255,255,0.18);
    display: inline-block; padding: 2px 10px; border-radius: 20px;
}
.card-green  { background: linear-gradient(135deg, #1a7a50, #25a96e); }
.card-blue   { background: linear-gradient(135deg, #1d4ed8, #3b82f6); }
.card-orange { background: linear-gradient(135deg, #c2410c, #f97316); }
.card-purple { background: linear-gradient(135deg, #6d28d9, #8b5cf6); }

.section-card {
    background: white;
    border-radius: 18px;
    border: none;
    box-shadow: 0 2px 14px rgba(0,0,0,0.06);
    overflow: hidden;
}
.section-card .card-header {
    background: white;
    border-bottom: 1px solid #f0f0f0;
    padding: 18px 24px;
    font-weight: 700;
    font-size: 0.95rem;
    color: #333;
}
.juara-badge {
    width: 54px; height: 54px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.5rem;
    margin: 0 auto 8px;
}
.chart-container { position: relative; padding: 20px 24px 10px; }
</style>

<!-- Stat Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-3 col-sm-6">
        <div class="stat-card card-green">
            <i class="bi bi-people-fill stat-icon"></i>
            <div class="stat-number">{{ $totalSiswa }}</div>
            <div class="stat-label">Total Siswa</div>
            <span class="stat-change"><i class="bi bi-person-check me-1"></i>Terdaftar</span>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="stat-card card-blue">
            <i class="bi bi-trophy-fill stat-icon"></i>
            <div class="stat-number">{{ $totalPrestasi }}</div>
            <div class="stat-label">Total Prestasi</div>
            <span class="stat-change"><i class="bi bi-award me-1"></i>Tercatat</span>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="stat-card card-orange">
            <i class="bi bi-door-open-fill stat-icon"></i>
            <div class="stat-number">{{ $totalKelas }}</div>
            <div class="stat-label">Total Kelas</div>
            <span class="stat-change"><i class="bi bi-grid me-1"></i>Aktif</span>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="stat-card card-purple">
            <i class="bi bi-award-fill stat-icon"></i>
            <div class="stat-number">{{ $juara1 }}</div>
            <div class="stat-label">Juara 1 Diraih</div>
            <span class="stat-change">🥇 Prestasi Terbaik</span>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="row g-4 mb-4">
    <!-- Rekap Juara -->
    <div class="col-md-4">
        <div class="section-card h-100">
            <div class="card-header">
                <i class="bi bi-award-fill me-2 text-warning"></i>Rekap Juara
            </div>
            <div class="card-body py-3">
                <div class="chart-container" style="height:200px;">
                    <canvas id="chartJuara"></canvas>
                </div>
                <div class="row g-2 text-center mt-1">
                    <div class="col-4">
                        <div class="juara-badge" style="background:#fff9c4;">🥇</div>
                        <div style="font-size:1.6rem;font-weight:800;color:#b7791f;">{{ $juara1 }}</div>
                        <small class="text-muted">Juara 1</small>
                    </div>
                    <div class="col-4">
                        <div class="juara-badge" style="background:#f0f0f0;">🥈</div>
                        <div style="font-size:1.6rem;font-weight:800;color:#718096;">{{ $juara2 }}</div>
                        <small class="text-muted">Juara 2</small>
                    </div>
                    <div class="col-4">
                        <div class="juara-badge" style="background:#ffe8d6;">🥉</div>
                        <div style="font-size:1.6rem;font-weight:800;color:#c05621;">{{ $juara3 }}</div>
                        <small class="text-muted">Juara 3</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bar Chart Prestasi per Tingkat -->
    <div class="col-md-8">
        <div class="section-card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-bar-chart-fill me-2 text-primary"></i>Prestasi per Tingkat</span>
                <span class="badge bg-primary bg-opacity-10 text-primary" style="font-size:0.75rem;">Diagram Batang</span>
            </div>
            <div class="chart-container" style="height:300px;">
                <canvas id="chartTingkat"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Bar Chart Prestasi per Jenis -->
<div class="row g-4 mb-4">
    <div class="col-12">
        <div class="section-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-bar-chart-steps me-2 text-success"></i>Prestasi per Jenis</span>
                <span class="badge bg-success bg-opacity-10 text-success" style="font-size:0.75rem;">Diagram Batang</span>
            </div>
            <div class="chart-container" style="height:260px;">
                <canvas id="chartJenis"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Prestasi Terbaru -->
<div class="section-card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-clock-history me-2 text-success"></i>Prestasi Terbaru</span>
        <a href="{{ route('prestasi.index') }}" class="btn btn-sm btn-outline-success rounded-pill px-3">Lihat Semua</a>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead style="background:#f8fffe;">
                <tr>
                    <th class="px-4 py-3">Nama Siswa</th>
                    <th>Nama Lomba</th>
                    <th>Jenis</th>
                    <th>Tingkat</th>
                    <th>Juara</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($prestasiTerbaru as $p)
                <tr>
                    <td class="px-4">
                        <div class="d-flex align-items-center gap-2">
                            <div style="width:36px;height:36px;background:linear-gradient(135deg,#1a7a50,#25a96e);border-radius:50%;display:flex;align-items:center;justify-content:center;color:white;font-weight:700;font-size:0.85rem;flex-shrink:0;">
                                {{ strtoupper(substr($p->siswa->nama, 0, 1)) }}
                            </div>
                            <span>{{ $p->siswa->nama }}</span>
                        </div>
                    </td>
                    <td>{{ $p->nama_lomba }}</td>
                    <td><span class="badge bg-light text-dark border">{{ $p->jenisPrestasi->nama_jenis }}</span></td>
                    <td><span class="badge" style="background:#e0f2fe;color:#0277bd;">{{ $p->tingkat }}</span></td>
                    <td>
                        @if($p->juara == 'Juara 1') 🥇
                        @elseif($p->juara == 'Juara 2') 🥈
                        @elseif($p->juara == 'Juara 3') 🥉
                        @endif
                        <span class="badge bg-warning text-dark">{{ $p->juara }}</span>
                    </td>
                    <td><small class="text-muted">{{ $p->tanggal }}</small></td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-5">
                        <i class="bi bi-inbox fs-2 d-block mb-2 text-muted"></i>
                        Belum ada data prestasi
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
// Warna palette
const palette = [
    'rgba(26,122,80,0.85)',
    'rgba(29,78,216,0.85)',
    'rgba(194,65,12,0.85)',
    'rgba(109,40,217,0.85)',
    'rgba(5,150,105,0.85)',
    'rgba(180,83,9,0.85)',
    'rgba(15,118,110,0.85)',
];

const chartDefaults = {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
        legend: { display: false },
        tooltip: {
            backgroundColor: '#1a202c',
            titleColor: '#fff',
            bodyColor: '#cbd5e0',
            cornerRadius: 10,
            padding: 10,
        }
    },
    scales: {
        y: {
            beginAtZero: true,
            ticks: { stepSize: 1, color: '#718096', font: { size: 12 } },
            grid: { color: 'rgba(0,0,0,0.05)' }
        },
        x: {
            ticks: { color: '#718096', font: { size: 12 } },
            grid: { display: false }
        }
    }
};

// Chart Prestasi per Tingkat
const ctxTingkat = document.getElementById('chartTingkat').getContext('2d');
new Chart(ctxTingkat, {
    type: 'bar',
    data: {
        labels: {!! json_encode($prestasiPerTingkat->pluck('tingkat')) !!},
        datasets: [{
            label: 'Jumlah Prestasi',
            data: {!! json_encode($prestasiPerTingkat->pluck('total')) !!},
            backgroundColor: palette,
            borderRadius: 10,
            borderSkipped: false,
        }]
    },
    options: {
        ...chartDefaults,
        plugins: {
            ...chartDefaults.plugins,
            legend: { display: false }
        }
    }
});

// Chart Juara (Bar)
const ctxJuara = document.getElementById('chartJuara').getContext('2d');
new Chart(ctxJuara, {
    type: 'bar',
    data: {
        labels: ['Juara 1', 'Juara 2', 'Juara 3'],
        datasets: [{
            data: [{{ $juara1 }}, {{ $juara2 }}, {{ $juara3 }}],
            backgroundColor: ['rgba(183,121,31,0.85)', 'rgba(113,128,150,0.85)', 'rgba(192,86,33,0.85)'],
            borderRadius: 8,
            borderSkipped: false,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
            y: { beginAtZero: true, ticks: { stepSize: 1, color: '#718096' }, grid: { color: 'rgba(0,0,0,0.05)' } },
            x: { ticks: { color: '#718096' }, grid: { display: false } }
        }
    }
});

// Chart Prestasi per Jenis
const ctxJenis = document.getElementById('chartJenis').getContext('2d');
new Chart(ctxJenis, {
    type: 'bar',
    data: {
        labels: {!! json_encode($prestasiPerJenis->pluck('nama_jenis')) !!},
        datasets: [{
            label: 'Jumlah Prestasi',
            data: {!! json_encode($prestasiPerJenis->pluck('total')) !!},
            backgroundColor: palette.map(c => c.replace('0.85', '0.8')),
            borderRadius: 10,
            borderSkipped: false,
        }]
    },
    options: chartDefaults
});
</script>
@endsection
