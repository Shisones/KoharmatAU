<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BeritaModel;

class BeritaController extends Controller
{
    private $beritaModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
    }
    
    public function index(){
        $berita = $this->beritaModel->readBerita();
        $featured = $this->beritaModel->readFeatured();
        
        return view('berita',['title' => 'Berita', 'berita' => $berita, 'featured' => $featured]);
    }
}
