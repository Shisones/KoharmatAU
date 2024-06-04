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

    public function addNode($request)
    {
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

    public function getAllNode()
    {
        $nodes = self::all();
        return $nodes;
    }

    public function updateNode($request, $id){
        $node = self::find($id);

        $img_path = $node->struktur_img; // Current image path

        if ($request->hasFile('node_img')) {
            // Delete the old image
            Storage::disk('public')->delete($node->struktur_img);
            
            // Store the new image
            $img = $request->file('node_img');
            $img_path = $img->store("strukturOrganisasi", "public");
        }

        $node->struktur_nama = $request->node_nama;
        $node->struktur_img = $img_path;

        $node->save();

        return ['success' => $node ? 1 : 0, 'img_path' => $img_path];
    }

    public function deleteNode($id){
        $node = self::find($id);
        if (!$node) {
            return 0; // Node not found
        }

        // Start the recursive deletion process from the parent node
        $result = $this->deleteNodeAndChildren($node);

        return $result ? 1 : 0;
    }

    private function deleteNodeAndChildren($node) {
        $childNodes = self::where('struktur_predecessor', $node->struktur_id)->get();
        
        foreach ($childNodes as $child) {
            $this->deleteNodeAndChildren($child); // Recursive call to delete child node and its children
        }
        
        // Delete the node's image from storage
        Storage::disk('public')->delete($node->struktur_img);
        
        // Delete the node itself
        return $node->delete();
    }
}
