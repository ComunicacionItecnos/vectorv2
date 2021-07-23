<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencias extends Model
{
    use HasFactory;

    protected $table = 'incidencias';
    public $timestamps = false;

    protected $fillable = [
        'colaborador_no_colaborador',
        'tipo_incidencia_id',
        'fecha_incidencia',
    ];

    //* Relacion muchos a uno
    public function tipos_incidencias()
    {
        return $this->belongsTo('App\Models\Tipo_incidencia');
    }

    public function colaboradores()
    {
        return $this->belongsTo('App\Models\Colaborador');
    }
}
