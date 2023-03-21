<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Petugas;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        if(auth::guard('masyarakat')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect('dashboard');
        }
        if(auth::guard('petugas')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect('dashboard');
        }
        return redirect('/login')->with('error', 'Tidak Bisa Login');
    }

    public function logout(Request $request){
        if(Auth::guard('masyarakat')){
            Auth::guard('masyarakat')->logout();
        }elseif(Auth::guard('petugas')){
            Auth::guard('petugas')->logout();
        }

        $request->session()->inValidate();
        $request->session()->regeneratetoken();
        return redirect('/');
    }
}
