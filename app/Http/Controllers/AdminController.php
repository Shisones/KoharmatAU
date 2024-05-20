<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PesanModel;
use App\Models\BalasanModel;



class AdminController extends Controller
{
    //
    private $pesanModel, $balasanModel;

    public function __construct()
    {
        $this->pesanModel = new PesanModel();
        $this->balasanModel = new BalasanModel();
    }

    public function index(){
        $messages = $this->pesanModel->getPesanWithoutBalasan();

        return view('admin',['title' => 'Admin | Pertanyaan yang belum dibalas', 'messages' => $messages]);
    }

    public function pesanSudahDibalasView(){
        $messages = $this->pesanModel->getPesanWithBalasan();

        return view('adminPesanSudahDibalas',['title' => 'Admin | Pertanyaan yang sudah dibalas', 'messages' => $messages]);
    }

    public function strukturOrganisasiView(){
        return view('adminStrukturOrganisasi',['title' => 'Admin | Struktur Organisasi']);
    }

    public function addBalasan(Request $request){ 
        $validator = Validator::make($request->all(), [
            'balasan_isi' => 'required|string',
            'pesan_id' => 'required|int'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $resultCreate = $this->balasanModel->addBalasan($request);

        if ($resultCreate) {
            $resultUpdate = $this->pesanModel->updateReplied($request->pesan_id);
            if($resultUpdate){
                return response()->json(['message' => 'Balasan berhasil dikirim!'], 201);
            }
            else{
                $findBalasan = $this->balasanModel->findBalasanByPesanId($request->pesan_id);
                if($findBalasan){
                    $tryUpdate = $this->pesanModel->updateReplied($request->pesan_id);
                    if($tryUpdate){
                        return response()->json(['message' => 'Balasan berhasil dikirim!'], 201);
                    }
                    else{
                        return response()->json(['error' => 'Pesan gagal diperbarui.'], 500);
                    }
                }
            }
        } else {
            return response()->json(['error' => 'Gagal mengirim balasan.'], 500);
        }
    }
}
