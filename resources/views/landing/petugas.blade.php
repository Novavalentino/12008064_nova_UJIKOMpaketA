@extends('layout.landing')
@section('content')
    <div class="row mt-5">
      <div class="col-lg-12 margin-top">
        <div>
          <h2>Selamat Datang Di Pengaduan Masyarakat wahai {{ Auth::guard('petugas')->user()->nama_petugas }}</h2>
        </div>
      </div>
    </div>
    <h6>Aspirasi dan keluh kesah rakyat harus senantiasa kita tampung, oleh sebab itu dengan adanya web ini diharapkan masyarakat dari kompek agricon mampu menuangkan semua keluh kesahnya. Terimakasih</h6>

    
@endsection