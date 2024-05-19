<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PesanModel extends Model
{
    use HasFactory;

    protected $table = 'pesan';
    protected $primaryKey = 'pesan_id';
    public $timestamps = false;

    protected $fillable = [
        'pesan_nama', 
        'pesan_email', 
        'pesan_subjek', 
        'pesan_isi'
    ];

    public function addPesan($request){
        $pesan = self::create([
            'pesan_nama' => $request->pesan_nama,
            'pesan_email' => $request->pesan_email,
            'pesan_subjek' => $request->pesan_subjek,
            'pesan_isi' => $request->pesan_isi
        ]);
    
        return $pesan ? 1 : 0;
    }
    
}
