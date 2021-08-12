<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uniformes_colaborador extends Model
{
    use HasFactory;

    protected $table = 'uniformes_colaborador';

    protected $fillable = [
        'colaborador_no_colaborador',
        'uniformes_paquete_id',
        'uniformes_prenda_id',
        'uniformes_talla_id'
    ];

    // * Relacion muchos a uno

    public function colaboradores()
    {
        return $this->belongsTo('App\Models\Colaborador');
    }

    public function paquetes()
    {
        return $this->belongsTo('App\Models\Uniformes_paquete');
    }

    public function prendas()
    {
        return $this->belongsTo('App\Models\Uniformes_prenda');
    }

    public function tallas()
    {
        return $this->belongsTo('App\Models\Uniformes_talla');
    }
}
