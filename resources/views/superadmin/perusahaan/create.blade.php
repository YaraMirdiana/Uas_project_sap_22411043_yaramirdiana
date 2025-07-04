<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Perusahaan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="mb-4">Tambah Perusahaan</h2>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('perusahaan.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label for="logo" class="form-label">Logo (opsional)</label>
        <input type="file" name="logo" class="form-control">
      </div>

      <div class="mb-3">
        <label>Nama Perusahaan</label>
        <input type="text" name="nama" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" rows="3" required></textarea>
      </div>

      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Nomor Telepon</label>
        <input type="text" name="telepon" class="form-control" required>
      </div>

      <div class="d-flex justify-content-between">
        <a href="{{ route('perusahaan.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">💾 Simpan</button>
      </div>
    </form>
  </div>
</body>
</html>
