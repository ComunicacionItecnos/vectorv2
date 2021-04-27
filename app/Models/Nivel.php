<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    protected $table = 'nivel';

    public $timestamps = false;

    protected $fillable = [
        'rango_puesto_id',
        'nombre_nivel'
    ];

    // * Relacion uno a muchos
    public function puestos()
    {
        return $this->hasMany('App\Models\Puesto');
    }

    //* Relacion muchos a uno
    public function rangos_nivel()
    {
        return $this->belongsTo('App\Models\Rango_puesto');
    }
}
