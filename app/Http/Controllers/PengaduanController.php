<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;
use App\Models\Masyarakat;
use App\Models\Petugas;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduans = Pengaduan::latest()->paginate(10);
        return view('pengaduan.index', compact('pengaduans'))->with('i', (request()->input('page', 1)-1)*10);
    }
    public function indexmas(){
        $pengaduans = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->get();
        return view('pengaduan.masyarakat', compact('pengaduans'))->with('i', (request()->input('page', 1)-1)*10);
    }
    public function masindex(){
        $pengaduans = Pengaduan::latest()->paginate(10);
        return view('pengaduan.masindex', compact('pengaduans'))->with('i', (request()->input('page', 1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_laporan'=>'required',
            'tgl_pengaduan'=>'required',
            'waktu_laporan'=>'required',
            'nik'=>'required',
            'isi_laporan'=>'required',
            'foto'=>'image|file|required',
            'status',
        ]);

        $validated['status']='0';
        $validated['foto']= $request->file('foto')->store('post-images');
        Pengaduan::create($validated);
        return redirect('dashboard')->with('success', 'Laporanmu sudah kami terima, silahkan tunggu konfirmasi lebih lanjut.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan)
    {
        //
    }

    public function proses($id_pengaduan){
        $pengaduan = Pengaduan::find($id_pengaduan);
        $pengaduan->update(['status'=>'proses']);
        return redirect('pengaduan');
    }

    public function createtanggapan($id_pengaduan){
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->first();
        $tanggapan = Tanggapan::where('id_pengaduan', $id_pengaduan)->first();
        return view('tanggapan.create', compact('pengaduan', 'tanggapan'));
    }

    public function tanggapan(Request $request){
        $pengaduan = Pengaduan::where('id_pengaduan', $request->id_pengaduan)->first();
        $tanggapan = Tanggapan::where('id_pengaduan', $request->id_pengaduan)->first();
        $input=$request->validate ([
           'id_pengaduan'=>'required',
           'tgl_tanggapan'=>'required',
           'tanggapan'=>'required',
           'id_petugas'=>'required', 
        ]);
        Tanggapan::create($input);
        $pengaduan->status='selesai';
        $pengaduan->update();
        return redirect()->route('pengaduan.index')->with('success', 'Berhasil Memberi Tanggapan');
    }
}
