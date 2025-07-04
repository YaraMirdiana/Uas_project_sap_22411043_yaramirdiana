<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Karyawan;
use App\Models\Gaji;

class DashboardController extends Controller
{
    // Arahkan user ke dashboard sesuai role
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'superadmin') {
            return redirect()->route('dashboard.superadmin');
        } elseif ($user->role === 'adminperusahaan') {
            return redirect()->route('dashboard.admin');
        } elseif ($user->role === 'karyawan') {
            return redirect()->route('dashboard.karyawan');
        }

        return abort(403, 'Role tidak dikenali.');
    }

    // DASHBOARD SUPERADMIN
    public function superadmin()
    {
        $user = Auth::user();
        return view('superadmin.dashboard', compact('user'));
    }

    // DASHBOARD ADMIN PERUSAHAAN
    public function admin()
    {
        $user = auth()->user(); 
        return view('admin.dashboard', compact('user'));
    }

    // DASHBOARD KARYAWAN
    public function karyawan()
    {
        $user = Auth::user();
        return view('karyawan.dashboard', compact('user'));
    }

    // PROFIL SUPERADMIN
    public function profilSuperadmin()
    {
        return view('superadmin.profil');
    }

    // PROFIL ADMIN PERUSAHAAN
    public function profilAdmin()
    {
        return view('admin.profil');
    }

    // PROFIL KARYAWAN
    public function profilKaryawan()
    {
        return view('karyawan.profil');
    }

    // FITUR LIHAT GAJI UNTUK KARYAWAN
    public function lihatGaji()
    {
        $karyawan = Karyawan::where('email', auth()->user()->email)->firstOrFail();
        $gaji = Gaji::where('karyawan_id', $karyawan->id)->get();

        return view('karyawan.gaji.index', compact('gaji', 'karyawan'));
    }
}
