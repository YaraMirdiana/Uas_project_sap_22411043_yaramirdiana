<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Karyawan</title>
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
  <h2 class="mb-3">📋 Daftar Karyawan</h2>

  <a href="{{ route('karyawan.create') }}" class="btn btn-success mb-3">Tambah Karyawan</a>

  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered table-striped table-hover bg-white shadow-sm">
    <thead class="table-primary">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>No HP</th>
        <th>Jabatan</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($karyawan as $k)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $k->nama }}</td>
          <td>{{ $k->email }}</td>
          <td>{{ $k->no_hp }}</td>
          <td>{{ $k->jabatan }}</td>
          <td>
            @if ($k->status === 'aktif')
              <span class="badge bg-success">Aktif</span>
            @else
              <span class="badge bg-secondary">Nonaktif</span>
            @endif
          </td>
          <td>
            <a href="{{ route('karyawan.edit', $k->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
            <form action="{{ route('karyawan.destroy', $k->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm">🗑️ Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="7" class="text-center">Belum ada data karyawan.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

</body>
</html>
