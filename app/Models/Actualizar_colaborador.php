<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actualizar_colaborador extends Model
{
    use HasFactory;

    protected $table= 'actualizar_colaboradors';

    protected $fillable =[
        'colaborador_no_colaborador',
        'domicilio',
        'colonia',
        'municipio',
        'estado',
        'codigo_postal',
        'genero_id',
        'estado_civil_id',
        'paternidad_id',
        'rutaActas',
        'rutacomprobante'
    ];

    /* Relacion de muchos a uno */
    public function colaborador(){
        return $this->belongsTo('App\Models\Colaborador');
    }

    public function generos(){
        return $this->belongsTo('App\Models\Genero');
    }

    public function Estados_civil(){
        return $this->belongsTo('App\Models\Estado_civil');
    }

}
