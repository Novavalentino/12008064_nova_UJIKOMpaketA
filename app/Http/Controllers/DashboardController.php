<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Petugas;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::guard('masyarakat')->check()){
            return view('pengaduan.create');
        }elseif(Auth::guard('petugas')->user()->level=='admin'){
            return view('view.admin');
        }else{
            return view('view.petugas');
        }
    }
}