<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Masyarakat;
use App\Models\Petugas;
use App\Models\Tanggapan;
use App\Models\Pengaduan;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    // public function cetak(){
    //    $masyarakat = Masyarakat::all();
    //    $petugas = Petugas::all();
    //    $tanggapan = Tanggapan::all();
    //    $pengaduan = Pengaduan::all();

 
    //    $pdf = Pdf::loadView('pdf.invoice', $data);
    //    return $pdf->download('invoice.pdf');
    // }
    
}
