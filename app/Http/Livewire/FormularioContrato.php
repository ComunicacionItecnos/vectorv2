<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Colaborador;
use Illuminate\Support\Facades\DB;

class FormularioContrato extends Component
{
    public $no_colaborador_mount;
    public $sueldo, $sueldoLetra, $descripcionPuesto;

    protected $rules = [
        'sueldo' => 'required',
        'sueldoLetra' => 'required',
        'descripcionPuesto' => 'required',
    ];

    protected $messages = [
        'sueldo.required' => 'El sueldo con número no puede estar vacío',
        'sueldoLetra.required' => 'El sueldo con letra no puede estar vacío',
        'descripcionPuesto.required' => 'La descripción del puesto no puede estar vacía',
    ];

    public function mount($no_colaborador){
        $this->no_colaborador_mount = $no_colaborador;
    }

    public function createPDF()
    {
        $this->validate();

        $datosContrato = Colaborador::where('no_colaborador', $this->no_colaborador_mount)->get();
        $infoColaborador = DB::table('infocolaborador')->where('no_colaborador', $this->no_colaborador_mount)->get();

        $fecha_inicio_dia = Carbon::parse($datosContrato[0]->fecha_ingreso)->isoFormat('D');
        $fecha_inicio_mes = Carbon::parse($datosContrato[0]->fecha_ingreso)->isoFormat('MMMM');
        $fiy = Carbon::parse($datosContrato[0]->fecha_ingreso)->isoFormat('YYYY');
        $fecha_inicio_year = intval($fiy);

        $fecha_inicial_contrato = '2021-05-11';
        $fecha_inicial_contrato_dia = Carbon::parse($fecha_inicial_contrato)->isoFormat('D');
        $fecha_inicial_contrato_mes = Carbon::parse($fecha_inicial_contrato)->isoFormat('MMMM');
        $fecha_inicial_contrato_year = Carbon::parse($fecha_inicial_contrato)->isoFormat('YYYY');

        $fecha_final_contrato = '2021-06-11';
        $fecha_final_contrato_dia = Carbon::parse($fecha_final_contrato)->isoFormat('D');
        $fecha_final_contrato_mes = Carbon::parse($fecha_final_contrato)->isoFormat('MMMM');
        $fecha_final_contrato_year = Carbon::parse($fecha_final_contrato)->isoFormat('YYYY');

        $viewData = [
            'datosContrato' => $datosContrato,
            'infoColaborador' => $infoColaborador,
            'fecha_inicio_dia' => $fecha_inicio_dia,
            'fecha_inicio_mes' => $fecha_inicio_mes,
            'fecha_inicio_year' => $fecha_inicio_year,
            'fecha_inicial_contrato_dia' => $fecha_inicial_contrato_dia,
            'fecha_inicial_contrato_mes' => $fecha_inicial_contrato_mes,
            'fecha_inicial_contrato_year' => $fecha_inicial_contrato_year,
            'fecha_final_contrato__dia' => $fecha_final_contrato_dia,
            'fecha_final_contrato_mes' => $fecha_final_contrato_mes,
            'fecha_final_contrato_year' => $fecha_final_contrato_year,
            'sueldo' => $this->sueldo,
            'sueldoLetra' => $this->sueldoLetra,
            'descripcionPuesto' => $this->descripcionPuesto
        ];

        if($datosContrato[0]->tipo_colaborador_id == 2){
            $pdfContent = PDF::loadView('pdf.contrato_administrativo', $viewData)->output();
            return response()->streamDownload(
                fn () => print($pdfContent),
                $datosContrato[0]->no_colaborador . ".pdf"
            );
        }elseif ($datosContrato[0]->tipo_colaborador_id == 1) {
            
        }
        
    }

    public function render()
    {
        return view('livewire.formulario-contrato');
    }
}
