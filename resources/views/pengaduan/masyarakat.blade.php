@extends('layout.masyarakat')
@section('content')
    <div class="row mt-5">
      <div class="col-lg-12 margin-top">
        <div class="float-end">
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
                      <form action="{{ route('pengaduan.destroy', $pengaduan->id_pengaduan) }}" method="post">
                        <a class="btn btn-info" href="{{ route('tanggapan.show', $pengaduan->id_pengaduan) }}">Lihat Tangapan?</a>
                        @csrf @method('DELETE')
                        <button class="btn btn-danger">Hapus Pengaduan?</button>
                      </form>
                      
                      @break
                  @default
                      
              @endswitch
            </td>
          </tr>
      @endforeach
    </table>
@endsection