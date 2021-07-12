<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad_negocio_colaborador_insignia extends Model
{
    use HasFactory;

    protected $table = 'unidad_negocio_colaborador_insignia';
    public $timestamps = false;

    protected $fillable = [
        'colaborador_no_colaborador',
        'insignia_id',
        'valores_business_id',
        'fecha_asignacion',
        'colaborador_asignador',
        'mensaje'
    ];

    //* Relacion muchos a uno
    public function insignias()
    {
        return $this->belongsTo('App\Models\Insignia');
    }

    public function colaboradores()
    {
        return $this->belongsTo('App\Models\Colaborador');
    }

    public function valores_business()
    {
        return $this->belongsTo('App\Models\Valores_business');
    }
}
