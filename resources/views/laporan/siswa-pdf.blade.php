<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Prestasi - {{ $siswa->nama }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; font-size: 11px; color: #222; }

        .header {
            text-align: center;
            border-bottom: 3px solid #1a7a50;
            padding-bottom: 12px;
            margin-bottom: 20px;
        }
        .header h2 { font-size: 16px; color: #1a7a50; font-weight: 800; }
        .header p  { font-size: 10px; color: #666; margin-top: 3px; }

        .siswa-info {
            background: #f0faf5;
            border-left: 4px solid #1a7a50;
            padding: 12px 16px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .siswa-info table { width: 100%; }
        .siswa-info td { padding: 3px 8px; font-size: 11px; }
        .siswa-info td:first-child { font-weight: 700; width: 130px; color: #1a7a50; }

        table.prestasi-table {
            width: 100%;
            border-collapse: collapse;
        }
        table.prestasi-table thead tr {
            background: #1a7a50;
            color: white;
        }
        table.prestasi-table thead th {
            padding: 8px 10px;
            text-align: left;
            font-size: 10px;
        }
        table.prestasi-table tbody tr:nth-child(even) { background: #f0faf5; }
        table.prestasi-table tbody td {
            padding: 7px 10px;
            border-bottom: 1px solid #e0e0e0;
            font-size: 10px;
        }
        .badge-juara {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 10px;
            background: #fef3c7;
            color: #92400e;
            font-weight: 700;
        }
        .ttd {
            margin-top: 40px;
            text-align: right;
        }
        .ttd p { font-size: 10px; }
        .ttd .nama { margin-top: 50px; font-weight: 700; border-top: 1px solid #333; display: inline-block; padding-top: 4px; }
    </style>
</head>
<body>

<div class="header">
    <h2>LAPORAN PRESTASI SISWA</h2>
    <p>Madrasah Aliyah — Sistem Informasi Prestasi Siswa</p>
</div>

<div class="siswa-info">
    <table>
        <tr><td>Nama Siswa</td><td>: {{ $siswa->nama }}</td></tr>
        <tr><td>NIS</td><td>: {{ $siswa->nis }}</td></tr>
        <tr><td>Kelas</td><td>: {{ $siswa->kelas->nama_kelas ?? '-' }}</td></tr>
        <tr><td>Jenis Kelamin</td><td>: {{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td></tr>
        <tr><td>Tempat, Tgl Lahir</td><td>: {{ $siswa->tempat_lahir }}, {{ $siswa->tanggal_lahir }}</td></tr>
        <tr><td>Total Prestasi</td><td>: {{ $siswa->prestasi->count() }} prestasi</td></tr>
        <tr><td>Dicetak</td><td>: {{ $tanggal }}</td></tr>
    </table>
</div>

<table class="prestasi-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Lomba</th>
            <th>Jenis Prestasi</th>
            <th>Tingkat</th>
            <th>Juara</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @forelse($siswa->prestasi as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->nama_lomba }}</td>
            <td>{{ $p->jenisPrestasi->nama_jenis }}</td>
            <td>{{ $p->tingkat }}</td>
            <td><span class="badge-juara">{{ $p->juara }}</span></td>
            <td>{{ $p->tanggal }}</td>
            <td>{{ $p->keterangan ?? '-' }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="7" style="text-align:center; padding:20px; color:#999;">
                Belum ada data prestasi
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="ttd">
    <p>Dicetak pada {{ $tanggal }}</p>
    <br>
    <p>Mengetahui,</p>
    <p>Kepala Madrasah Aliyah</p>
    <p class="nama">(_______________________)</p>
</div>

</body>
</html>