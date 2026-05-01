<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Menampilkan daftar semua kelas.
     */
    public function index()
    {
        $data_kelas = Kelas::all();
        return view('kelas.index', compact('data_kelas'));
    }

    /**
     * Menampilkan form untuk membuat kelas baru.
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Menyimpan data kelas baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kelas'   => 'required|string|max:255',
            'tingkat'      => 'required|string|max:255',
            'tahun_ajaran' => 'required|string|max:255',
        ]);

        Kelas::create($validatedData);

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail kelas tertentu.
     */
    public function show($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.show', compact('kelas'));
    }

    /**
     * Menampilkan form edit untuk kelas tertentu.
     */
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Memperbarui data kelas di database.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_kelas'   => 'required|string|max:255',
            'tingkat'      => 'required|string|max:255',
            'tahun_ajaran' => 'required|string|max:255',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($validatedData);

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diperbarui!');
    }

    /**
     * Menghapus data kelas dari database.
     */
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus!');
    }
}