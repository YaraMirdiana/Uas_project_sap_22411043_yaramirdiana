<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Karyawan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <style>
    body {
      margin: 0;
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
      color: white;
    }
    .main {
      margin-left: 260px;
      margin-top: 56px;
      padding: 30px;
    }
  </style>
</head>
<body>

  {{-- NAVBAR --}}
  <nav class="navbar navbar-dark bg-primary shadow-sm">
    <div class="container-fluid px-4">
      <span class="navbar-brand"><i class="bi bi-building me-2"></i>PT Indah Mandiri</span>
      <div class="d-flex align-items-center">
        @if(auth()->check())
          <span class="text-white me-3">👋 {{ auth()->user()->name }}</span>
        @endif
        <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm">Logout</a>
      </div>
    </div>
  </nav>

  {{-- SIDEBAR --}}
  <div class="sidebar">
    <a href="{{ route('dashboard.karyawan') }}" class="{{ request()->routeIs('dashboard.karyawan') ? 'active' : '' }}">
      <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>
   <a href="{{ route('cuti.ajukan') }}" class="{{ request()->routeIs('cuti.ajukan') ? 'active' : '' }}">
  <i class="bi bi-pencil-square me-2"></i> Ajukan Cuti
</a>

    <a href="{{ route('gaji.lihat') }}" class="{{ request()->routeIs('gaji.lihat') ? 'active' : '' }}">
      <i class="bi bi-cash-stack me-2"></i> Lihat Gaji
    </a>
    <a href="{{ route('profil.karyawan') }}" class="{{ request()->routeIs('profil.karyawan') ? 'active' : '' }}">
      <i class="bi bi-person-circle me-2"></i> Profil
    </a>
    <a href="{{ route('logout') }}" class="text-danger">
      <i class="bi bi-box-arrow-right me-2"></i> Logout
    </a>
  </div>

  {{-- MAIN CONTENT --}}
  <div class="main">
    <div class="container-fluid">
      <p class="text-muted">Selamat datang di Dashboard Karyawan</p>

      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card shadow-sm text-center p-4">
            <i class="bi bi-pencil-square fs-1 text-primary"></i>
            <h5 class="mt-2">Ajukan Cuti</h5>
            <a href="{{ route('cuti.ajukan') }}" class="btn btn-outline-primary mt-3">Ajukan</a>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card shadow-sm text-center p-4">
            <i class="bi bi-cash-stack fs-1 text-success"></i>
            <h5 class="mt-2">Lihat Gaji</h5>
            <a href="{{ route('gaji.lihat') }}" class="btn btn-outline-success mt-3">Lihat</a>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card shadow-sm text-center p-4">
            <i class="bi bi-person-circle fs-1 text-info"></i>
            <h5 class="mt-2">Profil</h5>
            <a href="{{ route('profil.karyawan') }}" class="btn btn-outline-info mt-3">Lihat</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
