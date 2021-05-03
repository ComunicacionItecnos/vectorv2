<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rango_puesto extends Model
{
    use HasFactory;

    protected $table = 'rango_puesto';

    public $timestamps = false;

    protected $fillable = [
        'rango'
    ];

    // * Relacion uno a muchos
    public function puestos()
    {
        return $this->hasMany('App\Models\Puesto');
    }
}
