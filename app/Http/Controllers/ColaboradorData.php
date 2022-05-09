<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use Illuminate\Http\Request;

class ColaboradorData extends Controller
{
    public function index($id)
    {
        return response()->json( Colaborador::where('no_colaborador','=',$id)->get() );
    }
}
