<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class utilesEscolares extends Model
{
    use HasFactory;

    protected $table="utiles_escolares";

    protected $fillable =[
        'colaborador_no_colaborador',
        'escolaridad_id',
    ];

    public function colaboradores(){
        return $this->belongsTo('App\Models\Colaborador');
    }

    public function escolaridades(){
        return $this->belongsTo('App\Models\Escolaridad');
    }


}
