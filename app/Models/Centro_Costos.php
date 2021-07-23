<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centro_Costos extends Model
{
    use HasFactory;

    protected $table = 'centro_costos';

    public $timestamps = false;

    protected $fillable = [
        'no_centro_costo',
        'descripcion'
    ];

    // * Relacion uno a muchos
    public function areas()
    {
        return $this->hasMany('App\Models\Area');
    }
}
