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

    public function balasan() {
        return $this->hasMany(BalasanModel::class, 'pesan_id');
    }

    public function addPesan($request){
        $pesan = self::create([
            'pesan_nama' => $request->pesan_nama,
            'pesan_email' => $request->pesan_email,
            'pesan_subjek' => $request->pesan_subjek,
            'pesan_isi' => $request->pesan_isi
        ]);
    
        return $pesan ? 1 : 0;
    }

    public function getPesan(){
        $pesan = self::all();
        return $pesan;
    }


    public function getPesanWithoutBalasan(){
        $pesan = self::where('is_replied',0)
        ->get();
        return $pesan;
    }

    public function getPesanWithBalasan(){
        $pesan = self::with('balasan')
        ->where('is_replied',1)
        ->get();
        return $pesan;
    }
    
}
