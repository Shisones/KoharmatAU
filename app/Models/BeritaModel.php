<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaModel extends Model
{
    use HasFactory;

    protected $table = "berita";
    protected $primaryKey = "berita_id";
    public $timestamps = false;

    public function kategori() {
        return $this->belongsTo(KategoriModel::class, 'kategori_id');
    }

    public function readBerita() {
        $berita = self::with('kategori')
                        ->get();
        
        return $berita;
    }

    public function readFeatured() {
        $featuredBeritas = self::with('kategori')
                                ->where('is_featured', 1)
                                ->get();

        return $featuredBeritas;
    }

}
