<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'nombre_estado',
        'pais'
    ];

    public function nuevo_ingreso(){
        return $this->hasMany('App\Models\Nuevo_ingreso');
    }

    public function nacionalidad(){
        return $this->hasMany('App\Models\Nacionalidad');
    }
}
