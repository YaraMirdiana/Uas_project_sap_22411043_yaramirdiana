<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Gaji Karyawan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

{{-- NAVBAR --}}
<nav class="navbar navbar-dark bg-primary shadow-sm">
  <div class="container-fluid">
    <span class="navbar-brand mb-0">PT Indah Mandiri</span>
    <div class="d-flex">
      <a href="{{ route('dashboard.admin') }}" class="btn btn-outline-light btn-sm me-2">Dashboard</a>
      <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Logout</a>
    </div>
  </div>
</nav>

{{-- KONTEN UTAMA --}}
<div class="container mt-5">
  <h2 class="mb-3">Data Gaji Karyawan</h2>

  <a href="{{ route('gaji.create') }}" class="btn btn-success mb-3">Input Gaji</a>

  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered table-striped table-hover bg-white shadow-sm">
    <thead class="table-primary">
      <tr>
        <th>No</th>
        <th>Nama Karyawan</th>
        <th>Gaji Pokok</th>
        <th>Tunjangan</th>
        <th>Potongan</th>
        <th>Total Gaji</th>
        <th>Tanggal Gaji</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($gaji as $index => $g)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $g->karyawan->nama }}</td>
          <td>Rp {{ number_format($g->gaji_pokok, 0, ',', '.') }}</td>
          <td>Rp {{ number_format($g->tunjangan ?? 0, 0, ',', '.') }}</td>
          <td>Rp {{ number_format($g->potongan ?? 0, 0, ',', '.') }}</td>
          <td><strong>Rp {{ number_format($g->total_gaji, 0, ',', '.') }}</strong></td>
          <td>{{ \Carbon\Carbon::parse($g->tanggal_gaji)->translatedFormat('d F Y') }}</td>
          <td>
            @if($g->status_pembayaran == 'sudah_dibayar')
              <span class="badge bg-success">Sudah Dibayar</span>
            @else
              <span class="badge bg-warning text-dark">Belum Dibayar</span>
            @endif
          </td>
          <td>
            <a href="{{ route('gaji.edit', $g->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
            <form action="{{ route('gaji.destroy', $g->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">🗑️ Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="9" class="text-center">Belum ada data gaji.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

</body>
</html>
