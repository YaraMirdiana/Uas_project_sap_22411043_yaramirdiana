@extends('layouts.app')

@section('content')
<div class="container">
  <h4 class="mb-4">Form Pengajuan Cuti</h4>

  {{-- Tampilkan Nama Karyawan --}}
  <p><strong>Nama:</strong> {{ $karyawan->nama }}</p>

  {{-- Pesan sukses jika ada --}}
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  {{-- Tampilkan error validasi --}}
  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('cuti.ajukan.store') }}" method="POST">
    @csrf
    <input type="hidden" name="karyawan_id" value="{{ $karyawan->id }}">
    <input type="hidden" name="status" value="Menunggu"> {{-- penting untuk validasi dan default --}}

    <div class="mb-3">
      <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
      <input type="date" name="tanggal_mulai" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
      <input type="date" name="tanggal_selesai" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="alasan" class="form-label">Alasan Cuti</label>
      <textarea name="alasan" class="form-control" rows="3" required></textarea>
    </div>

    <div class="d-grid">
      <button type="submit" class="btn btn-secondary">Ajukan Cuti</button>
    </div>
  </form>
</div>
@endsection
