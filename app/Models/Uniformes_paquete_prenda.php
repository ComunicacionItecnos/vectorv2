<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uniformes_paquete_prenda extends Model
{
    use HasFactory;

    protected $table = 'uniformes_paquete_prenda';

    protected $fillable = [
        'uniformes_paquete_id',
        'uniformes_prenda_id',
    ];

    // * Relacion muchos a uno

    public function uniformes_paquete()
    {
        return $this->belongsTo('App\Models\Uniformes_paquete');
    }

    public function uniformes_prenda()
    {
        return $this->belongsTo('App\Models\Uniformes_prenda');
    }
}
