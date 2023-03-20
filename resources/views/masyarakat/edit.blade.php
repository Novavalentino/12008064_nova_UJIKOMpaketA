@extends('layout.petugas')
@section('content')
    <div class="row mt-5">
      <div class="col-md-12 margin-tb">
        <div>
          <h2>Edit Data Masyarakat</h2>
        </div>
        <div>
          <a href="{{ route('masyarakat.index') }}" class="btn btn-primary">Kembali?</a>
        </div>
      </div>
    </div>
    @if ($errors->any())
        <strong>Wadooh</strong>Sepertinya ada kesalahan dalam inputanmu. <br><br>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
    @endif
    <form action="{{ route('masyarakat.update', $masyarakat->id) }}" method="POST">
      @csrf @method('PUT')
      <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-12">
          <div class="form-group">
            <strong>NIK</strong>
            <input type="text" name="nik" placeholder="NIK" class="form-control" value="{{ $masyarakat->nik }}">
          </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12">
          <div class="form-group">
            <strong>Nama</strong>
            <input type="text" name="nama" placeholder="Nama" class="form-control" value="{{ $masyarakat->nama }}">
          </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12">
          <div class="form-group">
            <strong>Username</strong>
            <input type="text" name="username" placeholder="Username" class="form-control" value="{{ $masyarakat->username }}">
          </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12">
          <div class="form-group">
            <strong>Password</strong>
            <input type="text" name="password" placeholder="Password" class="form-control" value="{{ $masyarakat->password }}">
          </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12">
          <div class="form-group">
            <strong>Nomor Telephone</strong>
            <input type="text" name="telp" placeholder="Nomor Telephone" class="form-control" value="{{ $masyarakat->telp }}">
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-xs-12">
          <button type="submit" class="btn btn-success"> Kirim </button>
      </div>
      </div>
    </form>
@endsection