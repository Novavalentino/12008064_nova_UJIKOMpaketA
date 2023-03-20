@extends('layout.petugas')
@section('content')
    <div class="row mt-5">
      <div class="col-lg-12 margin=top">
        <div class="float-start">
          <h2>Apa tanggapanmu wahai <strong>{{ Auth::guard('petugas')->user()->nama_petugas }}</strong> </h2>
        </div>
      </div>
    </div>
    @if ($errors->any())
      <div class="alert alert-danger">
          <strong>Maaf</strong> Ada Kesalahan dengan inputanmu <br> <br>
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
          </ul>
      </div>
    @endif
    <form action="{{ route('tanggapan.store') }}" method="POST">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-xs-12">
          <div class="form-group">
            {{-- <input type="hidden" class="form-control" name="id_tanggapan" value="{{ $pengaduan->id_pengaduan }}"> --}}
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-xs-12">
          <div class="form-group">
            <strong>Tanggal Tanggapan</strong>
            <input type="date" placeholder="Tanggal Tanggapan" class="form-control" name="tgl_tanggapan">
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-xs-12">
          <div class="form-group">
            <strong>Isi Tanggapan</strong>
            <textarea name="tanggapan" id="tanggapan"  rows="4" placeholder="Isi Tanggapan" class="form-control"></textarea>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-xs-12">
          <div class="form-group">
            <input type="hidden" class="form-control" name="id_petugas" value="{{ auth::guard('petugas')->user()->id_petugas }}">
          </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12">
          <button  class="btn btn-success">Kirim</button>
      </div>
      </div>
    </form>
@endsection