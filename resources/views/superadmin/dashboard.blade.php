<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Superadmin - PT Indah Mandiri</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #f8f9fa;
    }
    .navbar {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 999;
    }
    .sidebar {
      position: fixed;
      top: 56px;
      left: 0;
      width: 260px;
      height: calc(100vh - 56px);
      background-color: #343a40;
      color: white;
      padding-top: 20px;
    }
    .sidebar a {
      color: #ddd;
      text-decoration: none;
      padding: 12px 20px;
      display: block;
      font-size: 16px;
    }
    .sidebar a:hover,
    .sidebar .active {
      background-color: #495057;
      color: #fff;
    }
    .main {
      margin-left: 260px;
      margin-top: 56px;
      padding: 30px;
    }
  </style>
</head>
<body>

  {{-- NAVBAR BIRU --}}
  <nav class="navbar navbar-dark bg-primary shadow-sm">
    <div class="container-fluid px-4">
      <span class="navbar-brand"><i class="bi bi-building me-2"></i>PT Indah Mandiri</span>
      <div class="d-flex">
        <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm">Logout</a>
      </div>
    </div>
  </nav>

  {{-- SIDEBAR --}}
  <div class="sidebar">
    <a href="{{ route('dashboard.superadmin') }}" class="active">
      <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>
    <a href="{{ route('perusahaan.index') }}">
      <i class="bi bi-buildings me-2"></i> Kelola Perusahaan
    </a>
    <a href="{{ route('user-perusahaan.index') }}">
      <i class="bi bi-people me-2"></i> Kelola User Perusahaan
    </a>
    <a href="{{ route('profil.superadmin') }}">
      <i class="bi bi-person-circle me-2"></i> Profil
    </a>
    <a href="{{ route('logout') }}" class="text-danger">
      <i class="bi bi-box-arrow-right me-2"></i> Logout
    </a>
  </div>

  {{-- MAIN CONTENT --}}
  <div class="main">
    <div class="container-fluid">
      <p class="text-muted">Selamat datang di Dashboard Superadmin.</p>

      <div class="row g-4 mt-4">
        <div class="col-md-4">
          <div class="card shadow-sm text-center p-4">
            <i class="bi bi-buildings fs-1 text-primary"></i>
            <h5 class="mt-2">Kelola Perusahaan</h5>
            <a href="{{ route('perusahaan.index') }}" class="btn btn-outline-primary mt-3">Lihat</a>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card shadow-sm text-center p-4">
            <i class="bi bi-people fs-1 text-success"></i>
            <h5 class="mt-2">Kelola User Perusahaan</h5>
            <a href="{{ route('user-perusahaan.index') }}" class="btn btn-outline-success mt-3">Lihat</a>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card shadow-sm text-center p-4">
            <i class="bi bi-person-circle fs-1 text-secondary"></i>
            <h5 class="mt-2">Profil Saya</h5>
            <a href="{{ route('profil.superadmin') }}" class="btn btn-outline-secondary mt-3">Lihat</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
