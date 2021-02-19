<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hijos extends Model
{
    use HasFactory;

    //* Relacion muchos a uno
    public function escolaridades(){
        return $this->belongsTo('App\Models\Escolaridad');
    }

    public function colaboradores(){
        return $this->belongsTo('App\Models\Colaborador');
    }
}
