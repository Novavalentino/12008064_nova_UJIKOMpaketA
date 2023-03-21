@extends('layout.petugas')
@section('content')
    <div class="row mt-5">
      <div class="col-lg-12 margin-top">
        <div class="float-start">
          <h2>Berikut adalah semua data Tanggapan wahai <strong>{{ Auth::guard('petugas')->user()->nama_petugas }}</strong> </h2>
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
        <th>ID Tanggapan</th>
        <th>ID Pengaduan</th>
        <th>Tanggal Tanggapan</th>
        <th>Isi Tanggapan</th>
        <th>ID Petugas</th>
        <th>Aksi</th>
      </tr>
      @foreach ($tanggapans as $tanggapan)
          <tr>
            <td>{{ ++$i}}</td>
            <td>{{ $tanggapan->id_tanggapan }}</td>
            <td>{{ $tanggapan->id_pengaduan }}</td>
            <td>{{ $tanggapan->tgl_tanggapan }}</td>
            <td>{{ $tanggapan->tanggapan }}</td>
            <td>{{ $tanggapan->id_petugas }}</td>
            <td>
              <form action="{{ route('tanggapan.destroy', $tanggapan->id_tanggapan) }}" method="POST">
                <a class="btn btn-primary" href="{{ route('tanggapan.edit', $tanggapan->id_tanggapan) }}">Edit</a>
                @csrf @method('DELETE')
                {{-- <button type="submit" class="btn btn-danger">Hapus</button> --}}
              </form>
            </td>
          </tr>
      @endforeach
    </table>
@endsection