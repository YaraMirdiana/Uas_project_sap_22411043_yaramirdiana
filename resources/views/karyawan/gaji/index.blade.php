@extends('layouts.app') 

@section('content')
<div class="container">
  <h4 class="mb-4">Daftar Gaji Anda - {{ $karyawan->nama }}</h4>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @if($gaji->isEmpty())
    <div class="alert alert-info">Belum ada data gaji yang tersedia.</div>
  @else
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="table-primary">
          <tr>
            <th>No</th>
            <th>Bulan / Tanggal</th>
            <th>Gaji Pokok</th>
            <th>Tunjangan</th>
            <th>Potongan</th>
            <th>Total Gaji</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach($gaji as $index => $item)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ \Carbon\Carbon::parse($item->tanggal_gaji)->translatedFormat('F Y') }}</td>
              <td>Rp{{ number_format($item->gaji_pokok, 0, ',', '.') }}</td>
              <td>Rp{{ number_format($item->tunjangan ?? 0, 0, ',', '.') }}</td>
              <td>Rp{{ number_format($item->potongan ?? 0, 0, ',', '.') }}</td>
              <td><strong>Rp{{ number_format($item->total_gaji, 0, ',', '.') }}</strong></td>
              <td>
                @if($item->status == 'Sudah Dibayar')
                  <span class="badge bg-success">Dibayar</span>
                @else
                  <span class="badge bg-warning text-dark">Belum Dibayar</span>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif
</div>
@endsection
