<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador_unidad_negocio extends Model
{
    use HasFactory;

    protected $table = 'colaborador_unidad_negocio';
    public $timestamps = false;

    protected $fillable = [
        'colaborador_no_colaborador',
        'unidad_negocio_grupo_id',
    ];

    // * Relacion muchos a uno
    public function unidades_negocio_grupo()
    {
        return $this->belongsTo('App\Models\Unidad_negocio_grupo');
    }

    public function colaboradores()
    {
        return $this->belongsTo('App\Models\Colaborador');
    }
}
