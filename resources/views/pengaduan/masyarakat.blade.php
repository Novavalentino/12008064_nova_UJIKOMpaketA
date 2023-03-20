@extends('layout.masyarakat')
@section('content')
    <div>
      <div>
        <div>
          <h2>Berikut adalah semua Keluh kesahmu <strong>{{ Auth::guard('masyarakat')->user()->nama }}</strong> </h2>
        </div>
      </div>
    </div>
    <table class="table table-bordered">
      <tr>
        <th>No</th>
        <th>ID Pengaduan</th>
        <th>Judul Pengaduan</th>
        <th>Tanggal Pengaduan</th>
        <th>Foto</th>
        <th>status</th>
      </tr>
      @foreach ($pengaduans as $pengaduan)
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $pengaduan->id_pengaduan }}</td>
            <td>{{ $pengaduan->judul_laporan }}</td>
            <td>{{ $pengaduan->tgl_pengaduan }}</td>
            <td>
              <img src="{{asset('storage/'.$pengaduan->foto)}}" alt="" style="width: 150px">
            </td>
            <td>
              @switch($pengaduan->status)
                  @case('0')
                      <button class="btn btn-danger">Belum Di Proses</button>
                      @break
                  @case('proses')
                      <button class="btn btn-warning">Diproses</button>
                      @break
                  @case('selesai')
                      <button class="btn btn-success">Selesai</button>
                      <button class="btn btn-success">Lihat Tanggapan?</button>
                      <button class="btn btn-danger">Hapus Pengaduan?</button>
                      @break
                  @default
                      
              @endswitch
            </td>
          </tr>
      @endforeach
    </table>
@endsection