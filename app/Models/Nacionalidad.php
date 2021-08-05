<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{
    use HasFactory;

    protected $table = 'nacionalidad';

    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'pais',
        'nacionalidad'
    ];

    // * Relacion uno a muchos
    public function colaboradores()
    {
        return $this->hasMany('App\Models\Colaborador');
    }

    public function nuevo_ingreso(){
        return $this->hasMany('App\Models\Nuevo_ingreso');
    }
}
