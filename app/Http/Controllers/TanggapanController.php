<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Tanggapan;
use App\Models\Petugas;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanggapans = Tanggapan::latest()->paginate(10);
        return view('tanggapan.index', compact('tanggapans'))->with('i', (request()->input('page', 1)-1)*10);
    }
    public function masindex(){
        $tanggapans = Tanggapan::latest()->paginate(10);
        return view('tanggapan.masindex', compact('tanggapans'))->with('i', (request()->input('page', 1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id_pengaduan)
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function show($id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->first();
        $tanggapan = Tanggapan::where('id_pengaduan', $id_pengaduan)->first();
        return view('tanggapan.masyarakat', compact('pengaduan', 'tanggapan'));
    }
    public function adminshow($id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->first();
        $tanggapan = Tanggapan::where('id_pengaduan', $id_pengaduan)->first();
        return view('tanggapan.pdf', compact('pengaduan', 'tanggapan'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function edit($id_tanggapan)
    {
        $tanggapan = Tanggapan::find($id_tanggapan);
        return view('tanggapan.edit', compact('tanggapan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tanggapan $tanggapan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tanggapan $tanggapan)
    {
        //
    }
}
