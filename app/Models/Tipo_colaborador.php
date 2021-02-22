<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_colaborador extends Model
{
    use HasFactory;

    protected $table = 'tipo_colaborador';

    // * Relacion uno a muchos
    public function colaboradores()
    {
        return $this->hasMany('App\Models\Colaborador');
    }
}
