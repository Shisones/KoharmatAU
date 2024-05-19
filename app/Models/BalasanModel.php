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

    public function pesan() {
        return $this->belongsTo(PesanModel::class, 'pesan_id');
    }
}
