<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_vehiculo extends Model
{
    use HasFactory;
    
    protected $table = 'tipo_vehiculo';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];

    // * Relacion uno a muchos
    public function marbete()
    {
        return $this->hasMany('App\Models\Marbete');
    }

    // * Relacion uno a muchos
    public function vehiculos()
    {
        return $this->hasMany('App\Models\Vehiculo');
    }
}
