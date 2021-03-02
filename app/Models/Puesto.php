<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;

    protected $table = 'puesto';

    public $timestamps = false;

    protected $fillable = [
        'nivel_id',
        'especialidad_puesto'
    ];

    // * Relacion uno a muchos
    public function colaboradores()
    {
        return $this->hasMany('App\Models\Colaborador');
    }

    //* Relacion muchos a uno
    public function niveles()
    {
        return $this->belongsTo('App\Models\Nivel');
    }
}
