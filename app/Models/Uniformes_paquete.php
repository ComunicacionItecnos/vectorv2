<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uniformes_paquete extends Model
{
    use HasFactory;

    protected $table = 'uniformes_paquete';

    protected $fillable = [
        'nombre_paquete',
    ];

    // * Relacion uno a muchos
    public function uniformes_paquete_prenda()
    {
        return $this->hasMany('App\Models\Uniformes_paquete_prenda');
    }

    public function colaboradores_uniforme_paquete()
    {
        return $this->hasMany('App\Models\Colaborador_paquete_uniforme');
    }
}
