<?php
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\Auth;
$tanggapan = Tanggapan::where('id_pengaduan', $id_pengaduan)->first();
?>

<img src="{{asset('storage/'. $pengaduan->foto)}}" alt="" width="150px">
<h2>ID Pengaduan : {{$pengaduan->id_pengaduan}}</h2>
<h2>Ditanggapi Oleh : {{$tanggapan->id_petugas}}</h2>
<h3>Diadukan Pada : {{$pengaduan->tgl_pengaduan}}</h3>
<h3>Ditanggapi Pada : {{$tanggapan->tgl_tanggapan}}</h3>
<h4>Judul Laporan : {{$pengaduan->judul_laporan}}</h4>
<h4>Isi Laporan : {{$pengaduan->isi_laporan}}</h4>
<h4>Tanggapan : {{$tanggapan->tanggapan}}</h4>