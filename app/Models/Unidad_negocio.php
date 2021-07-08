<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad_negocio extends Model
{
    use HasFactory;

    protected $table = 'unidad_negocio';
    public $timestamps = false;

    protected $fillable = [
        'nombre_unidad',
        'gerente_id',
    ];

    // * Relacion uno a muchos
    public function unidades_negocio_familias()
    {
        return $this->hasMany('App\Models\Unidad_negocio_familias');
    }

    //* Relacion muchos a uno
    public function colaboradores()
    {
        return $this->belongsTo('App\Models\Colaborador');
    }
}
