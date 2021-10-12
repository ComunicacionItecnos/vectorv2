<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uniformes_talla extends Model
{
    use HasFactory;

    protected $table = 'uniformes_talla';

    protected $fillable = [
        'uniformes_prenda_id',
        'talla'
    ];

    // * Relacion muchos a uno
    public function uniformes_prenda()
    {
        return $this->belongsTo('App\Models\Uniformes_prenda');
    }

    public function colaboradores_uniforme_paquete()
    {
        return $this->hasMany('App\Models\Colaborador_paquete_uniforme');
    }
}
