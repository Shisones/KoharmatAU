<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FaqModel extends Model
{
    use HasFactory;

    protected $table = "faq";
    protected $primaryKey = "faq_id";
    public $timestamps = false;

    protected $guarded = [
        'faq_id',
    ];

    public function readFaq(){
        $faq = self::all();
        return $faq;
    }

    public function addFaq($request){
        $faq = self::create([
            'faq_pertanyaan' => $request->pertanyaan,
            'faq_jawaban' => $request->jawaban,
        ]);
    
        return $faq ? 1 : 0;
    }
}
