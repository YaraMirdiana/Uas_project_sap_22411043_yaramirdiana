<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin Perusahaan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & Bootstrap Icons -->
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

  {{-- NAVBAR ATAS --}}
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
    <a href="{{ route('dashboard.admin') }}" class="active">
      <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>
    <a href="{{ route('karyawan.index') }}">
      <i class="bi bi-people-fill me-2"></i> Kelola Karyawan
    </a>
    <a href="{{ route('gaji.index') }}">
      <i class="bi bi-cash-stack me-2"></i> Kelola Gaji
    </a>
    <a href="{{ route('cuti.index') }}">
      <i class="bi bi-calendar-check me-2"></i> Kelola Cuti
    </a>
    <a href="{{ route('profil.admin') }}">
      <i class="bi bi-person-circle me-2"></i> Profil
    </a>
    <a href="{{ route('logout') }}" class="text-danger">
      <i class="bi bi-box-arrow-right me-2"></i> Logout
    </a>
  </div>

  {{-- MAIN CONTENT --}}
  <div class="main">
    <div class="container-fluid">
      <p class="text-muted">Selamat datang, Pt Indofood</p>

      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card shadow-sm text-center p-4">
            <i class="bi bi-people-fill fs-1 text-primary"></i>
            <h5 class="mt-2">Kelola Karyawan</h5>
            <a href="{{ route('karyawan.index') }}" class="btn btn-outline-primary mt-3">Lihat</a>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card shadow-sm text-center p-4">
            <i class="bi bi-cash-stack fs-1 text-success"></i>
            <h5 class="mt-2">Kelola Gaji</h5>
            <a href="{{ route('gaji.index') }}" class="btn btn-outline-success mt-3">Lihat</a>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card shadow-sm text-center p-4">
            <i class="bi bi-calendar-check fs-1 text-warning"></i>
            <h5 class="mt-2">Kelola Cuti</h5>
            <a href="{{ route('cuti.index') }}" class="btn btn-outline-warning mt-3">Lihat</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
