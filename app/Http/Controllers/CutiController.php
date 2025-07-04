<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
{
    // TAMPILKAN SEMUA DATA CUTI
    public function index()
    {
        $cuti = Cuti::with('karyawan')->get(); 
        return view('admin.cuti.index', compact('cuti'));
    }

    // TAMPILKAN FORM CREATE CUTI UNTUK ADMIN PERUSAHAAN
    public function create()
    {
        $karyawan = Karyawan::all(); 
        return view('admin.cuti.create', compact('karyawan'));
    }

    // SIMPAN CUTI BARU (DARI ADMIN ATAU KARYAWAN)
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id'     => 'required|exists:karyawan,id',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan'          => 'required|string',
            'status'          => 'required|in:Menunggu,Disetujui,Ditolak', 
        ]);

        Cuti::create([
            'karyawan_id'     => $request->karyawan_id,
            'tanggal_mulai'   => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'alasan'          => $request->alasan,
            'status'          => $request->status, 
        ]);

        // Redirect dinamis berdasarkan role
        if (auth()->user()->role == 'karyawan') {
            return redirect()->route('dashboard.karyawan')->with('success', 'Pengajuan cuti berhasil dikirim.');
        }

        return redirect()->route('cuti.index')->with('success', 'Pengajuan cuti berhasil disimpan.');
    }

    // TAMPILKAN FORM EDIT CUTI
    public function edit($id)
    {
        $cuti = Cuti::findOrFail($id);
        $karyawan = Karyawan::all(); 
        return view('admin.cuti.edit', compact('cuti', 'karyawan'));
    }

    // UPDATE DATA CUTI
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan'          => 'required|string',
            'status'          => 'required|in:Menunggu,Disetujui,Ditolak',
        ]);

        $cuti = Cuti::findOrFail($id);
        $cuti->update([
            'tanggal_mulai'   => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'alasan'          => $request->alasan,
            'status'          => $request->status,
        ]);

        return redirect()->route('cuti.index')->with('success', 'Data cuti berhasil diperbarui.');
    }

    // HAPUS DATA CUTI
    public function destroy($id)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->delete();

        return redirect()->route('cuti.index')->with('success', 'Data cuti berhasil dihapus.');
    }

        
    public function formKaryawan()
    {
        $karyawan = Karyawan::where('email', auth()->user()->email)->firstOrFail();

        return view('karyawan.cuti.ajukan', compact('karyawan'));
    }
}
