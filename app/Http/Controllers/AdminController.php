<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PesanModel;

class AdminController extends Controller
{
    //
    private $pesanModel;

    public function __construct()
    {
        $this->pesanModel = new PesanModel();
    }

    public function index(){
        $messages = $this->pesanModel->getPesanWithoutBalasan();

        return view('admin',['title' => 'Admin | Pertanyaan yang belum dibalas', 'messages' => $messages]);
    }

    public function pesanSudahDibalasView(){
        $messages = $this->pesanModel->getPesanWithBalasan();

        return view('adminPesanSudahDibalas',['title' => 'Admin | Pertanyaan yang sudah dibalas', 'messages' => $messages]);
    }

    public function strukturOrganisasiView(){
        return view('adminStrukturOrganisasi',['title' => 'Admin | Struktur Organisasi']);
    }
}
