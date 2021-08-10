<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado_civil extends Model
{
    use HasFactory;

    protected $table = 'estado_civil';

    public $timestamps = false;

    protected $fillable = [
        'nombre_estado'
    ];

    // * Relacion uno a muchos
    public function colaboradores()
    {
        return $this->hasMany('App\Models\Colaborador');
    }
    
    public function actualizar_colaboradors(){
        return $this->hasMany('App\Models\Actualizar_colaborador');
    }
    
    public function nuevo_ingreso(){
        return $this->hasMany('App\Models\Nuevo_ingreso');
    }

}
