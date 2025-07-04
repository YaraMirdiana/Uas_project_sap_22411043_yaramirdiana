<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Cuti Karyawan</title>
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
  <h2 class="mb-3">Data Cuti Karyawan</h2>

  <a href="{{ route('cuti.create') }}" class="btn btn-primary mb-3">Tambah Cuti</a>

  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered table-striped">
    <thead class="table-primary">
      <tr>
        <th>No</th>
        <th>Nama Karyawan</th>
        <th>Tanggal Mulai</th>
        <th>Tanggal Selesai</th>
        <th>Alasan</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($cuti as $index => $c)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $c->karyawan->nama }}</td>
          <td>{{ $c->tanggal_mulai }}</td>
          <td>{{ $c->tanggal_selesai }}</td>
          <td>{{ $c->alasan }}</td>
          <td>
            @if($c->status == 'Disetujui')
              <span class="badge bg-success">Disetujui</span>
            @elseif($c->status == 'Ditolak')
              <span class="badge bg-danger">Ditolak</span>
            @else
              <span class="badge bg-warning text-dark">Menunggu</span>
            @endif
          </td>
          <td>
            <a href="{{ route('cuti.edit', $c->id) }}" class="btn btn-sm btn-primary">✏️ Edit</a>
            <form action="{{ route('cuti.destroy', $c->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">🗑️ Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="7" class="text-center">Belum ada data cuti.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

</body>
</html>
