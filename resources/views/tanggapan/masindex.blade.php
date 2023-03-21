@extends('layout.masyarakat')
@section('content')
    <div class="row mt-5">
      <div class="col-lg-12 margin-top">
        <div class="float-start">
          <h2>Berikut adalah semua data Tanggapan wahai <strong>{{ Auth::guard('masyarakat')->user()->nama }}</strong> </h2>
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
        <th>Judul Pengaduan</th>
        <th>Tanggal Tanggapan</th>
        <th>Isi Tanggapan</th>
        <th>ID Petugas</th>

      </tr>
      @foreach ($tanggapans as $tanggapan)
          <tr>
            <td>{{ ++$i}}</td>
            <td>{{ $tanggapan->judul_laporan }}</td>
            <td>{{ $tanggapan->tgl_tanggapan }}</td>
            <td>{{ $tanggapan->tanggapan }}</td>
            <td>{{ $tanggapan->id_petugas }}</td>
          </tr>
      @endforeach
    </table>
@endsection