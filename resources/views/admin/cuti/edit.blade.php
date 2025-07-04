<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Status Cuti</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  {{-- NAVBAR --}}
  <nav class="navbar navbar-dark bg-primary shadow-sm">
    <div class="container-fluid">
      <span class="navbar-brand">Edit Status Cuti</span>
      <a href="{{ route('cuti.index') }}" class="btn btn-outline-light btn-sm">Kembali</a>
    </div>
  </nav>

  {{-- FORM --}}
  <div class="container mt-5">
    <h3 class="mb-4">Edit Status Pengajuan Cuti</h3>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('cuti.update', $cuti->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label>Nama Karyawan</label>
        <input type="text" class="form-control bg-light" value="{{ $cuti->karyawan->nama }}" disabled>
      </div>

      <div class="mb-3">
        <label>Tanggal Mulai</label>
        <input type="date" class="form-control bg-light" value="{{ $cuti->tanggal_mulai }}" disabled>
        <input type="hidden" name="tanggal_mulai" value="{{ $cuti->tanggal_mulai }}">
      </div>

      <div class="mb-3">
        <label>Tanggal Selesai</label>
        <input type="date" class="form-control bg-light" value="{{ $cuti->tanggal_selesai }}" disabled>
        <input type="hidden" name="tanggal_selesai" value="{{ $cuti->tanggal_selesai }}">
      </div>

      <div class="mb-3">
        <label>Alasan</label>
        <textarea class="form-control bg-light" rows="3" disabled>{{ $cuti->alasan }}</textarea>
        <input type="hidden" name="alasan" value="{{ $cuti->alasan }}">
      </div>

      <div class="mb-3">
        <label>Status Cuti</label>
        <select name="status" class="form-select" required>
          <option value="Menunggu" {{ $cuti->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
          <option value="Disetujui" {{ $cuti->status == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
          <option value="Ditolak" {{ $cuti->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
      <a href="{{ route('cuti.index') }}" class="btn btn-secondary">Batal</a>
    </form>
  </div>

</body>
</html>
