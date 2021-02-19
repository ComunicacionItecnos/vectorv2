<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador_evento extends Model
{
    use HasFactory;

    //* Relacion muchos a uno
    public function eventos_especiales(){
        return $this->belongsTo('App\Models\Eventos_especiales');
    }

    //* Relacion muchos a uno
    public function colaboradores(){
        return $this->belongsTo('App\Models\Colaborador');
    }
}
