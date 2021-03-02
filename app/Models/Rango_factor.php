<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rango_factor extends Model
{
    use HasFactory;

    protected $table = 'rango_factor';

    public $timestamps = false;

    protected $fillable = [
        'nombre_rango'
    ];

    // * Relacion uno a muchos
    public function colaboradores()
    {
        return $this->hasMany('App\Models\Colaborador');
    }
}
