<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $data_siswa = Siswa::with('kelas')->get();
        return view('siswa.index', compact('data_siswa'));
    }

    public function create()
    {
        $data_kelas = Kelas::all();
        return view('siswa.create', compact('data_kelas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis'           => 'required|unique:siswa,nis',
            'nama'          => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat'        => 'required',
            'kelas_id'      => 'required|exists:kelas,id',
            'foto'          => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('post-foto-siswa', 'public');
        }

        Siswa::create($validatedData);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function show($id)
    {
        $siswa = Siswa::with(['kelas', 'prestasi.jenisPrestasi'])->findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa      = Siswa::findOrFail($id);
        $data_kelas = Kelas::all();
        return view('siswa.edit', compact('siswa', 'data_kelas'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $validatedData = $request->validate([
            'nis'           => 'required|unique:siswa,nis,' . $id,
            'nama'          => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat'        => 'required',
            'kelas_id'      => 'required|exists:kelas,id',
            'foto'          => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($siswa->foto) {
                Storage::disk('public')->delete($siswa->foto);
            }
            $validatedData['foto'] = $request->file('foto')->store('post-foto-siswa', 'public');
        }

        $siswa->update($validatedData);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        if ($siswa->foto) {
            Storage::disk('public')->delete($siswa->foto);
        }
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus!');
    }
}
