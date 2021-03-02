<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clave_radio extends Model
{
    use HasFactory;

    protected $table = 'clave_radio';

    public $timestamps = false;

    protected $fillable = [
        'clave',
        'compartida',
        'dsponibilidad',
    ];

    // * Relacion uno a muchos
    public function colaboradores()
    {
        return $this->hasMany('App\Models\Colaborador');
    }
}
