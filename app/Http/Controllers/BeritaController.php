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
        
        return view('berita',['title' => 'Berita', 'berita' => $berita, 'featured' => $featured, 'kategori' => KategoriModel::all()]);
    }

    public function detail($slug){
        $listBerita = $this->beritaModel->readBerita();
        $berita = $this->beritaModel->readBeritaBySlug($slug);
        $terkini = $this->beritaModel->readBeritaTerkini($slug);
        $tags = $this->beritaTagModel->readBeritaTag($berita->berita_id);

        return view('detailberita', ['title' => 'Detail Berita', 'listBerita' => $listBerita, 'berita' => $berita, 'terkini' => $terkini, 'tags' => $tags]);
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
            'berita_img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
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

    public function search(Request $request){
        // dd($request);

        if (!empty($request->kata_kunci) || $request->kategori != "all") {
            $result = $this->beritaModel->search($request);
        } else {
            $result = $this->beritaModel->readBerita();
        }
        $featured = $this->beritaModel->readFeatured();
        $terkini = $this->beritaModel->readBeritaTerkini();

        return view('berita',['title' => 'Berita', 'berita' => $result, 'featured' => $featured, 'terkini' => $terkini, 'kategori' => KategoriModel::all(), 'request' => $request]);
    }
}
