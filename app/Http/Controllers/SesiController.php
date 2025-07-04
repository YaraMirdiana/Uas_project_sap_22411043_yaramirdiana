<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    // Halaman login hanya tampil jika belum login
    function index()
    {
        // Cek jika user sudah login, redirect ke dashboard sesuai role
        if (Auth::check()) {
            $role = Auth::user()->role;
            if ($role === 'superadmin') {
                return redirect()->route('dashboard.superadmin');
            } elseif ($role === 'adminperusahaan') {
                return redirect()->route('dashboard.admin');
            } elseif ($role === 'karyawan') {
                return redirect()->route('dashboard.karyawan');
            }
        }

        // Kalau belum login, tampilkan halaman login
        return view('login');
    }

    // Proses login
    function login(Request $request)
    {
        $request->validate([
            'email'    => 'required',
            'password' => 'required'
        ], [
            'email.required'    => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            if ($role === 'superadmin') {
                return redirect()->route('dashboard.superadmin');
            } elseif ($role === 'adminperusahaan') {
                return redirect()->route('dashboard.admin');
            } elseif ($role === 'karyawan') {
                return redirect()->route('dashboard.karyawan');
            }
        }

        // Jika gagal login
        return redirect()->route('login')->withErrors('Email atau password tidak sesuai')->withInput();
    }

    // Logout
    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
