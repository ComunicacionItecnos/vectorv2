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

        $datosContrato = Colaborador::where('no_colaborador', '147612')->get();
        $infoColaborador = DB::table('infocolaborador')->where('no_colaborador', '147612')->get();

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
        $descripcionPuesto = 'Gestionar que las accion es preventivas ante Sars-cov 2 e lleven a cabo, Funcion como monitora ante la contingencia, Reportar las actividades diarias de consultas, acciones preventivas, de diagnostico, laboratorio y suministro de mdicamentos o vacunas,m para conocimiento de su jefe inmediato. Administracion de los insumos asi como su control ( citas, medicamentos/material de curaciones). Apoyar para el cumplimiento de la norma 030-STPS. Tomar y registrar datos generales y signos vitales del personal, preparandolos para consulta del medico tratante. Seguimiento y cumplimiento a los programas ya implementados en el area de salud. Mantener limpio y esterilizado el material y equipo. REalizar a los pacientes toma de muestras, estudios, examenes clinicos, conforme a las indicaciones del medico tratante. participar en la elaboracion de informes, confrme a los procedimientos establecidos para tal efecto.';
        //return response()->json(compact("datosContrato"));
        $pdf = PDF::loadView(
            'PDF/contrato_administrativo',
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
