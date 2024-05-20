<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalasanModel extends Model
{
    use HasFactory;

    protected $table = "balasan";
    protected $primaryKey = "balasan_id";
    public $timestamps = false;

    protected $fillable = [
        'balasan_isi', 
        'pesan_id', 
    ];

    protected $attributes = [
        'admin_id' => 1
    ];

    public function pesan() {
        return $this->belongsTo(PesanModel::class, 'pesan_id');
    }

    public function addBalasan($request){
        $balasan = self::create([
            'balasan_isi' => $request->balasan_isi,
            'pesan_id' => $request->pesan_id,
        ]);
    
        return $balasan ? 1 : 0;
    }

    public function findBalasanByPesanId($pesanId){
        $balasan = self::where('pesan_id',$pesanId)->get();

        return $balasan ? 1 : 0;
    }
}
