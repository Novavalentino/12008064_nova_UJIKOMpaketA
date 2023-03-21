<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PDF jadi jadian</title>
</head>
<body>
  <div class="row mt-5">
    <div class="col-lg-12 margin-top">
      <div class="float-end">
        <h2>Berikut Report dari laporan <strong>{{ $pengaduan->judul_laporan }}</strong> </h2>
      </div>
    </div>
  </div>

  <h4>ID Pengaduan : {{$pengaduan->id_pengaduan}}</h4>
  <h4>Ditanggapi Oleh : {{$tanggapan->id_petugas}}</h4>
  <h4>Diadukan Pada : {{$pengaduan->tgl_pengaduan}} pukul : {{ $pengaduan->waktu_laporan }}</h4>
  <h4>Ditanggapi Pada : {{$tanggapan->tgl_tanggapan}}</h4>
  <h4>Judul Laporan : {{$pengaduan->judul_laporan}}</h4>
  <h4>Isi Laporan : {{$pengaduan->isi_laporan}}</h4>
  <h4>Tanggapan : {{$tanggapan->tanggapan}}</h4>
  <h4>Status : {{ $pengaduan->status }}</h4>


</body>
</html>