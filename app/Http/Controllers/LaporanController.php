<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        $prestasi = Prestasi::with('siswa.kelas', 'jenisPrestasi')->orderBy('tanggal', 'desc')->get();
        $kelas    = Kelas::all();
        $siswa    = Siswa::all();
        return view('laporan.index', compact('prestasi', 'kelas', 'siswa'));
    }

    public function exportPdf(Request $request)
    {
        $query = Prestasi::with('siswa.kelas', 'jenisPrestasi')->orderBy('tanggal', 'desc');

        if ($request->kelas_id) {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('kelas_id', $request->kelas_id);
            });
        }

        if ($request->tingkat) {
            $query->where('tingkat', $request->tingkat);
        }

        $prestasi = $query->get();
        $kelas    = $request->kelas_id ? Kelas::find($request->kelas_id) : null;
        $tingkat  = $request->tingkat ?? 'Semua';
        $tanggal  = now()->format('d F Y');

        $pdf = Pdf::loadView('laporan.pdf', compact('prestasi', 'kelas', 'tingkat', 'tanggal'))
                  ->setPaper('a4', 'landscape');

        return $pdf->download('Laporan-Prestasi-' . now()->format('d-m-Y') . '.pdf');
    }

    public function exportSiswaPdf($id)
    {
        $siswa   = Siswa::with('kelas', 'prestasi.jenisPrestasi')->findOrFail($id);
        $tanggal = now()->format('d F Y');

        $pdf = Pdf::loadView('laporan.siswa-pdf', compact('siswa', 'tanggal'))
                  ->setPaper('a4', 'portrait');

        return $pdf->download('Laporan-Prestasi-' . $siswa->nama . '.pdf');
    }
}
