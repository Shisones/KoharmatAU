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

    public function readFaq(){
        $faq = self::all();
        return $faq;
    }
}
