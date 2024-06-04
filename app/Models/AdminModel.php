<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminModel extends Authenticatable
{
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    public $timestamps = false;
    
    protected $fillable = [
        'admin_username', 'admin_password',
    ];
    
    protected $hidden = [
        'admin_password',
    ];
    
    public function getAuthPassword()
    {
        return $this->admin_password;
    }
}

