<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    // Menampilkan daftar karyawan
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('admin.karyawan.index', compact('karyawan'));
    }

    // Menampilkan form tambah karyawan
    public function create()
    {
        return view('admin.karyawan.create');
    }

    // Menyimpan data karyawan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama'           => 'required|string|max:255',
            'email'          => 'required|email|unique:karyawan,email',
            'no_hp'          => 'required|string|max:20',
            'jabatan'        => 'required|string|max:100',
            'alamat'         => 'required|string',
            'tanggal_masuk'  => 'required|date',
            'status'         => 'required|in:aktif,nonaktif',
        ]);

        Karyawan::create([
            'nama'           => $request->nama,
            'email'          => $request->email,
            'no_hp'          => $request->no_hp,
            'jabatan'        => $request->jabatan,
            'alamat'         => $request->alamat,
            'tanggal_masuk'  => $request->tanggal_masuk,
            'status'         => $request->status,
        ]);

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan.');
    }

    // Menampilkan form edit karyawan
    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('admin.karyawan.edit', compact('karyawan'));
    }

    // Memperbarui data karyawan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'           => 'required|string|max:255',
            'email'          => 'required|email|unique:karyawan,email,' . $id,
            'no_hp'          => 'required|string|max:20',
            'jabatan'        => 'required|string|max:100',
            'alamat'         => 'required|string',
            'tanggal_masuk'  => 'required|date',
            'status'         => 'required|in:aktif,nonaktif',
        ]);

        $karyawan = Karyawan::findOrFail($id);

        $karyawan->update([
            'nama'           => $request->nama,
            'email'          => $request->email,
            'no_hp'          => $request->no_hp,
            'jabatan'        => $request->jabatan,
            'alamat'         => $request->alamat,
            'tanggal_masuk'  => $request->tanggal_masuk,
            'status'         => $request->status,
        ]);

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diperbarui.');
    }

    // Menghapus data karyawan
    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus.');
    }
}
