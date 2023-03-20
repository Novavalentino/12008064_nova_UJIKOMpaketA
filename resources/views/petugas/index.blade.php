@extends('layout.admin')

@section('content')
    <div class="row-mt5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>Data Petugas</h2>
            </div>
            <div>
                <a class="btn btn-success" href="{{route('petugas.create')}}">Create</a>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>ID Petugas</th>
            <th>Nama Petugas</th>
            <th>Username</th>
            <th>No Telepon</th>
            <th>Level</th>
        </tr>
        @foreach ($petugass as $petugas)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$petugas->id_petugas}}</td>
                <td>{{$petugas->nama_petugas}}</td>
                <td>{{$petugas->username}}</td>
                <td>{{$petugas->telp}}</td>
                <td>{{$petugas->level}}</td>
                <td>
                    <form action="{{route('petugas.destroy', $petugas->id_petugas)}}" method="POST">
                        <a class="btn btn-primary" href="{{route('petugas.edit', $petugas->id_petugas)}}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
{{$petugass->links()}}
@endsection