<?php

namespace App\Http\Controllers;

use App\Models\BeritaModel;
use Illuminate\Http\Request;
use App\Models\BeritaTagModel;
use App\Http\Controllers\Controller;

class BeritaController extends Controller
{
    private $beritaModel;
    private $beritaTagModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
        $this->beritaTagModel = new BeritaTagModel();
    }
    
    public function index(){
        $berita = $this->beritaModel->readBerita();
        $featured = $this->beritaModel->readFeatured();
        
        return view('berita',['title' => 'Berita', 'berita' => $berita, 'featured' => $featured]);
    }

    public function detail($slug){
        $listBerita = $this->beritaModel->readBerita();
        $berita = $this->beritaModel->readBeritaBySlug($slug);
        $tags = $this->beritaTagModel->readBeritaTag($berita->berita_id);

        return view('detailberita', ['title' => 'Detail Berita', 'listBerita' => $listBerita, 'berita' => $berita, 'tags' => $tags]);
    }
}
