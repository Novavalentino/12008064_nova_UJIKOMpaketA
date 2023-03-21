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
  <table class="table table-bordered">
    <tr>
      <th>NIK Pelapor</th>
      <th>Tanggal Laporan</th>
      <th width="150px">Tanggal Tanggapan</th>
      <th >Isi Tanggapan</th>
      <th>ID Petugas</th>
    </tr>
    <tr>
      <td>{{ $pengaduan->nik }}</td>
      <td>{{ $pengaduan->tgl_pengaduan }} {{ $pengaduan->jam }}</td>
      <td>{{ $tanggapan->tgl_tanggapan }}</td>
      <td>{{ $tanggapan->tanggapan }}</td>
      <td>{{ $tanggapan->id_petugas }}</td>
    </tr>
  </table>
</body>
</html>