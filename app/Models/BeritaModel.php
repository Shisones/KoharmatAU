<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use \Cviebrock\EloquentSluggable\Services\SlugService;

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
        $imagePath = "assets/img/berita/1.png";
        if ($request->hasFile('berita_img')) {
            $image = $request->file('berita_img');
            $imageName = time() . '_' . SlugService::createSlug(self::class, 'berita_slug', $request->berita_judul) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->move(public_path('assets/img/berita'), $imageName);
            $imagePath = 'assets/img/berita/' . $imageName;
        }

        $pesan = self::create([
            'berita_judul' => $request->berita_judul,
            'berita_isi' => $request->berita_isi,
            'berita_type' => $request->berita_type,
            'kategori_id' => $request->kategori_id,
            'penulis_nama' => $request->penulis_nama,
            'berita_img' => $imagePath,
        ]);
    
        return $pesan ? 1 : 0;
    }

    public function search($request){
        $query = self::query();
    
        if($request->has('kategori') && $request->kategori != "all") {
            $query->where('kategori_id', $request->kategori);
        }
    
        if($request->has('kata_kunci')) {
            $query->where(function($q) use ($request) {
                $q->where('berita_judul', 'LIKE', "%$request->kata_kunci%")
                  ->orWhere('berita_isi', 'LIKE', "%$request->kata_kunci%");
            });
        }
    
        return $query->get();
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
