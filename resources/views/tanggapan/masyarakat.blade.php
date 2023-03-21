@extends('layout.tanggapan')
@section('content')
    <div class="row mt-5">
      <div class="col-lg-12 margin-top">
        <div class="float-end">
          <h2>Berikut Tanggapan dari laporan <strong>{{ $pengaduan->judul_laporan }}</strong> </h2>
        </div>
        <div>
          <a class="btn btn-primary" href="{{ route('pengaduan.indexmas') }}">Kembali?</a>
          <a target="_blank" href="{{ route('tanggapan.adminshow', $pengaduan->id_pengaduan) }}" class="btn btn-success">Cetak </a>
        </div>
      </div>
    </div>
    <table class="table table-bordered">
      <tr>
        <th width="150px">Tanggal Tanggapan</th>
        <th >Isi Tanggapan</th>
        <th>ID Petugas</th>
      </tr>
      <tr>
        <td>{{ $tanggapan->tgl_tanggapan }}</td>
        <td>{{ $tanggapan->tanggapan }}</td>
        <td>{{ $tanggapan->id_petugas }}</td>
      </tr>
    </table>
@endsection