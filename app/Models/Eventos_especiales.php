<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventos_especiales extends Model
{
    use HasFactory;

    protected $table = 'eventos_especiales';

    // * Relacion uno a muchos
    public function colaboradores_evento()
    {
        return $this->hasMany('App\Models\Colaborador_evento');
    }
}
