<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revision_doc extends Model
{
    use HasFactory;

    protected $fillable= [
        "nuevo_ingreso_id",
        "areaRd",
        "R_obscredencial",
        "R_obsfecNac",
        "R_obscurp",
        "R_obsrfc",
        "R_obsimss",
        "R_obsdomicilio",
        "R_obsNivelEstudios",
        "R_obscartaNoPenales",
        "R_obsExtra",
        "A_obscredencial",
        "A_obsfecNac",
        "A_obscurp",
        "A_obsrfc",
        "A_obsimss",
        "A_obsdomicilio",
        "A_obsNivelEstudios",
        "A_obscartaNoPenales",
        "A_obsExtra",
        "status",
        "R_userId",
        "A_userId"
    ];
}
