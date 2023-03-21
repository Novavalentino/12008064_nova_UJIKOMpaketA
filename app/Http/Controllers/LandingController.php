<?php

namespace App\Http\Controllers;
use App\Models\Masyarakat;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index(){
        if(Auth::guard('masyarakat')->check()){
            return view('landing.masyarakat');
        }else{
            return view('landing.petugas');
        }
    }
}
