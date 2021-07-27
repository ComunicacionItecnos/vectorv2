<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bajas extends Model
{
    use HasFactory;

    protected $table = 'bajas';

    public $timestamps = false;

    protected $fillable = [
        'colaborador_no_colaborador',
        'autorizoBaja',
        'fecha_baja'
    ];


    public function colaborador()
    {
        return $this->belongsTo('App\Models\Colaborador');
    }
}
