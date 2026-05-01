<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Prestasi;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa    = Siswa::count();
        $totalKelas    = Kelas::count();
        $totalPrestasi = Prestasi::count();

        $juara1 = Prestasi::where('juara', 'Juara 1')->count();
        $juara2 = Prestasi::where('juara', 'Juara 2')->count();
        $juara3 = Prestasi::where('juara', 'Juara 3')->count();

        $prestasiTerbaru = Prestasi::with('siswa', 'jenisPrestasi')
                            ->latest()
                            ->take(5)
                            ->get();

        $prestasiPerTingkat = Prestasi::select('tingkat', DB::raw('count(*) as total'))
                                ->groupBy('tingkat')
                                ->orderBy('total', 'desc')
                                ->get();

        $prestasiPerJenis = Prestasi::select('jenis_prestasi_id', DB::raw('count(*) as total'))
                                ->groupBy('jenis_prestasi_id')
                                ->with('jenisPrestasi')
                                ->get()
                                ->map(function ($item) {
                                    return (object)[
                                        'nama_jenis' => $item->jenisPrestasi->nama_jenis ?? 'Unknown',
                                        'total'      => $item->total,
                                    ];
                                });

        return view('dashboard', compact(
            'totalSiswa', 'totalKelas', 'totalPrestasi',
            'juara1', 'juara2', 'juara3',
            'prestasiTerbaru', 'prestasiPerTingkat', 'prestasiPerJenis'
        ));
    }
}