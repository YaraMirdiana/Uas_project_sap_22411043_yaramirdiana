<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gaji;
use App\Models\Karyawan;

class GajiController extends Controller
{
    // TAMPILKAN DATA GAJI
    public function index()
    {
        $gaji = Gaji::with('karyawan')->get(); // Join relasi ke karyawan
        return view('admin.gaji.index', compact('gaji'));
    }

    // TAMPILKAN FORM INPUT
    public function create()
    {
        $karyawan = Karyawan::all(); // Untuk dropdown nama karyawan
        return view('admin.gaji.create', compact('karyawan'));
    }

    // SIMPAN DATA GAJI
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id'   => 'required|exists:karyawan,id',
            'gaji_pokok'    => 'required|numeric',
            'tunjangan'     => 'nullable|numeric',
            'potongan'      => 'nullable|numeric',
            'tanggal_gaji'  => 'required|date',
            'status_pembayaran' => 'required|in:sudah_dibayar,belum_dibayar',
        ]);

        $totalGaji = $request->gaji_pokok + ($request->tunjangan ?? 0) - ($request->potongan ?? 0);

        Gaji::create([
            'karyawan_id'  => $request->karyawan_id,
            'gaji_pokok'   => $request->gaji_pokok,
            'tunjangan'    => $request->tunjangan,
            'potongan'     => $request->potongan,
            'total_gaji'   => $totalGaji,
            'tanggal_gaji' => $request->tanggal_gaji,
            'status_pembayaran' => $request->status_pembayaran,
        ]);

        return redirect()->route('gaji.index')->with('success', 'Data gaji berhasil disimpan.');
    }

    // TAMPILKAN FORM EDIT
    public function edit($id)
{
    $gaji = Gaji::findOrFail($id);
    $karyawan = Karyawan::all(); // dropdown karyawan
    return view('admin.gaji.edit', compact('gaji', 'karyawan'));
}


    // UPDATE DATA GAJI
    public function update(Request $request, $id)
    {
        $request->validate([
            'karyawan_id'   => 'required|exists:karyawan,id',
            'gaji_pokok'    => 'required|numeric',
            'tunjangan'     => 'nullable|numeric',
            'potongan'      => 'nullable|numeric',
           'status_pembayaran' => 'required|in:sudah_dibayar,belum_dibayar',
        ]);

        $totalGaji = $request->gaji_pokok + ($request->tunjangan ?? 0) - ($request->potongan ?? 0);

        $gaji = Gaji::findOrFail($id);
        $gaji->update([
            'karyawan_id'  => $request->karyawan_id,
            'gaji_pokok'   => $request->gaji_pokok,
            'tunjangan'    => $request->tunjangan,
            'potongan'     => $request->potongan,
            'total_gaji'   => $totalGaji,
            'status_pembayaran' => $request->status_pembayaran,

        ]);

        return redirect()->route('gaji.index')->with('success', 'Data gaji berhasil diperbarui.');
    }

    // HAPUS DATA GAJI
    public function destroy($id)
    {
        $gaji = Gaji::findOrFail($id);
        $gaji->delete();

        return redirect()->route('gaji.index')->with('success', 'Data gaji berhasil dihapus.');
    }
}
