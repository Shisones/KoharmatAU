<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;

Route::get('/', function () {
    return view('index',['title' => 'Beranda']);
});

Route::get('/profil', function () {
    return view('profil',['title' => 'Profil Koharmat']);
});

Route::get('/informasi', function () {
    return view('informasi',['title' => 'Informasi']);
});

Route::get('/galeri', function () {
    return view('galeri',['title' => 'Galeri']);
});

Route::get('/kontak', function () {
    return view('kontak',['title' => 'Kontak']);
});

Route::get('/kasau', function () {
    return view('kasau',['title' => 'Kasau']);
});

Route::get('/strukturorganisasi', function () {
    return view('strukturorganisasi',['title' => 'Struktur Organisasi']);
});

Route::get('/berita', [BeritaController::class, 'index']);

Route::get('/pesanmasyarakat', function () {
    return view('pesanmasyarakat',['title' => 'pesanmasyarakat']);
});
