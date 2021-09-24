<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador_paquete_uniforme extends Model
{
    use HasFactory;

    protected $table = 'colaborador_uniforme_paquete';

    protected $fillable = [
        'colaborador_no_colaborador',
        'uniforme_paquete_id',
        'uniforme_talla_id',
    ];

    //* Relacion muchos a uno
    public function uniforme_paquetes()
    {
        return $this->belongsTo('App\Models\Uniformes_paquete');
    }
    public function uniforme_tallas()
    {
        return $this->belongsTo('App\Models\Uniformes_talla');
    }
}
