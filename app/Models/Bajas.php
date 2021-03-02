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
        'no_colaborador',
        'fecha_baja'
    ];
}
