<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugass = Petugas::latest()->paginate(5);
        return view('petugas.index', compact('petugass'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'nama_petugas'=>'required',
            'username'=>'required',
            'password'=>'required',
            'telp'=>'required',
            'level'=>'required',
        ]);

        Petugas::create($request->all());
        return redirect()->route('petugas.index')->with('success', 'Berhasil Menambahkan Data Petugas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit($id_petugas)
    {
        $petugas = Petugas::find($id_petugas);
        return view('petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_petugas)
    {
        $request->validate([
            'nama_petugas'=>'required',
            'username'=>'required',
            'password'=>'required',
            'telp'=>'required',
            'level'=>'required',
        ]);

        $petugas = Petugas::where('id_petugas', $id_petugas)->first();
        $petugas->update($request->all());
        return redirect()->route('petugas.index')->with('success','sukses update data petugas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petugas $petugas)
    {
        $petugas ->delete();
        return redirect()->route('petugas.index')->with('success', 'Sukses Hapus Data');
    }
}