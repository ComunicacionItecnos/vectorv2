<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta_transporte extends Model
{
    use HasFactory;

    protected $table = 'ruta_transporte';

    public $timestamps = false;

    protected $fillable = [
        'nombre_ruta'
    ];

    // * Relacion uno a muchos
    public function colaboradores()
    {
        return $this->hasMany('App\Models\Colaborador');
    }
}
