@extends('layout.petugas')
@section('content')
    <div class="row mt-5">
      <div class="col-lg-12 margin-top">
        <div class="float-start">
          <h2>Data Masyarakat</h2>
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
        <th>Nik</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Telp</th>
        <th>Aksi</th>
      </tr>
      @foreach ($masyarakats as $masyarakat)
          <tr>
            <td>{{++$i  }}</td>
            <td>{{$masyarakat->nik  }}</td>
            <td>{{$masyarakat->nama  }}</td>
            <td>{{$masyarakat->username  }}</td>
            <td>{{$masyarakat->telp  }}</td>
            <td>
              <form action="{{ route('masyarakat.destroy', $masyarakat->id) }}" method="POST">
              <a href="{{ route('masyarakat.edit', $masyarakat->id) }}" class="btn btn-primary">Edit</a>
              @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
              </form>
            </td>
          </tr>
      @endforeach
    </table>
@endsection