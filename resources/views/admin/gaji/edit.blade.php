<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Gaji Karyawan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  {{-- NAVBAR --}}
  <nav class="navbar navbar-dark bg-primary shadow-sm">
    <div class="container-fluid">
      <span class="navbar-brand mb-0">PT Indah Mandiri</span>
      <div class="d-flex">
        <a href="{{ route('gaji.index') }}" class="btn btn-outline-light btn-sm me-2">💰 Data Gaji</a>
        <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Logout</a>
      </div>
    </div>
  </nav>

  {{-- FORM --}}
  <div class="container mt-5">
    <h2 class="mb-4">Edit Data Gaji Karyawan</h2>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('gaji.update', $gaji->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label>Nama Karyawan</label>
        <select name="karyawan_id" class="form-select" required>
          <option value="">-- Pilih Karyawan --</option>
          @foreach ($karyawan as $k)
            <option value="{{ $k->id }}" {{ $gaji->karyawan_id == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label>Gaji Pokok</label>
        <input type="number" name="gaji_pokok" class="form-control" value="{{ $gaji->gaji_pokok }}" required>
      </div>

      <div class="mb-3">
        <label>Tunjangan (Opsional)</label>
        <input type="number" name="tunjangan" class="form-control" value="{{ $gaji->tunjangan ?? 0 }}">
      </div>

      <div class="mb-3">
        <label>Potongan (Opsional)</label>
        <input type="number" name="potongan" class="form-control" value="{{ $gaji->potongan ?? 0 }}">
      </div>

      <div class="mb-3">
        <label>Total Gaji (otomatis dihitung saat simpan)</label>
        <input type="text" class="form-control bg-light" value="Rp {{ number_format($gaji->total_gaji, 0, ',', '.') }}" disabled>
      </div>

    <select name="status_pembayaran" class="form-select" required>
  <option value="belum_dibayar" {{ $gaji->status_pembayaran == 'belum_dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
  <option value="sudah_dibayar" {{ $gaji->status_pembayaran == 'sudah_dibayar' ? 'selected' : '' }}>Sudah Dibayar</option>
</select>


      <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
      <a href="{{ route('gaji.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>

</body>
</html>
