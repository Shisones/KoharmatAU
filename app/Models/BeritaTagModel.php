<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaTagModel extends Model
{
    use HasFactory;

    protected $table = "berita_tag";
    protected $primaryKey = "berita_tag_id";
    public $timestamps = false;

    public function tag() {
        return $this->belongsTo(TagModel::class, 'tag_id');
    }

    public function berita() {
        return $this->belongsTo(BeritaModel::class, 'berita_id');
    }

    public function readBeritaTag($id){
        $tags = Self::with('tag')
                    ->where('berita_id', $id)
                    ->get();
        return $tags;
    }

}
