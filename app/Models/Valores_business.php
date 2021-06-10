<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valores_business extends Model
{
    use HasFactory;

    protected $table = 'valores_business';

    public $timestamps = false;

    protected $fillable = [
        'nombre'
    ];

    // * Relacion uno a muchos
    public function colaboradores_insignia()
    {
        return $this->hasMany('App\Models\Colaborador_insignia');
    }
}
