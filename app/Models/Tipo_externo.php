<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_externo extends Model
{
    use HasFactory;

    protected $table = 'tipo_externo';

    protected $fillable = [
        'tipo'
    ];

    // * Relacion uno a muchos
    public function externos()
    {
        return $this->hasMany('App\Models\Externo');
    }
}
