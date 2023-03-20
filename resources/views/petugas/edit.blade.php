@extends('layout.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2>Edit Petugas</h2>
        </div>
    </div>
    <div>
        <a class="btn btn-primary" href="{{route('petugas.index')}}">Kembali</a>
    </div>
    @if ($errors->any())
        <strong>Maaf</strong> Ada kesalahan dalam Inputanmu. <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{route('petugas.update', $petugas->id_petugas)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12">
                <div class="form-group">
                    <strong>Nama Petugas</strong>
                    <input type="text" name="nama_petugas" value="{{$petugas->nama_petugas}}" class="form-control" placeholder="Isikan Nama Petugas">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12">
                <div class="form-group">
                    <strong>Username</strong>
                    <input type="text" name="username" value="{{$petugas->username}}" class="form-control" placeholder="Isikan Username">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12">
                <div class="form-group">
                    <strong>Password</strong>
                    <input type="text" name="password" value="{{$petugas->password}}" class="form-control" placeholder="Isikan Password">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12">
                <div class="form-group">
                    <strong>Nomor Telephone</strong>
                    <input type="number" name="telp" value="{{$petugas->telp}}" class="form-control" placeholder="Isikan Nomor Telephone">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12">
                <div class="form-group">
                    <strong>Level</strong>
                    <select name="level" id="level" value="{{$petugas->level}}" class="form-control">
                        <option value="admin">Administrator</option>
                        <option value="petugas">Petugas</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-xs-12">
            <button type="submit" class="btn btn-success"> Kirim </button>
        </div>

    </form>
@endsection