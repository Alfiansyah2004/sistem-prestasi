<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Prestasi</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; font-size: 11px; color: #222; }

        .header {
            text-align: center;
            border-bottom: 3px solid #1a7a50;
            padding-bottom: 12px;
            margin-bottom: 16px;
        }
        .header h2 { font-size: 16px; color: #1a7a50; font-weight: 800; }
        .header p  { font-size: 10px; color: #666; margin-top: 3px; }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 14px;
            font-size: 10px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        thead tr {
            background: #1a7a50;
            color: white;
        }
        thead th {
            padding: 8px 10px;
            text-align: left;
            font-size: 10px;
        }
        tbody tr:nth-child(even) { background: #f0faf5; }
        tbody td {
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
            font-size: 9px;
        }
        .footer {
            margin-top: 20px;
            text-align: right;
            font-size: 10px;
            color: #888;
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

<div class="info-row">
    <span>Kelas: <strong>{{ $kelas ? $kelas->nama_kelas : 'Semua Kelas' }}</strong></span>
    <span>Tingkat: <strong>{{ $tingkat }}</strong></span>
    <span>Total Data: <strong>{{ $prestasi->count() }} prestasi</strong></span>
    <span>Dicetak: <strong>{{ $tanggal }}</strong></span>
</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Nama Lomba</th>
            <th>Jenis</th>
            <th>Tingkat</th>
            <th>Juara</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @forelse($prestasi as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->siswa->nama }}</td>
            <td>{{ $p->siswa->kelas->nama_kelas ?? '-' }}</td>
            <td>{{ $p->nama_lomba }}</td>
            <td>{{ $p->jenisPrestasi->nama_jenis }}</td>
            <td>{{ $p->tingkat }}</td>
            <td><span class="badge-juara">{{ $p->juara }}</span></td>
            <td>{{ $p->tanggal }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="8" style="text-align:center; padding: 20px; color:#999;">
                Tidak ada data prestasi
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