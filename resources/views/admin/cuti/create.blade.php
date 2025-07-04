<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Cuti Karyawan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-primary shadow-sm">
    <div class="container-fluid">
        <span class="navbar-brand mb-0">PT Indah Mandiri</span>
        <div class="d-flex">
            <a href="{{ route('cuti.index') }}" class="btn btn-outline-light btn-sm me-2">📋 Data Cuti</a>
            <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="mb-4">Form Input Cuti Karyawan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

   <form 
    action="{{ auth()->user()->role == 'karyawan' ? route('cuti.ajukan.store') : route('cuti.store') }}" 
    method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Karyawan</label>
            <select name="karyawan_id" class="form-select" required>
                <option value="">-- Pilih Karyawan --</option>
                @foreach ($karyawan as $k)
                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Alasan Cuti</label>
            <textarea name="alasan" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select" required>
                <option value="Menunggu">Menunggu</option>
                <option value="Disetujui">Disetujui</option>
                <option value="Ditolak">Ditolak</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">💾 Simpan</button>
        <a href="{{ route('cuti.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
