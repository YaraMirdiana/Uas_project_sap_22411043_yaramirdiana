@extends('layouts.app')

@section('title', 'Edit Perusahaan')

@section('content')
<h2 class="mb-4">Edit Perusahaan</h2>

<form action="{{ route('perusahaan.update', $perusahaan->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>Logo Sekarang</label><br>
        @if ($perusahaan->logo)
            <img src="{{ asset('storage/' . $perusahaan->logo) }}" width="80"><br>
        @else
            <span class="text-muted">Tidak ada logo</span><br>
        @endif

        <label class="mt-2">Ganti Logo (opsional)</label>
        <input type="file" name="logo" class="form-control">
    </div>

    <div class="mb-3">
        <label>Nama Perusahaan</label>
        <input type="text" name="nama" class="form-control" value="{{ $perusahaan->nama }}" required>
    </div>

    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" rows="3" required>{{ $perusahaan->alamat }}</textarea>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $perusahaan->email }}" required>
    </div>

    <div class="mb-3">
        <label>Nomor Telepon</label>
        <input type="text" name="telepon" class="form-control" value="{{ $perusahaan->telepon }}" required>
    </div>

    <button class="btn btn-primary">🔄 Update</button>
    <a href="{{ route('perusahaan.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
