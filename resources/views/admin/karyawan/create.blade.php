<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Karyawan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  {{-- NAVBAR --}}
  <nav class="navbar navbar-dark bg-primary shadow-sm">
    <div class="container-fluid">
      <span class="navbar-brand mb-0">PT Indah Mandiri</span>
      <div class="d-flex">
        <a href="{{ route('karyawan.index') }}" class="btn btn-outline-light btn-sm me-2">📋 Data Karyawan</a>
        <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Logout</a>
      </div>
    </div>
  </nav>

  {{-- FORM TAMBAH --}}
  <div class="container mt-5">
    <h2 class="mb-4">Tambah Data Karyawan</h2>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('karyawan.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>No HP</label>
        <input type="text" name="no_hp" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Jabatan</label>
        <input type="text" name="jabatan" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" rows="3" required></textarea>
      </div>

      <div class="mb-3">
        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-select" required>
          <option value="aktif">Aktif</option>
          <option value="nonaktif">Nonaktif</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">💾 Simpan</button>
      <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>

</body>
</html>
