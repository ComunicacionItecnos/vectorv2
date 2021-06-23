<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marbete extends Model
{
    use HasFactory;

    protected $table = 'marbete';

    public $timestamps = false;

    protected $fillable = [
        'tipo',
    ];

    // * Relacion uno a muchos
    public function estacionamientos()
    {
        return $this->hasMany('App\Models\Estacionamiento');
    }
}
