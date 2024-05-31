<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('index',['title' => 'Beranda']);
});

Route::post('/kirimPesan', [PesanController::class, 'addPesan']);

Route::get('/profil', function () {
    return view('profil',['title' => 'Profil Koharmat']);
});

Route::get('/informasi', function () {
    return view('informasi',['title' => 'Informasi']);
});

Route::get('/galeri', [GaleriController::class, 'index']);

Route::get('/kontak', function () {
    return view('kontak',['title' => 'Kontak']);
});

Route::get('/kasau', function () {
    return view('kasau',['title' => 'Kasau']);
});
Route::get('/wakasau', function () {
    return view('wakasau',['title' => 'Wakasau']);
});
Route::get('/asetkoharmat', function () {
    return view('asetkoharmat',['title' => 'Aset Koharmat']);
});

Route::get('/strukturorganisasi', function () {
    return view('strukturorganisasi',['title' => 'Struktur Organisasi']);
});

Route::get('/organisasikoharmat', function () {
    return view('organisasikoharmat',['title' => 'Organisasi Koharmat']);
});
Route::get('/detailorganisasikoharmat', function () {
    return view('detailorganisasikoharmat',['title' => 'Detail Organisasi']);
});

Route::get('/berita', [BeritaController::class, 'index']);

Route::get('detailberita/{slug}',[BeritaController::class, 'detail']);

Route::get('/pesanmasyarakat', function () {
    return view('pesanmasyarakat',['title' => 'pesanmasyarakat']);
});

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/pesan/dibalas', [AdminController::class, 'pesanSudahDibalasView']);
Route::post('/admin/kirimbalasan', [AdminController::class, 'addBalasan']);

Route::get('/admin/strukturorganisasi', [AdminController::class, 'strukturOrganisasiView']);
Route::get('/admin/organisasikoharmat', [AdminController::class, 'organisasikoharmatView']);
Route::get('/CRUD/createberita', function () {
    return view('/CRUD/createberita',['title' => 'Tambah Berita']);
});
Route::get('/CRUD/addfoto', function () {
    return view('/CRUD/addfoto',['title' => 'Tambah Foto']);
});
Route::get('/CRUD/addvideo', function () {
    return view('/CRUD/addvideo',['title' => 'Tambah Video']);
});
Route::get('/CRUD/addkasau', function () {
    return view('/CRUD/addkasau',['title' => 'Tambah Kasau']);
});
Route::get('/CRUD/addwakasau', function () {
    return view('/CRUD/addwakasau',['title' => 'Tambah Wakasau']);
});
Route::get('/CRUD/addaset', function () {
    return view('/CRUD/addaset',['title' => 'Tambah Aset']);
});