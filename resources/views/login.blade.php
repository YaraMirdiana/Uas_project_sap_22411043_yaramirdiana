<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login | PT Indah Mandiri</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: url('{{ asset('image/perusahaan.jpg') }}') no-repeat center center fixed;
      background-size: cover;
    }

    .overlay {
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background-color: rgba(0, 0, 0, 0.6);
      z-index: 0;
    }

    .login-wrapper {
      position: relative;
      z-index: 2;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 30px;
    }

    .login-card {
      background-color: rgba(216, 214, 214, 0.97);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.3);
      width: 100%;
      max-width: 600px;
    }

    .company-header {
      text-align: center;
      color: #fff;
      margin-bottom: 30px;
    }

    .company-header img {
      width: 80px;
    }

    .company-header h1 {
      margin-top: 10px;
      font-weight: 700;
    }

    .company-footer {
      color: #ddd;
      text-align: center;
      margin-top: 40px;
      font-size: 14px;
    }

    .btn-login {
      border-radius: 30px;
    }
  </style>
</head>
<body>

  <div class="overlay"></div>

  <div class="login-wrapper">

    {{-- Informasi Atas: Logo dan Nama Perusahaan --}}
    <div class="company-header">
      <h1>PT Indah Mandiri</h1>
      <p>Solusi Manajemen SDM Profesional untuk Masa Depan Perusahaan Anda.</p>
    </div>

    {{-- Form Login --}}
    <div class="login-card">
      <h4 class="text-center text-dark mb-4">Masuk ke Sistem</h4>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $item)
              <li>{{ $item }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="" method="POST">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" value="{{ old('email') }}" class="form-control" required placeholder="contoh@email.com">
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required placeholder="Masukkan password">
        </div>

        <div class="d-grid mt-4">
          <button type="submit" class="btn btn-secondary btn-login">Login</button>
        </div>
      </form>
    </div>

    {{-- Informasi Bawah --}}
    <div class="company-footer mt-5">
      <p>Alamat : Kedaton, Bandar Lampung, Lampung</p>
      <p>Email : ptindahmandiri@gmail.com | Telp: (021) 1234567</p>
      <p>Ikuti kami di :
        <a href="#" class="text-light text-decoration-none">Instagram</a> |
        <a href="#" class="text-light text-decoration-none">LinkedIn</a> |
        <a href="#" class="text-light text-decoration-none">Facebook</a>
      </p>
    </div>
  </div>

</body>
</html>
