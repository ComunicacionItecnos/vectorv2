<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo_externo extends Model
{
    use HasFactory;

    protected $table = 'vehiculo_externo';

    public $timestamps = false;

    protected $fillable = [
        'placa',
        'tipo_vehiculo_id',
        'marca',
        'modelo',
        'fecha_modelo',
        'color',
        'externo_id',
    ];

    // * Relacion uno a muchos
    public function estacionamiento()
    {
        return $this->hasMany('App\Models\Estacionamiento_externo');
    }

    //* Relacion muchos a uno
    public function externos()
    {
        return $this->belongsTo('App\Models\Externo');
    }
    
    public function vehiculos()
    {
        return $this->belongsTo('App\Models\Tipo_vehiculo');
    }
}
