<?php

namespace App\Http\Livewire;

use Exception;
use Carbon\Carbon;
use App\Models\Colaborador_insignia;
use App\Models\Area;
use App\Models\Puesto;
use Livewire\Component;
use App\Models\Colaborador;
use Livewire\WithPagination;
use App\Models\Tipo_colaborador;
use Illuminate\Support\Facades\DB;

class Insignias extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public $search, $perPage = '50';
    public $no_colaborador, $colaborador;

    public $sortBy = 'id';
    public $sortAsc = false;

    public $col_premiado, $foto_premiado;
    public $area, $puesto;

    public $tipo_insignia, $mensaje, $fecha_asig;

    public $yearActual, $mesActual, $diaActual, $fechaActual;

    public $tInicialP1 = '-01-01', $tFinalP1 = '-03-31';
    public $tInicialP2 = '-04-01', $tFinalP2 = '-06-30';
    public $tInicialP3 = '-07-01', $tFinalP3 = '-09-30';
    public $tInicialP4 = '-10-01', $tFinalP4 = '-12-31';

    public $banderaIntentos, $banderaPremiado;

    public $intentoOro, $intentoPlata, $intentoBronce, $finalOro, $finalPlata, $finalBronce;

    protected $rules = [
        'tipo_insignia' => 'required',
        'mensaje' => 'required'
    ];

    protected $messages = [
        'tipo_insignia.required' => 'Es necesario que elijas una insignia',
        'mensaje.required' => 'Debes agregar un mensaje de retroalimentación'
    ];

    public function mount($no_colaborador)
    {
        $this->colaborador = Colaborador::find($no_colaborador);
        $this->col_premiado = $no_colaborador;
        $this->yearActual = Carbon::today()->isoFormat('YYYY');
        $this->mesActual = Carbon::today()->isoFormat('MM');
        $this->diaActual = Carbon::today()->isoFormat('DD');
        $this->fechaActual = Carbon::today()->isoFormat('YYYY-MM-DD');
    }

    public function render()
    {
        $areas = Area::select('*')->orderBy('nombre_area', 'ASC')->get();
        $puestos = Puesto::join('nivel', 'nivel.id', 'puesto.nivel_id')
            ->select('puesto.id', 'puesto.especialidad_puesto', 'nivel.nombre_nivel')
            ->get();
        $tiposColaborador = Tipo_colaborador::all();

        $premiados = Colaborador::select('no_colaborador', 'nombre_1', 'nombre_2', 'ap_paterno', 'ap_materno')
            ->orderBy('ap_paterno', 'ASC')
            ->get();

        if ($this->fechaActual >= $this->yearActual . '-01-01' && $this->fechaActual <= $this->yearActual . '-03-31') {
            return view('livewire.insignias', [
                'colaboradores' => DB::table('v_insignias')->where('no_colaborador_premiado', 'LIKE', "%{$this->search}%")
                    ->orWhere('fecha_asignacion', 'BETWEEN', $this->yearActual . '-01-01', 'and', $this->yearActual . '-03-31')
                    ->orWhere('nombre_completo_premiado', 'LIKE', "%{$this->search}%")
                    ->orWhere('insignia_id', 'LIKE', "%{$this->search}%")
                    ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
                    ->paginate($this->perPage)
            ], compact(
                'premiados',
                'areas',
                'puestos',
                'tiposColaborador'
            ));
        } elseif ($this->fechaActual >= $this->yearActual . '-04-01' && $this->fechaActual <= $this->yearActual . '-06-30') {
            return view('livewire.insignias', [
                'colaboradores' => DB::table('v_insignias')->where('no_colaborador_premiado', 'LIKE', "%{$this->search}%")
                    ->orWhere('fecha_asignacion', 'BETWEEN', $this->yearActual . '-04-01', 'and', $this->yearActual . '-06-30')
                    ->orWhere('nombre_completo_premiado', 'LIKE', "%{$this->search}%")
                    ->orWhere('insignia_id', 'LIKE', "%{$this->search}%")
                    ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
                    ->paginate($this->perPage)
            ], compact(
                'premiados',
                'areas',
                'puestos',
                'tiposColaborador'
            ));
        } elseif ($this->fechaActual >= $this->yearActual . '-07-01' && $this->fechaActual <= $this->yearActual . '-09-30') {
            return view('livewire.insignias', [
                'colaboradores' => DB::table('v_insignias')->where('no_colaborador_premiado', 'LIKE', "%{$this->search}%")
                    ->orWhere('fecha_asignacion', 'BETWEEN', $this->yearActual . '-07-01', 'and', $this->yearActual . '-09-30')
                    ->orWhere('nombre_completo_premiado', 'LIKE', "%{$this->search}%")
                    ->orWhere('insignia_id', 'LIKE', "%{$this->search}%")
                    ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
                    ->paginate($this->perPage)
            ], compact(
                'premiados',
                'areas',
                'puestos',
                'tiposColaborador'
            ));
        } elseif ($this->fechaActual >= $this->yearActual . '-10-01' && $this->fechaActual <= $this->yearActual . '-12-31') {
            return view('livewire.insignias', [
                'colaboradores' => DB::table('v_insignias')->where('no_colaborador_premiado', 'LIKE', "%{$this->search}%")
                    ->orWhere('fecha_asignacion', 'BETWEEN', $this->yearActual . '-10-01', 'and', $this->yearActual . '-12-31')
                    ->orWhere('nombre_completo_premiado', 'LIKE', "%{$this->search}%")
                    ->orWhere('insignia_id', 'LIKE', "%{$this->search}%")
                    ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
                    ->paginate($this->perPage)
            ], compact(
                'premiados',
                'areas',
                'puestos',
                'tiposColaborador'
            ));
        }
    }

    public function asignacion()
    {
        $this->validate();
        $this->revisarIntentosYPremiados();

        if ($this->banderaPremiado == false) {
            $this->alert('error', 'Este colaborador ya ha sido premiado', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
        } else {

            if ($this->tipo_insignia == 1 && $this->finalOro >= 1) {
                $this->insercionBD();
            } elseif ($this->tipo_insignia == 2 && $this->finalPlata >= 1) {
                $this->insercionBD();
            } elseif ($this->tipo_insignia == 3 && $this->finalBronce >= 1) {
                $this->insercionBD();
            } else {
                $this->alert('error', 'Agotaste tus intentos para asignar esta insignia', [
                    'position' =>  'top-end',
                    'timer' =>  3000,
                    'toast' =>  true,
                    'text' =>  '',
                    'confirmButtonText' =>  'Ok',
                    'cancelButtonText' =>  'Cancel',
                    'showCancelButton' =>  false,
                    'showConfirmButton' =>  false,
                ]);
            }
        }
    }

    public function insercionBD()
    {
        try {

            $this->fecha_asig = $this->fechaActual;

            DB::transaction(function () {
                Colaborador_insignia::updateOrCreate([
                    'colaborador_no_colaborador' => $this->col_premiado,
                    'insignia_id' => $this->tipo_insignia,
                    'fecha_asignacion' => $this->fecha_asig,
                    'colaborador_asignador' => auth()->user()->no_colaborador,
                    'mensaje' => $this->mensaje
                ]);
            });

            $this->flash('success', 'Se asignó correctamente la insignia', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
            return redirect()->to('/insignias/' . $this->colaborador->no_colaborador);
        } catch (Exception $ex) {

            dd($ex);

            $this->alert('error', 'Error al asignar', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
        }
    }

    public function revisarIntentosYPremiados()
    {
        if ($this->fechaActual >= $this->yearActual . $this->tInicialP1 && $this->fechaActual <= $this->yearActual . $this->tFinalP1) {
            $this->asignaIntentos();
            $this->revisarIntentosPeriodo($this->tInicialP1, $this->tFinalP1);
            $this->revisarPremiadoPeriodo($this->tInicialP1, $this->tFinalP1);
        } elseif ($this->fechaActual >= $this->yearActual . $this->tInicialP2 && $this->fechaActual <= $this->yearActual . $this->tFinalP2) {
            $this->asignaIntentos();
            $this->revisarIntentosPeriodo($this->tInicialP2, $this->tFinalP2);
            $this->revisarPremiadoPeriodo($this->tInicialP2, $this->tFinalP2);
        } elseif ($this->fechaActual >= $this->yearActual . $this->tInicialP3 && $this->fechaActual <= $this->yearActual . $this->tFinalP3) {
            $this->asignaIntentos();
            $this->revisarIntentosPeriodo($this->tInicialP3, $this->tFinalP3);
            $this->revisarPremiadoPeriodo($this->tInicialP3, $this->tFinalP3);
        } elseif ($this->fechaActual >= $this->yearActual . $this->tInicialP4 && $this->fechaActual <= $this->yearActual . $this->tFinalP4) {
            $this->asignaIntentos();
            $this->revisarIntentosPeriodo($this->tInicialP4, $this->tFinalP4);
            $this->revisarPremiadoPeriodo($this->tInicialP4, $this->tFinalP4);
        }
    }

    public function revisarIntentosPeriodo($tIinicial, $tfinal)
    {
        // ? Intentos Oro

        $tmpOro = Colaborador_insignia::all()
            ->where('insignia_id', 1)
            ->WhereBetween('fecha_asignacion', [$this->yearActual . $tIinicial, $this->yearActual . $tfinal])
            ->count();

        $this->finalOro = $this->intentoOro - $tmpOro;

        if ($this->finalOro <= 0) {
            $this->finalOro = 0;
        }

        // ? Intentos Plata

        $tmpPlata = Colaborador_insignia::all()
            ->where('insignia_id', 2)
            ->WhereBetween('fecha_asignacion', [$this->yearActual . $tIinicial, $this->yearActual . $tfinal])
            ->count();

        $this->finalPlata = $this->intentoPlata - $tmpPlata;

        if ($this->finalPlata <= 0) {
            $this->finalPlata = 0;
        }

        // ? Intentos Bronce

        $tmpBronce = Colaborador_insignia::all()
            ->where('insignia_id', 3)
            ->WhereBetween('fecha_asignacion', [$this->yearActual . $tIinicial, $this->yearActual . $tfinal])
            ->count();

        $this->finalBronce = $this->intentoBronce - $tmpBronce;

        if ($this->finalBronce <= 0) {
            $this->finalBronce = 0;
        }
    }

    public function asignaIntentos()
    {

        if (auth()->user()->no_colaborador == '143010') {
            $this->intentoOro = 2;
            $this->intentoPlata = 2;
            $this->intentoBronce = 1;
        } elseif (auth()->user()->no_colaborador == '135050') {
            $this->intentoOro = 2;
            $this->intentoPlata = 1;
            $this->intentoBronce = 1;
        } else {
            $this->intentoOro = 1;
            $this->intentoPlata = 1;
            $this->intentoBronce = 1;
        }
    }

    public function revisarPremiadoPeriodo($tIinicial, $tfinal)
    {
        $tmpPremiado = Colaborador_insignia::all()
            ->where('colaborador_no_colaborador', $this->col_premiado)
            ->WhereBetween('fecha_asignacion', [$this->yearActual . $tIinicial, $this->yearActual . $tfinal])
            ->count();

        if ($tmpPremiado == 0) {
            $this->banderaPremiado = true;
        } else {
            $this->banderaPremiado = false;
        }
    }
}
