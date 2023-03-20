@extends('layout.admin')
@section('content')
    <div>
        <div>
            <h2>Tambahkan Data Petugas</h2>
        </div>
        <div>
            <a class="btn btn-primary" href="{{route('petugas.index')}}">Kembali</a>
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

    <form action="{{route('petugas.store')}}" method="POST">
        @csrf
        <div class="col-sm-12 col-xs-12 col-md-12">
            <div class="form-group">
                <strong>Nama Petugas</strong>
                <input type="text" name="nama_petugas" placeholder="Isikan Nama Petugas" class="form-control">
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12">
            <div class="form-group">
                <strong>Username</strong>
                <input type="text" name="username" placeholder="Isikan Username Petugas" class="form-control">
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12">
            <div class="form-group">
                <strong>Password</strong>
                <input type="text" name="password" placeholder="Isikan Password" class="form-control">
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12">
            <div class="form-group">
                <strong>Nomor Telephone</strong>
                <input type="number" name="telp" placeholder="Masukan Nomor Telphone" class="form-control">
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12">
            <div class="form-group">
                <strong>Level</strong>
                <select name="level" id="level" class="form-control">
                    <option value="admin"> Administrator </option>
                    <option value="petugas"> Petugas </option>
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-xs-12 col-md-12">
            <button  class="btn btn-success">Kirim</button>
        </div>
    </form>
@endsection