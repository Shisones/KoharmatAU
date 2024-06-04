<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function getAllNode(){
        $nodes = self::all();
        return $nodes;
    }

    public function deleteNode($id){
        $parentNode = self::find($id);
        $childNode = self::where('struktur_predecessor',$id)->get();
        foreach($childNode as $child){
            Storage::disk('public')->delete($child->struktur_img);
            $deleteChild = $child->delete();
            if(!$deleteChild){
                return 0;
            }
        }
        Storage::disk('public')->delete($parentNode->struktur_img);
        $deleteParent = $parentNode->delete();

        return $deleteParent ? 1 : 0;
    }
}
