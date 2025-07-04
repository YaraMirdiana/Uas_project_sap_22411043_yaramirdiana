@extends('layouts.app') {{-- Ganti kalau kamu pakai layout berbeda --}}

@section('content')
<div class="container">
  <h4>Form Pengajuan Cuti</h4>

  <form action="{{ route('cuti.ajukan.store') }}" method="POST">
    @csrf
    <input type="hidden" name="karyawan_id" value="{{ $karyawan->id }}">

    <div class="mb-3">
      <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
      <input type="date" name="tanggal_mulai" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
      <input type="date" name="tanggal_selesai" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="alasan" class="form-label">Alasan</label>
      <textarea name="alasan" class="form-control" rows="3" required></textarea>
    </div>

    <input type="hidden" name="status" value="Menunggu">

    <button type="submit" class="btn btn-primary">Ajukan Cuti</button>
  </form>
</div>
@endsection
