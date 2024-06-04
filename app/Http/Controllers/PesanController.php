<?php

namespace App\Http\Controllers;

use App\Models\PesanModel;
use App\Models\BalasanModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PesanController extends Controller
{
    
    private $pesanModel;

    public function __construct()
    {
        $this->pesanModel = new PesanModel();
        $this->balasanModel = new BalasanModel();
    }

    public function addPesan(Request $request){ 
        $validator = Validator::make($request->all(), [
            'pesan_nama' => 'required|string|max:255',
            'pesan_email' => 'required|email|max:255',
            'pesan_subjek' => 'required|string|max:255',
            'pesan_isi' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $result = $this->pesanModel->addPesan($request);

        if ($result) {
            return response()->json(['message' => 'Pesan berhasil dikirim!'], 201);
        } else {
            return response()->json(['error' => 'Gagal mengirim pesan.'], 500);
            
        }
    }

    public function pesanMasyarakat(){
        $pesan = $this->pesanModel->getPesanWithBalasan();
        
        return view('pesanmasyarakat', ['title' => 'Pesan Masyarakat', 'pesan' => $pesan]);
    }
}
