<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index',['title' => 'Beranda']);
});

Route::get('/tentangkami', function () {
    return view('tentangKami',['title' => 'Tentang Kami']);
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
