<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\Siswa;
use App\Models\JenisPrestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index()
    {
        $data_prestasi = Prestasi::with(['siswa', 'jenisPrestasi'])->latest()->get();
        return view('prestasi.index', compact('data_prestasi'));
    }

    public function create()
    {
        $siswa        = Siswa::all();
        $jenisPrestasi = JenisPrestasi::all();
        return view('prestasi.create', compact('siswa', 'jenisPrestasi'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'siswa_id'          => 'required|exists:siswa,id',
            'jenis_prestasi_id' => 'required|exists:jenis_prestasi,id',
            'nama_lomba'        => 'required|string',
            'tingkat'           => 'required',
            'juara'             => 'required',
            'tanggal'           => 'required|date',
            'keterangan'        => 'nullable',
        ]);

        Prestasi::create($validatedData);

        return redirect()->route('prestasi.index')->with('success', 'Data prestasi berhasil dicatat!');
    }

    public function edit($id)
    {
        $prestasi      = Prestasi::findOrFail($id);
        $siswa         = Siswa::all();
        $jenisPrestasi = JenisPrestasi::all();
        return view('prestasi.edit', compact('prestasi', 'siswa', 'jenisPrestasi'));
    }

    public function update(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        $validatedData = $request->validate([
            'siswa_id'          => 'required|exists:siswa,id',
            'jenis_prestasi_id' => 'required|exists:jenis_prestasi,id',
            'nama_lomba'        => 'required|string',
            'tingkat'           => 'required',
            'juara'             => 'required',
            'tanggal'           => 'required|date',
            'keterangan'        => 'nullable',
        ]);

        $prestasi->update($validatedData);

        return redirect()->route('prestasi.index')->with('success', 'Data prestasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Prestasi::destroy($id);
        return redirect()->route('prestasi.index')->with('success', 'Data prestasi berhasil dihapus!');
    }
}
