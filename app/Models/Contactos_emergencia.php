<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactos_emergencia extends Model
{
    use HasFactory;

    protected $table = 'contactos_emergencia';

    //* Relacion muchos a uno
    public function colaboradores(){
        return $this->belongsTo('App\Models\Colaborador');
    }
}
