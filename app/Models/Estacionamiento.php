<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estacionamiento extends Model
{
    use HasFactory;

    protected $table = 'estacionamiento';

    protected $fillable = [
        'colaborador_no_colaborador',
        'vehiculo_id',
        'marbete_id'
    ];

    //* Relacion muchos a uno
    public function vehiculos()
    {
        return $this->belongsTo('App\Models\Vehiculo');
    }

    public function colaboradores()
    {
        return $this->belongsTo('App\Models\Colaborador');
    }

    public function marbetes()
    {
        return $this->belongsTo('App\Models\Marbete');
    }
}
