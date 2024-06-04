<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BerandaController;

Route::get('/', [BerandaController::class, 'index']);

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
Route::get('/berita', [BeritaController::class, 'search'])->name('berita.filter');

Route::get('detailberita/{slug}',[BeritaController::class, 'detail']);

Route::get('/pesanmasyarakat', [PesanController::class, 'pesanMasyarakat']);

Route::middleware('authenticated')->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/pesan/dibalas', [AdminController::class, 'pesanSudahDibalasView']);
    Route::get('/admin/pesan/disembunyikan', [AdminController::class, 'pesanDisembunyikanView']);
    Route::post('/admin/kirimbalasan', [AdminController::class, 'addBalasan']);
    Route::patch('/admin/sembunyikanpesan/{id}', [AdminController::class, 'hidePesan']);
    Route::patch('/admin/munculkanpesan/{id}', [AdminController::class, 'unhidePesan']);

    // Route::get('strukturorganisasi', [AdminController::class, 'strukturOrganisasiView']);
    // Route::get('organisasikoharmat', [AdminController::class, 'organisasikoharmatView']);

    Route::get('/CRUD/strukturorganisasi', [AdminController::class,'strukturOrganisasiView']);
    Route::get('/CRUD/organisasikoharmat', function () {
        return view('/CRUD/organisasikoharmat',['title' => 'Tambah Organisasi Koharmat']);
    });
    Route::post('/CRUD/strukturorganisasi/addNode',[AdminController::class,'addStrukturOrganisasiNode']);
    Route::patch('/CRUD/strukturorganisasi/updateNode/{id}',[AdminController::class,'updateStrukturOrganisasiNode']);
    Route::delete('/CRUD/strukturorganisasi/deleteNode/{id}',[AdminController::class,'deleteStrukturOrganisasiNode']);

    Route::get('/CRUD/createberita', [BeritaController::class, 'create']);
    Route::post('/CRUD/createberita', [BeritaController::class, 'addBerita']);

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
    Route::get('/CRUD/viewfaq', [AdminController::class, 'viewFaq']);

    Route::get('/CRUD/addfaq', function () {
        return view('/CRUD/addfaq',['title' => 'Tambah Faq']);
    });
    Route::post('/CRUD/addfaq', [AdminController::class, 'addFaq']);

    Route::get('/CRUD/updatefaq/{id}', [AdminController::class, 'updateFaqPage']);
    Route::patch('/CRUD/updatefaq/{id}', [AdminController::class, 'updateFaq']);

    Route::delete('/CRUD/deletefaq/{id}', [AdminController::class, 'deleteFaq']);

    Route::post('/logout', [LoginController::class, 'logout']);

    Route::get('/CRUD/resetpassword', function () {
        return view('/CRUD/resetpassword',['title' => 'Reset Password']);
    });
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'authenticate']);
});
