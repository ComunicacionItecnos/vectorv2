<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculo';

    public $timestamps = false;

    protected $fillable = [
        'placa',
        'tipo_vehiculo',
        'marca',
        'modelo',
        'fecha_modelo',
        'color',
        'colaborador_no_colaborador',
    ];

    // * Relacion uno a muchos
    public function estacionamiento()
    {
        return $this->hasMany('App\Models\Estacionamiento');
    }

    //* Relacion muchos a uno
    public function colaboradores()
    {
        return $this->belongsTo('App\Models\Colaborador');
    }
}
