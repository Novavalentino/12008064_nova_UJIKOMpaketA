@extends('layout.masyarakat')
@section('content')
    <div>
      <div>
        <div>
          <h2>Tuliskan Keluh Kesahmu wahai <strong>{{ Auth::guard('masyarakat')->user()->nama }}</strong></h2>
        </div>
      </div>
    </div>
    @if ($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-sm-12 col-md-12 col-xs-12">
          <div class="form-group">
            <strong>Judul Laporan</strong>
            <input type="text" class="form-control" placeholder="Masukan Judul Laporanmu" name="judul_laporan">
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-xs-12">
          <div class="form-group">
            <strong>Tanggal Pengaduan</strong>
            <input type="date" class="form-control" placeholder="Tanggal Laporan" name="tgl_pengaduan">
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-xs-12">
          <div class="form-group">
            <input type="hidden" class="form-control" name="nik" value="{{ auth::guard('masyarakat')->user()->nik }}">
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-xs-12">
          <div class="form-group">
            <strong>isi Laporan</strong>
            <textarea name="isi_laporan" id="isi_laporan" rows="4" placeholder="Isi Laporanmu" class="form-control"></textarea>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-xs-12">
          <div class="form-group">
            <strong>Foto</strong>
            <input type="file" class="form-control" placeholder="Foto" name="foto">
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-xs-12">
          <div class="form-group">
            <input type="hidden" class="form-control" name="status" value="0">
          </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12">
          <button type="submit" class="btn btn-success">Kirim</button>
        </div>
      </div>
    </form>
@endsection