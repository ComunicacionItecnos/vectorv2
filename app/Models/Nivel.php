<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    protected $table = 'nivel';
    
    // * Relacion uno a muchos
    public function colaboradores()
    {
        return $this->hasMany('App\Models\Puesto');
    }
}
