<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masyarakats = Masyarakat::latest()->paginate(5);
        return view('masyarakat.index', compact('masyarakats'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        $rules = [
            'nik' => ['required', 'unique:masyarakat'],
            'nama' => ['required'],
            'username' => ['required', 'unique:masyarakat'],
            'password' => ['required'],
            'telp' => ['required']
        ];
        $validatedRequest = $request->validate($rules);
        $validatedRequest['password'] = Hash::make($validatedRequest['password']);
        Masyarakat::create($validatedRequest);
        return redirect('/')->with('success', 'Selamat Akun anda berhsil tersimpan, silahkan loggin untuk membuat laporan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(Masyarakat $masyarakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $masyarakat = Masyarakat::find($id);
        return view('masyarakat.edit', compact('masyarakat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {       
        $request->validate([
            'nik' =>'required',
            'nama' =>'required',
            'username' =>'required',
            'password' =>'required',
            'telp' =>'required',
        ]);
        $masyarakat = Masyarakat::where('id', $id)->first();
        $masyarakat->update($request->all());
        return redirect('masyarakat')->with('success', 'Berhasil Mengperbaharui Data Masyarakat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Masyarakat $masyarakat)
    {
        $masyarakat ->delete();
        return redirect()->route('masyarakat.index')->with('success', 'Sukses Hapus Data Masyarakat');
    }
}
