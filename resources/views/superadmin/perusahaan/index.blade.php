<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Perusahaan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .navbar-brand {
      font-weight: bold;
    }
    .btn-logout {
      border-radius: 20px;
    }
    .table td, .table th {
      vertical-align: middle;
    }
  </style>
</head>
<body class="bg-light">

  {{-- NAVBAR --}}
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container-fluid px-4">
      <a class="navbar-brand" href="{{ route('dashboard.superadmin') }}">PT Indah Mandiri</a>

      <div class="d-flex align-items-center ms-auto">
        <span class="text-white me-3">👋 Halo, {{ auth()->user()->name }}</span>
        <a href="{{ route('dashboard.superadmin') }}" class="btn btn-light btn-sm me-2">Dashboard</a>
        <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-logout">Logout</a>
      </div>
    </div>
  </nav>

  {{-- CONTENT --}}
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="mb-0">🏢 Daftar Perusahaan</h2>
      <a href="{{ route('perusahaan.create') }}" class="btn btn-success">Tambah Perusahaan</a>
    </div>

    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped table-hover bg-white shadow-sm">
      <thead class="table-primary">
        <tr>
          <th>No</th>
          <th>Logo</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Email</th>
          <th>Telepon</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($perusahaan as $p)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
              @if ($p->logo)
                <img src="{{ asset('storage/' . $p->logo) }}" alt="Logo" width="50" height="50" class="img-thumbnail">
              @else
                <span class="text-muted">-</span>
              @endif
            </td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->alamat }}</td>
            <td>{{ $p->email }}</td>
            <td>{{ $p->telepon }}</td>
            <td>
              <a href="{{ route('perusahaan.edit', $p->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
              <form action="{{ route('perusahaan.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus perusahaan ini?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">🗑️ Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="text-center">Belum ada data perusahaan.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

</body>
</html>
