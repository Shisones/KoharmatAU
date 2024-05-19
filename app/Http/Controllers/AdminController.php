<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        $messages = $this->pesanModel->getPesan();

        return view('admin',['title' => 'Admin Page', 'messages' => $messages]);
    }

    public function strukturOrganisasiView(){
        return view('adminStrukturOrganisasi',['title' => 'Admin Page']);
    }
}
