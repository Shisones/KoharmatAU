<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BeritaModel extends Model
{
    use HasFactory;

    public function readBerita(){
        $query = DB::select("SELECT * FROM berita
        INNER JOIN kategori
        ON berita.kategori_id = kategori.kategori_id
        ");

        return $query;
    }
}
