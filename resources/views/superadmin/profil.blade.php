<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil Super Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .profile-container {
      display: flex;
      gap: 30px;
    }
    .profile-sidebar {
      width: 300px;
      background: #f0f0f0;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .profile-sidebar img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 50%;
      margin-bottom: 15px;
    }
    .profile-label {
      font-weight: bold;
    }
  </style>
</head>
<body>

  
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container-fluid px-4">
      <a class="navbar-brand" href="{{ route('dashboard.superadmin') }}">PT Indah Mandiri</a>
        <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Logout</a>
      </div>
    </div>
  </nav>


  <div class="container-fluid mt-4">
    <div class="profile-container">

      <div class="profile-sidebar">
        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Avatar">
        <h5 class="mb-1">{{ auth()->user()->name }}</h5>
        <p class="text-muted mb-2">Super Admin</p>
        <p><span class="profile-label">Email :</span><br>superadmin@gmail.com</p>
        <p><span class="profile-label">Dibuat :</span><br>01 Januari 2024</p>
         <p><span class="profile-label">No Hp :</span><br>12345678</p>
        <a href="{{ route('dashboard.superadmin') }}" class="btn btn-secondary mt-3 w-100">Kembali</a>
      </div>

      <div class="profile-main">

      </div>
    </div>
  </div>

</body>
</html>
