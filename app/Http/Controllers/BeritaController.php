<?php

namespace App\Http\Controllers;

use App\Models\BeritaModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use App\Models\BeritaTagModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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

    public function create(){
        return view('CRUD/createberita', [
            'title' => 'Tambah Berita',
            'kategori' => KategoriModel::all(),
        ]);
    }

    public function addBerita(Request $request){
        $validator = Validator::make($request->all(), [
            'berita_judul' => 'required|string|max:255',
            'berita_isi' => 'required|string|max:255',
            'berita_type' => 'required',
            'kategori_id' => 'required',
            'penulis_nama' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $result = $this->beritaModel->addBerita($request);

        if ($result) {
            return view('CRUD/createberita', [
                'title' => 'Tambah Berita',
                'kategori' => KategoriModel::all(),
            ]);
        } else {
            return response()->json(['error' => 'Gagal membuat berita.'], 500);
            
        }
    }
}
