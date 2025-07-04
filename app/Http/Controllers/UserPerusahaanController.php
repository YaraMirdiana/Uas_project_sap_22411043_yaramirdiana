<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPerusahaan;

class UserPerusahaanController extends Controller
{
    public function index()
    {
        $users = UserPerusahaan::all();
        return view('superadmin.user-perusahaan.index', compact('users'));
    }

    public function create()
    {
        return view('superadmin.user-perusahaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'required|email|unique:user_perusahaan,email',
            'password' => 'required|string|min:6',
            'no_hp'    => 'required|string|max:20',
            'status'   => 'required|in:aktif,nonaktif',
        ]);

        $data = $request->only(['nama', 'email', 'password', 'no_hp', 'status']);
        $data['password'] = bcrypt($data['password']);

        UserPerusahaan::create($data);

        return redirect()->route('user-perusahaan.index')->with('success', 'User perusahaan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = UserPerusahaan::findOrFail($id);
        return view('superadmin.user-perusahaan.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = UserPerusahaan::findOrFail($id);

        $request->validate([
            'nama'     => 'required|string|max:255',
            'email'    => 'required|email|unique:user_perusahaan,email,' . $id,
            'no_hp'    => 'required|string|max:20',
            'status'   => 'required|in:aktif,nonaktif',
        ]);

        $data = $request->only(['nama', 'email', 'no_hp', 'status']);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('user-perusahaan.index')->with('success', 'User perusahaan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = UserPerusahaan::findOrFail($id);
        $user->delete();

        return redirect()->route('user-perusahaan.index')->with('success', 'User perusahaan berhasil dihapus.');
    }
}
