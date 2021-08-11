<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactos_emergencia_nuevo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_nuevoIngreso',
        'nombre',
        'parentesco',
        'telefono',
        'domicilio',
    ];

    //* Relacion muchos a uno
    public function nuevo_ingreso(){
        return $this->belongsTo('App\Models\Nuevo_ingreso');
    }
}
