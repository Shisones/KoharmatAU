<?php

namespace App\Http\Controllers;

use App\Models\FaqModel;
use App\Models\AdminModel;
use App\Models\PesanModel;
use App\Models\BalasanModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\File;
use App\Models\StrukturOrganisasiModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    //
    private $pesanModel, $balasanModel, $strukturOrganisasiModel, $faqModel;

    public function __construct()
    {
        $this->pesanModel = new PesanModel();
        $this->balasanModel = new BalasanModel();
        $this->strukturOrganisasiModel = new StrukturOrganisasiModel();
        $this->faqModel = new FaqModel();
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
        $nodes = $this->strukturOrganisasiModel->getAllNode();
        return view('CRUD/strukturorganisasi',['title' => 'Admin | Struktur Organisasi', 'nodes' => $nodes]);
    }

    public function addStrukturOrganisasiNode(Request $request){
        $validator = Validator::make($request->all(), [
            'node_id' => 'required|int',
            'node_predecessor' => 'required|int',
            'node_link' => 'required|string',
            'node_img' => [
                'required',
                File::image()
            ],
            'node_nama' => "required|string",
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $nodeCreate = $this->strukturOrganisasiModel->addNode($request);

        if($nodeCreate['success']){
            $img_path = Storage::url($nodeCreate['img_path']);
            return response()->json(['message' => "Berhasil menambah anggota", 'code' => 201, 'img_path' => $img_path], 201);
        }
        else{
            return response()->json(['error' => "Gagal menambah anggota"], 500);
        }
    }

    public function updateStrukturOrganisasiNode(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'node_id' => 'required|int',
            'node_link' => 'required|string',
            'node_nama' => "required|string",
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $nodeUpdate = $this->strukturOrganisasiModel->updateNode($request,$id);

        if($nodeUpdate['success']){
            $img_path = Storage::url($nodeUpdate['img_path']);
            return response()->json(['message' => "Berhasil mengedit anggota", 'code' => 201, 'img_path' => $img_path], 201);
        }
        else{
            return response()->json(['error' => "Gagal mengedit anggota"], 500);
        }
    }

    public function deleteStrukturOrganisasiNode($id){
        $deleteNode = $this->strukturOrganisasiModel->deleteNode($id);

        if($deleteNode){
            return response()->json(['message' => "Berhasil menghapus anggota", 'code' => 201], 201);
        }
        else{
            return response()->json(['error' => "Gagal menambah anggota"], 500);
        }
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

    public function addFaq(Request $request){
        $validator = Validator::make($request->all(), [
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $result = $this->faqModel->addFaq($request);

        if ($result) {
            return view('/CRUD/addfaq',['title' => 'Tambah Faq']);
        } else {
            return response()->json(['error' => 'Gagal membuat berita.'], 500);
            
        }
    }

    public function viewFaq(){
        $faq = $this->faqModel->readFaq();

        return view('/CRUD/viewfaq',['title' => 'Tampilkan Faq', 'faq' => $faq]);
    }

    public function updateFaqPage($id){
        $faq = $this->faqModel->readFaqById($id);

        return view('/CRUD/updatefaq',['title' => 'Update Faq', 'faq' => $faq]);
    }

    public function updateFaq(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'required|string|max:255',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
    
        $result = $this->faqModel->updateFaq($request, $id);
    
        if ($result) {
            $faq = $this->faqModel->readFaqById($id);
            return view('/CRUD/updatefaq', ['title' => 'Perbarui FAQ', 'faq' => $faq]);
        } else {
            return response()->json(['error' => 'Gagal memperbarui FAQ.'], 500);
        }
    }    

    public function deleteFaq($id){
        $faq = $this->faqModel->find($id);

        if (!$faq) {
            return response()->json(['error' => 'FAQ tidak ditemukan.'], 404);
        }

        $result = $this->faqModel->deleteFaq($id);

        if ($result) {
            return self::viewFaq();
        } else {
            return response()->json(['error' => 'Gagal menghapus FAQ.'], 500);
        }
    }

    // public function hashPassword($id){
    //     $result = AdminModel::firstWhere('admin_id', $id);

    //     $faq = AdminModel::where('admin_id', $id)
    //                  ->update([
    //                     'admin_username' => $result->admin_username,
    //                     'admin_password' => Hash::make($result->admin_password)
    //                  ]);
        
    //                  return $faq ? 1 : 0;
    // }
}
