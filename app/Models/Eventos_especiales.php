<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventos_especiales extends Model
{
    use HasFactory;

    protected $table = 'eventos_especiales';

    public $timestamps = false;

    protected $fillable = [
        'nombre_evento'
    ];

    // * Relacion uno a muchos
    public function colaboradores_evento()
    {
        return $this->hasMany('App\Models\Colaborador_evento');
    }
}
