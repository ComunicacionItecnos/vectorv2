<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insignia extends Model
{
    use HasFactory;

    protected $table = 'insignia';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'ruta_insignia'
    ];

    // * Relacion uno a muchos
    public function colaboradores_insignia()
    {
        return $this->hasMany('App\Models\Colaborador_insignia');
    }
}
