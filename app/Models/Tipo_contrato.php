<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_contrato extends Model
{
    use HasFactory;

    protected $table = 'tipo_contrato';

    public $timestamps = false;

    protected $fillable = [
        'contrato',
    ];

    // * Relacion uno a muchos
    public function colaboradores()
    {
        return $this->hasMany('App\Models\Colaborador');
    }
}
