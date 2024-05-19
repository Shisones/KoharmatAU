<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class GaleriModel extends Model
{
    use HasFactory;

    protected $table = "galeri";
    protected $primaryKey = "galeri_id";
    public $timestamps = false;

    public function readGaleri(){
        $galeri = self::all();
        return $galeri;
    }

    public function readImage(){
        $image = self::where("is_video",0)->get();
        return $image;
    }

    public function readVideo(){
        $video = self::where("is_video",1)->get();
        return $video;
    }
}
