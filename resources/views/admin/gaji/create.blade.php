<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Input Gaji</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  {{-- NAVBAR --}}
  <nav class="navbar navbar-dark bg-primary shadow-sm">
    <div class="container-fluid">
      <span class="navbar-brand">Input Gaji Karyawan</span>
      <a href="{{ route('dashboard.admin') }}" class="btn btn-outline-light btn-sm">Dashboard</a>
    </div>
  </nav>

  {{-- FORM --}}
  <div class="container mt-5">
    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('gaji.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label>Nama Karyawan</label>
        <select name="karyawan_id" class="form-select" required>
          <option value="">-- Pilih Karyawan --</option>
          @foreach($karyawan as $k)
            <option value="{{ $k->id }}">{{ $k->nama }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label>Gaji Pokok</label>
        <input type="number" name="gaji_pokok" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Tunjangan</label>
        <input type="number" name="tunjangan" class="form-control">
      </div>

      <div class="mb-3">
        <label>Potongan</label>
        <input type="number" name="potongan" class="form-control">
      </div>
    
      <div class="mb-3">
        <label>Tanggal Gaji</label>
        <input type="date" name="tanggal_gaji" class="form-control" required>
      </div>

      <div class="mb-3">
  <label>Status Pembayaran</label>
  <select name="status_pembayaran" class="form-select" required>
    <option value="belum_dibayar">Belum Dibayar</option>
    <option value="sudah_dibayar">Sudah Dibayar</option>
  </select>
</div>



      <button class="btn btn-primary">💾 Simpan Gaji</button>
    </form>
  </div>

</body>
</html>
