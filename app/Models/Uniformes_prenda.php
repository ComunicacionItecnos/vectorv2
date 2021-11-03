<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uniformes_prenda extends Model
{
    use HasFactory;

    protected $table = 'uniformes_prenda';

    protected $fillable = [
        'uniformes_proveedor_id',
        'prenda'
    ];

    // * Relacion muchos a uno

    public function uniformes_proveedor()
    {
        return $this->belongsTo('App\Models\Uniformes_proveedor');
    }

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
