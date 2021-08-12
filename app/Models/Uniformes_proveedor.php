<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uniformes_proveedor extends Model
{
    use HasFactory;

    protected $table = 'uniformes_proveedor';

    protected $fillable = [
        'nombre_proveedor'
    ];

    // * Relacion uno a muchos
    public function uniformes_prenda()
    {
        return $this->hasMany('App\Models\Uniformes_prenda');
    }
}
