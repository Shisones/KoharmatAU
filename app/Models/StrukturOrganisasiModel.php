<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasiModel extends Model
{
    use HasFactory;

    protected $table = "struktur_organisasi";
    protected $primaryKey = 'struktur_id';
    public $timestamps = false;

    protected $fillable = [
        'struktur_id', 
        'struktur_predecessor', 
        'struktur_nama', 
        'struktur_link', 
        'struktur_img', 
    ];

    public function addNode($request){
        $img = $request->file('node_img');
        $img_path = $img->store("strukturOrganisasi", "public");
        $node = self::create([
            'struktur_id' => $request->node_id, 
            'struktur_predecessor' => $request->node_predecessor, 
            'struktur_nama' => $request->node_nama, 
            'struktur_link' => $request->node_link, 
            'struktur_img' => $img_path,
        ]);

        return ['success' => $node ? 1 : 0, 'img_path' => $img_path];
    }
}
