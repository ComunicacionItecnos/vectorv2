<?php

namespace App\Http\Livewire;

use Exception;
use Carbon\Carbon;
use App\Models\Area;
use Livewire\Component;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Colaborador;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class MultiContratos extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public $search, $perPage = '5';

    public $fecha_ingreso;
    public $puesto;

    public $no_colaborador_mount;
    public $sueldo, $sueldoLetra, $descripcionPuesto;
    public $datosContrato;
    public $fic, $ffc;

    protected $rules = [
        'fic' => 'required',
        'ffc' => 'required',
    ];

    protected $messages = [
        'fic.required' => 'Ingrese una fecha válida',
        'ffc.required' => 'Ingrese una fecha válida',
    ];

    public function mount()
    {
        $this->fecha_ingreso = Carbon::today()->isoFormat('YYYY-MM-DD');
        $this->fic = Carbon::today()->isoFormat('YYYY-MM-DD');
    }

    public function render()
    {
        return view('livewire.multi-contratos', [
            'colaboradores' => DB::table('colaborador')->where('puesto_id', $this->puesto)
                ->where('fecha_ingreso', $this->fecha_ingreso)
                /* ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC') */
                ->paginate($this->perPage),
        ]);
    }

    public function descargarContrato($no_colaborador)
    {
        $this->no_colaborador_mount = $no_colaborador;
        $this->datosContrato = Colaborador::where('no_colaborador', $this->no_colaborador_mount)->get();
        $this->setSueldo($this->datosContrato);
        $this->setDescripcion($this->datosContrato);

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

    public function setSueldo($datosContrato)
    {
        if ($datosContrato[0]->puesto_id == 111) {
            $this->sueldo = '6,019.55';
            $this->sueldoLetra = 'SEIS MIL DIECINUEVE PESOS 55/100';
        } elseif ($datosContrato[0]->puesto_id == 112) {
            $this->sueldo = '7,000.82';
            $this->sueldoLetra = '(SIETE MIL 82/100)';
        } elseif ($datosContrato[0]->puesto_id == 113) {
            $this->sueldo = '8,107.84';
            $this->sueldoLetra = 'OCHO MIL CIENTO SIETE 84/100';
        } elseif ($datosContrato[0]->puesto_id == 114) {
            $this->sueldo = '9,612.83';
            $this->sueldoLetra = 'NUEVE MIL SIESCIENTOS DOCE 83/100';
        } elseif ($datosContrato[0]->puesto_id == 116) {
            $this->sueldo = '11,377.36';
            $this->sueldoLetra = 'ONCE MIL TRESCIENTOS SETENTA Y SIETE 36/100';
        } elseif ($datosContrato[0]->puesto_id == 115) {
            $this->sueldo = '14,028.43';
            $this->sueldoLetra = 'CATORCE MIL VEINTIOCHO 43/100';
        }
    }

    public function setDescripcion($datosContrato)
    {
        if ($datosContrato[0]->area_id == 58 || $datosContrato[0]->area_id == 60) {
            $this->descripcionPuesto = 'Manejar equipos de medición, Brindar apoyo en mantenimiento a las áreas productivas, Realizar y detallar refacciones y herramientas, realizar trabajos de electricidad en los equipos o instalaciones que lo requieran, Brindar mantenimiento preventivo y correctivo en todas las áreas de la empresa.';
        } else {
            $this->descripcionPuesto = 'Operar la máquina asignada con eficiencia, Asegurar la calidad del producto de acuerdo a especificaciones, Pesar material y poner etiqueta de lotificación, Mantener equipo y área de trabajo limpios, Reportar la producción del día, Realizar ajustes específicos en máquina, Llenar hojas de proceso, Uso y manejo de escantillones.';
        }
    }
}
