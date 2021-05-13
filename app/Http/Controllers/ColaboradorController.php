<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Colaborador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ColaboradorController extends Controller
{
    public function createPDF()
    {

        $datosContrato = Colaborador::where('no_colaborador', '10479')->get();
        $infoColaborador = DB::table('infocolaborador')->where('no_colaborador', '10479')->get();

        $fecha_inicio_dia = Carbon::parse($datosContrato[0]->fecha_ingreso)->isoFormat('D');
        $fecha_inicio_mes = Carbon::parse($datosContrato[0]->fecha_ingreso)->isoFormat('MMMM');
        $fecha_inicio_year = Carbon::parse($datosContrato[0]->fecha_ingreso)->isoFormat('YYYY');


        $fecha_inicial_contrato = '2021-05-12';
        $fecha_inicial_contrato_dia = Carbon::parse($fecha_inicial_contrato)->isoFormat('D');
        $fecha_inicial_contrato_mes = Carbon::parse($fecha_inicial_contrato)->isoFormat('MMMM');
        $fecha_inicial_contrato_year = Carbon::parse($fecha_inicial_contrato)->isoFormat('YYYY');

        $fecha_final_contrato = '2021-06-12';
        $fecha_final_contrato_dia = Carbon::parse($fecha_final_contrato)->isoFormat('D');
        $fecha_final_contrato_mes = Carbon::parse($fecha_final_contrato)->isoFormat('MMMM');
        $fecha_final_contrato_year = Carbon::parse($fecha_final_contrato)->isoFormat('YYYY');

        $sueldo = '6,000.00';
        $sueldoLetra = 'Seis Mil Pesos';
        $descripcionPuesto = 'Operar la máquina asignada con eficiencia, Asegurar la calidad del producto de acuerdo a especificaciones, Pesar material y poner etiqueta de lotificación (si se requiere), Mantener equipo y área de trabajo limpios, Reportar la producción del día, Realizar ajustes específicos en máquina, Llenar hojas de Control, Uso y manejo de escantillones. Respetar las reglas de seguridad y utilizar el equipo de protección personal para el manejo seguro de explosivos.';
        //return response()->json(compact("datosContrato"));
        $pdf = PDF::loadView(
            'PDF/contrato_operativo_indeterminado',
            compact(
                "datosContrato",
                'infoColaborador',
                'descripcionPuesto',
                'sueldo',
                'sueldoLetra',
                'fecha_inicio_dia',
                'fecha_inicio_mes',
                'fecha_inicio_year',
                'fecha_inicial_contrato_dia',
                'fecha_inicial_contrato_mes',
                'fecha_inicial_contrato_year',
                'fecha_final_contrato_dia',
                'fecha_final_contrato_mes',
                'fecha_final_contrato_year'
            )
        );
        return $pdf->stream('colaboradores.pdf');
    }
}
