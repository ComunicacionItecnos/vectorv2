<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marbete extends Model
{
    use HasFactory;

    protected $table = 'marbete';

    public $timestamps = false;

    protected $fillable = [
        'tipo_vehiculo_id',
        'numero',
        'estado'
    ];

    // * Relacion uno a muchos
    public function estacionamientos()
    {
        return $this->hasMany('App\Models\Estacionamiento');
    }

    //* Relacion muchos a uno
    public function tipo_vehiculo()
    {
        return $this->belongsTo('App\Models\Tipo_vehiculo');
    }
}
