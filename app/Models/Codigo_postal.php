<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Codigo_postal extends Model
{
    use HasFactory;

    protected $table = 'codigo_postal';

    public $timestamps = false;

    protected $fillable = [
        'codigo_postal_id',
        'codigo_postal'
    ];

    // * Relacion uno a muchos
    public function colaboradores()
    {
        return $this->hasMany('App\Models\Colaborador');
    }
}
