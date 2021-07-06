<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad_negocio_familias extends Model
{
    use HasFactory;

    protected $table = 'unidad_negocio_familias';
    public $timestamps = false;

    protected $fillable = [
        'nombre_familia',
        'unidad_negocio_id',
    ];

    // * Relacion uno a muchos
    public function unidades_negocio_grupos()
    {
        return $this->hasMany('App\Models\Unidad_negocio_grupos');
    }

    //* Relacion muchos a uno
    public function unidades_negocio()
    {
        return $this->belongsTo('App\Models\Unidad_negocio');
    }
}
