<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BeritaModel extends Model
{
    use HasFactory;

    public function readBerita(){
        $query = DB::select("SELECT berita.*, kategori.kategori_nama FROM berita
        INNER JOIN kategori
        ON berita.kategori_id = kategori.kategori_id
        ");

        return $query;
    }

    public function readFeatured(){
        $query = DB::select("SELECT berita.*, kategori.kategori_nama FROM berita
        INNER JOIN kategori
        ON berita.kategori_id = kategori.kategori_id
        WHERE is_featured = 1
        ");

        return $query;
    }
}
