<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ExportExcelController;


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

Route::get('/landing', function (){
    return view('layout.landing');
});

//login reoute
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth:petugas,masyarakat');
Route::get('/landing', [LandingController::class, 'index'])->middleware('auth:petugas,masyarakat');

//custom route
Route::get('indexmas', [PengaduanController::class, 'indexmas'])->name('pengaduan.indexmas');
Route::get('masindex', [PengaduanController::class, 'masindex'])->name('pengaduan.masindex');
Route::put('proses/{id_pengaduan}', [PengaduanController::class, 'proses'])->name('pengaduan.proses');
Route::get('/createtanggapan/{id}', [PengaduanController::class, 'createtanggapan'])->name('pengaduan.createtanggapan');
Route::post('/pengaduantanggapan', [PengaduanController::class, 'tanggapan'])->name('pengaduan.tanggapan');
Route::get('adminshow', [TanggapanController::class, 'adminshow'])->name('tanggapan.adminshow');


// //PDF Route
// Route::get('cetak', [PdfController::class, 'cetak'])->name('cetak.pdf');
//Print PDF Route
Route::post('printpdf', [PengaduanController::class, 'printpdf'])->name('printpdf');

Route::controller(ExportExcelController::class)->group(function(){
    Route::get('index', 'index');    
    Route::get('export/excel', 'exportExcelFile')->name('export.excel');
});

//resource route
Route::resource('pdf', PdfController::class);
Route::resource('masyarakat', MasyarakatController::class);
Route::resource('petugas', PetugasController::class);
Route::resource('pengaduan', PengaduanController::class);
Route::resource('tanggapan', TanggapanController::class);
