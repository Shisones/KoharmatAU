<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class BeritaModel extends Model
{
    use HasFactory, Sluggable;

    protected $table = "berita";
    protected $primaryKey = "berita_id";
    public $timestamps = false;

    protected $guarded = [
        'berita_id',
    ];

    public function kategori() {
        return $this->belongsTo(KategoriModel::class, 'kategori_id');
    }

    public function berita_tag() {
        return $this->hasMany(BeritaTagModel::class, 'berita_id');
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

    public function readBeritaBySlug($slug){
        $berita = self::with('kategori')
                        ->firstWhere('berita_slug', $slug);
        return $berita;
    }

    public function addBerita($request){
        $pesan = self::create([
            'berita_judul' => $request->berita_judul,
            'berita_isi' => $request->berita_isi,
            'berita_type' => $request->berita_type,
            'kategori_id' => $request->kategori_id,
            'penulis_nama' => $request->penulis_nama,
            'berita_img' => 'assets/img/tentangkami/1.png',
        ]);
    
        return $pesan ? 1 : 0;
    }

    public function sluggable(): array
    {
        return [
            'berita_slug' => [
                'source' => 'berita_judul'
            ]
        ];
    }

}
