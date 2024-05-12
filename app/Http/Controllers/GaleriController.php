<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GaleriModel;

class GaleriController extends Controller
{
    //
    private $galeriModel;

    public function __construct()
    {
        $this->galeriModel = new GaleriModel();
    }

    public function index(){
        $image = $this->galeriModel->readImage();
        $video = $this->galeriModel->readVideo();

        return view('galeri',['title' => 'Galeri','image' => $image, 'video' => $video]);
    }
}
