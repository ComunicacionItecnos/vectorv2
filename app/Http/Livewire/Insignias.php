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

    public $sortBy = 'no_colaborador_premiado';
    public $sortAsc = false;

    public $col_premiado, $foto_premiado;
    public $area, $puesto;

    public $tipo_insignia, $mensaje, $fecha_asig;

    public $yearActual, $mesActual, $diaActual, $fechaActual;

    public $banderaIntentos, $banderaPremiado;

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

        if (Carbon::today()->isoFormat('YYYY-MM-DD') >= '2021-01-01' && Carbon::today()->isoFormat('YYYY-MM-DD') <= '2021-03-31') {
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
        } elseif (Carbon::today()->isoFormat('YYYY-MM-DD') >= '2021-04-01' && Carbon::today()->isoFormat('YYYY-MM-DD') <= '2021-06-30') {
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
        } elseif (Carbon::today()->isoFormat('YYYY-MM-DD') >= '2021-07-01' && Carbon::today()->isoFormat('YYYY-MM-DD') <= '2021-09-30') {
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
        } elseif (Carbon::today()->isoFormat('YYYY-MM-DD') >= '2021-10-01' && Carbon::today()->isoFormat('YYYY-MM-DD') <= '2021-12-31') {
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
        try {

            $this->fecha_asig = Carbon::today()->isoFormat('YYYY-MM-DD');

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

    public function revisarIntentos()
    {
    }

    public function revisarPremiado()
    {
    }
}
