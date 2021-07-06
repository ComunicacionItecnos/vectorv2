<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad_negocio_grupos extends Model
{
    use HasFactory;

    protected $table = 'unidad_negocio_grupo';
    public $timestamps = false;

    protected $fillable = [
        'nombre_grupo',
        'unidad_negocio_familia_id',
        'supervisor_id'
    ];

    // * Relacion uno a muchos
    public function colaboradores_unidad_negocio()
    {
        return $this->hasMany('App\Models\Colaborador_unidad_negocio');
    }

    //* Relacion muchos a uno
    public function unidades_negocio_familia()
    {
        return $this->belongsTo('App\Models\Unidad_negocio_familia');
    }

    public function colaboradores()
    {
        return $this->belongsTo('App\Models\Colaborador');
    }
}
