<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_incidencia extends Model
{
    use HasFactory;

    protected $table = 'tipo_incidencia';

    public $timestamps = false;

    protected $fillable = [
        'nombre_incidencia',
    ];

    // * Relacion uno a muchos
    public function incidencias()
    {
        return $this->hasMany('App\Models\Incidencias');
    }

    public function incidencias_historial()
    {
        return $this->hasMany('App\Models\Incidencias_historial');
    }
}
