<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class ColaboradorController extends Controller
{
    public function createPDF()
    {

        $datosContrato = Colaborador::where('no_colaborador', '147190')->get();
        //return response()->json(compact("datosContrato"));
        $pdf = PDF::loadView('PDF/contrato', compact("datosContrato"));
        return $pdf->stream('colaboradores.pdf');
    }
}
