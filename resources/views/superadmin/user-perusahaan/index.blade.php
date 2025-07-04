<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola User Perusahaan</title>
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
      <h2 class="mb-0">👤 User Perusahaan</h2>
      <a href="{{ route('user-perusahaan.create') }}" class="btn btn-success">Tambah User</a>
    </div>

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
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($users as $user)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->nama }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->no_hp }}</td>
            <td>
              @if ($user->status === 'aktif' || $user->status == 1)
                <span class="badge bg-success">Aktif</span>
              @else
                <span class="badge bg-secondary">Nonaktif</span>
              @endif
            </td>
            <td>
              <a href="{{ route('user-perusahaan.edit', $user->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
              <form action="{{ route('user-perusahaan.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">🗑️ Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center">Belum ada data user perusahaan.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

</body>
</html>
