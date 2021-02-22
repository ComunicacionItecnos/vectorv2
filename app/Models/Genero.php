<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    protected $table = 'genero';

    // * Relacion uno a muchos
    public function colaboradores()
    {
        return $this->hasMany('App\Models\Colaborador');
    }
}
