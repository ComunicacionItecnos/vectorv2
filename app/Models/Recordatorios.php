<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recordatorios extends Model
{
    use HasFactory;

    protected $table='recordatorios';
    public $timestamps = true;

    protected $fillable = [
        'colaborador_no_colaborador',
        'descripcionRecordatorio',
        'fechaVencimiento',
        'frecuencia',
        'fechaFrecuencia',
        'estado_recordatorio',
        'created_at',
        'updated_at',
    ];

    public function colaborador()
    {
        return $this->belongsTo('App\Models\Colaborador');
    }

}
