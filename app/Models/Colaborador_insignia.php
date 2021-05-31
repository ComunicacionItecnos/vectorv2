<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador_insignia extends Model
{
    use HasFactory;

    protected $table = 'colaborador_insignia';
    public $timestamps = false;

    protected $fillable = [
        'colaborador_no_colaborador',
        'insignia_id',
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

}
