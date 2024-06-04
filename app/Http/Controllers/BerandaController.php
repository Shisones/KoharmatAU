<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaqModel;

class BerandaController extends Controller
{
    private $faqModel;

    public function __construct()
    {
        $this->faqModel = new FaqModel();
    }

    public function index(){
        $faq = $this->faqModel->readFaq();

        return view('index',['title' => 'Beranda', 'faq' => $faq]);
    }
}
