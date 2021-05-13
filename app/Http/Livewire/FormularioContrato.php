<?php

namespace App\Http\Livewire;

use Exception;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Colaborador;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class FormularioContrato extends Component
{
    public $no_colaborador_mount;
    public $sueldo, $sueldoLetra, $descripcionPuesto;
    public $datosContrato;
    public $ffc, $fic;

    protected $rules = [
        'sueldo' => 'required',
        'sueldoLetra' => 'required',
        'fic' => 'required',
        'descripcionPuesto' => 'required',
    ];

    protected $messages = [
        'sueldo.required' => 'El sueldo con número no puede estar vacío',
        'sueldoLetra.required' => 'El sueldo con letra no puede estar vacío',
        'fic.required' => 'Ingrese una fecha válida',
        'descripcionPuesto.required' => 'La descripción del puesto no puede estar vacía',
    ];

    public function mount($no_colaborador)
    {
        $this->no_colaborador_mount = $no_colaborador;
        $this->datosContrato = Colaborador::where('no_colaborador', $this->no_colaborador_mount)->get();

        $this->fic = Carbon::today()->isoFormat('YYYY-MM-DD');
    }

    public function createPDF()
    {
        $this->validate();

        $infoColaborador = DB::table('infocolaborador')->where('no_colaborador', $this->no_colaborador_mount)->get();

        $fecha_inicio_dia = Carbon::parse($this->datosContrato[0]->fecha_ingreso)->isoFormat('D');
        $fecha_inicio_mes = Carbon::parse($this->datosContrato[0]->fecha_ingreso)->isoFormat('MMMM');
        $fiy = Carbon::parse($this->datosContrato[0]->fecha_ingreso)->isoFormat('YYYY');
        $fecha_inicio_year = intval($fiy);

        $fecha_inicial_contrato = $this->fic;
        $fecha_inicial_contrato_dia = Carbon::parse($fecha_inicial_contrato)->isoFormat('D');
        $fecha_inicial_contrato_mes = Carbon::parse($fecha_inicial_contrato)->isoFormat('MMMM');
        $fecha_inicial_contrato_year = Carbon::parse($fecha_inicial_contrato)->isoFormat('YYYY');

        $fecha_final_contrato = $this->ffc;
        $fecha_final_contrato_dia = Carbon::parse($fecha_final_contrato)->isoFormat('D');
        $fecha_final_contrato_mes = Carbon::parse($fecha_final_contrato)->isoFormat('MMMM');
        $fecha_final_contrato_year = Carbon::parse($fecha_final_contrato)->isoFormat('YYYY');

        $viewData = [
            'datosContrato' => $this->datosContrato,
            'infoColaborador' => $infoColaborador,
            'fecha_inicio_dia' => $fecha_inicio_dia,
            'fecha_inicio_mes' => $fecha_inicio_mes,
            'fecha_inicio_year' => $fecha_inicio_year,
            'fecha_inicial_contrato_dia' => $fecha_inicial_contrato_dia,
            'fecha_inicial_contrato_mes' => $fecha_inicial_contrato_mes,
            'fecha_inicial_contrato_year' => $fecha_inicial_contrato_year,
            'fecha_final_contrato_dia' => $fecha_final_contrato_dia,
            'fecha_final_contrato_mes' => $fecha_final_contrato_mes,
            'fecha_final_contrato_year' => $fecha_final_contrato_year,
            'sueldo' => $this->sueldo,
            'sueldoLetra' => $this->sueldoLetra,
            'descripcionPuesto' => $this->descripcionPuesto
        ];


        if ($this->datosContrato[0]->tipo_colaborador_id == 2) {
            $pdfContent = PDF::loadView('pdf.contrato_administrativo', $viewData)->output();
            return response()->streamDownload(
                fn () => print($pdfContent),
                $this->datosContrato[0]->no_colaborador . ".pdf"
            );
        } elseif ($this->datosContrato[0]->tipo_colaborador_id == 1 && $this->datosContrato[0]->tipo_contrato_id == 2) {
            $pdfContent = PDF::loadView('pdf.contrato_operativo', $viewData)->output();
            return response()->streamDownload(
                fn () => print($pdfContent),
                $this->datosContrato[0]->no_colaborador . ".pdf"
            );
        } elseif ($this->datosContrato[0]->tipo_colaborador_id == 1 && $this->datosContrato[0]->tipo_contrato_id == 3) {
            $pdfContent = PDF::loadView('pdf.contrato_operativo_indeterminado', $viewData)->output();
            return response()->streamDownload(
                fn () => print($pdfContent),
                $this->datosContrato[0]->no_colaborador . ".pdf"
            );
        }
    }

    public function render()
    {
        return view('livewire.formulario-contrato');
    }
}
