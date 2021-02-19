<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escolaridad extends Model
{
    use HasFactory;

    // * Relacion uno a muchos
    public function hijos()
    {
        return $this->hasMany('App\Models\Hijos');
    }
}
