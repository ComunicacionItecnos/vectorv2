<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Colaborador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ColaboradorController extends Controller
{
    public function createPDF()
    {

        $datosContrato = Colaborador::where('no_colaborador', '147190')->get();
        $infoColaborador = DB::table('infocolaborador')->where('no_colaborador', '147190')->get();
        $sueldo = '8,000.00';
        $sueldoLetra = 'Ocho Mil Pesos';
        $descripcionPuesto = 'Realiza el arte para todo tipo de comunicado interno, gestionarlas redes sociales internas, brinda apoyo log[istico y desarrollo en proyectos, programas, campañas, eventos, etc., realiza el levantamiento de imagenes en todo tipo de evento interno de la empresa, emite y coloca los impresos en todos los tableros internos manteniendolos actualizados semanalmente.';
        //return response()->json(compact("datosContrato"));
        $pdf = PDF::loadView('PDF/contrato', compact("datosContrato", 'infoColaborador','descripcionPuesto','sueldo','sueldoLetra'));
        return $pdf->stream('colaboradores.pdf');
    }
}
