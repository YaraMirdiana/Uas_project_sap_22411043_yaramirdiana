<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit User Perusahaan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container py-5">
    <h2 class="mb-4">Edit User Perusahaan</h2>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('user-perusahaan.update', $user->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label>Nama User</label>
        <input type="text" name="nama" value="{{ $user->nama }}" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Password (Biarkan kosong jika tidak ingin mengubah)</label>
        <input type="password" name="password" class="form-control">
      </div>

      <div class="mb-3">
        <label>Nomor HP</label>
        <input type="text" name="no_hp" value="{{ $user->no_hp }}" class="form-control" required>
      </div>

     <div class="mb-3">
  <label>Status</label>
  <select name="status" class="form-control" required>
    <option value="aktif" {{ $user->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
    <option value="nonaktif" {{ $user->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
  </select>
</div>

      <button type="submit" class="btn btn-primary">🔄 Update</button>
      <a href="{{ route('user-perusahaan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>

</body>
</html>
