<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//route login and register
Route::get('/', function () {
    return view('auth.login');
});
Route::get('/register', function (){
    return view('auth.register');
});

//login reoute
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth:petugas,masyarakat');

//custom route
Route::get('indexmas', [PengaduanController::class, 'indexmas'])->name('pengaduan.indexmas');
Route::put('proses/{id_pengaduan}', [PengaduanController::class, 'proses'])->name('pengaduan.proses');

//resource route
Route::resource('masyarakat', MasyarakatController::class);
Route::resource('petugas', PetugasController::class);
Route::resource('pengaduan', PengaduanController::class);
Route::resource('tanggapan', TanggapanController::class);
