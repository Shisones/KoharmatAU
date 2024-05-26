<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagModel extends Model
{
    use HasFactory;

    protected $table = "tag";
    protected $primaryKey = "tag_id";
    public $timestamps = false;

    public function berita_tag() {
        return $this->hasMany(BeritaTagModel::class, 'tag_id');
    }

}
