<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estacionamiento_externo extends Model
{
    use HasFactory;

    protected $table = 'estacionamiento_externo';

    protected $fillable = [
        'externo_id',
        'vehiculo_externo_id',
        'marbete_id'
    ];

    //* Relacion muchos a uno
    public function vehiculos()
    {
        return $this->belongsTo('App\Models\Vehiculo_externo');
    }

    public function externos()
    {
        return $this->belongsTo('App\Models\Externo');
    }

    public function marbetes()
    {
        return $this->belongsTo('App\Models\Marbete');
    }
}
