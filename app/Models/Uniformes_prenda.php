<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uniformes_prenda extends Model
{
    use HasFactory;

    protected $table = 'uniformes_prenda';

    protected $fillable = [
        'prenda'
    ];

    // * Relacion muchos a uno


    // * Relacion uno a muchos

    public function uniformes_prenda()
    {
        return $this->hasMany('App\Models\Uniformes_prenda');
    }

    public function uniformes_talla()
    {
        return $this->hasMany('App\Models\Uniformes_talla');
    }
}
