<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Externo extends Model
{
    use HasFactory;

    protected $table = 'externo';

    protected $fillable = [
        'nombre_1',
        'nombre_2',
        'ap_paterno',
        'ap_materno',
        'fecha_nacimiento',
        'genero_id',
        'curp',
        'rfc',
        'area_id',
        'supervisor',
        'tipo_externo_id',
        'tel_contacto',
        'foto'
    ];

    //* Relacion muchos a uno

    public function generos()
    {
        return $this->belongsTo('App\Models\Genero');
    }

    public function areas()
    {
        return $this->belongsTo('App\Models\Area');
    }

    public function colaboradores()
    {
        return $this->belongsTo('App\Models\Colaborador');
    }

    public function tipos_externo()
    {
        return $this->belongsTo('App\Models\Tipo_externo');
    }

    // * Relacion uno a muchos

    public function vehiculos(){
        return $this->hasMany('App\Models\Vehiculo_externo');
    }
}
