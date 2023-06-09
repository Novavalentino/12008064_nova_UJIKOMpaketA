@extends('layout.petugas')
@section('content')
<div>
  <div>
    <div>
      <h2>Berikut adalah semua Keluh kesah Masyarakat wahai <strong>{{ Auth::guard('petugas')->user()->nama_petugas }}</strong> </h2>
    </div>
    
  </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
@endif
<table class="table table-bordered">
  <tr>
    <th>No</th>
    <th>ID Pengaduan</th>
    <th>Judul Laporan</th>
    <th>Tanggal Pengaduan</th>
    <th>NIK Pengadu</th>
    <th>Foto</th>
    <th>Status</th>
  </tr>
  @foreach ($pengaduans as $pengaduan)
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $pengaduan->id_pengaduan }}</td>
        <td>{{ $pengaduan->judul_laporan }}</td>
        <td>{{ $pengaduan->tgl_pengaduan }}</td>
        <td>{{ $pengaduan->nik }}</td>
        <td>
          <img src="{{ asset('storage/'. $pengaduan->foto) }}" alt="" style="width: 150px">
        </td>
        <td>
          @switch($pengaduan->status)
            @case('0')
              <form action="{{ route('pengaduan.proses', $pengaduan->id_pengaduan) }}" method="POST">
                @csrf @method('PUT')
                <button class="btn btn-danger" type="submit">Menunggu</button>
              </form>
              @break
            @case('proses')
              {{-- <form href="{{ route(tanggapan.create) }}" method="POST">
                @csrf @method('GET')
                <button class="btn btn-warning">Tanggapi</button>
              </form> --}}
                <a href="{{ route('pengaduan.createtanggapan', $pengaduan->id_pengaduan) }}" class="btn btn-warning" method="">Tanggapi</a>
              @break
            @case('selesai')
                <a href="{{ route('tanggapan.show', $pengaduan->id_pengaduan) }}" class="btn btn-primary">Lihat Tanggapan</a>
              @break
            @default
              
          @endswitch
        </td>
      </tr>
  @endforeach

</table>
@endsection