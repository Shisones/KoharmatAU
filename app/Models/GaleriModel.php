<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class GaleriModel extends Model
{
    use HasFactory;

    public function readGaleri(){
        $query = DB::select("SELECT * FROM galeri");
        return $query;
    }

    public function readImage(){
        $query = DB::select("SELECT * FROM galeri WHERE is_video = 0");
        return $query;
    }

    public function readVideo(){
        $query = DB::select("SELECT * FROM galeri WHERE is_video = 1");
        return $query;
    }
}
