<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $fillable =[
        'nombre_municipio',
        'estado_id'
    ];

    public function nuevo_ingreso(){
        return $this->hasMany('App\Models\Nuevo_ingreso');
    }
}
