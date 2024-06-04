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

    public function readFaqById($id){
        $faq = self::firstWhere('faq_id', $id);
        return $faq;
    }

    public function addFaq($request){
        $faq = self::create([
            'faq_pertanyaan' => $request->pertanyaan,
            'faq_jawaban' => $request->jawaban,
        ]);
    
        return $faq ? 1 : 0;
    }

    public function updateFaq($request, $id){
        $faq = self::where('faq_id', $id)
                     ->update([
                        'faq_pertanyaan' => $request->pertanyaan,
                        'faq_jawaban' => $request->jawaban,
                     ]);
        
        return $faq ? 1 : 0;
    }

    public function deleteFaq($id){
        $faq = self::where('faq_id', $id)
                     ->delete();
        
        return $faq ? 1 : 0;
    }
}
