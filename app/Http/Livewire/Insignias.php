<?php

namespace App\Http\Livewire;

use App\Mail\NotificaInsignias;
use App\Mail\NotificaInsigniasAsignador;
use Exception;
use Carbon\Carbon;
use App\Models\Area;
use App\Models\Puesto;
use Livewire\Component;
use App\Models\Colaborador;
use Livewire\WithPagination;
use App\Models\Tipo_colaborador;
use Illuminate\Support\Facades\DB;
use App\Models\Colaborador_insignia;
use App\Models\Valores_business;
use Illuminate\Support\Facades\Mail;

class Insignias extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public $search, $perPage = '50';
    public $no_colaborador, $colaborador, $infoColaborador, $infoAsignador;
    public $correoAsignador, $correoPremiado;

    public $sortBy = 'id';
    public $sortAsc = false;

    public $col_premiado, $foto_premiado, $valor_business, $valores;
    public $area, $puesto;

    public $tipo_insignia, $mensaje, $fecha_asig;

    public $yearActual, $mesActual, $diaActual, $fechaActual;

    public $tInicialP1 = '-01-01', $tFinalP1 = '-02-28';
    public $tInicialP2 = '-03-01', $tFinalP2 = '-04-30';
    public $tInicialP3 = '-05-01', $tFinalP3 = '-06-30';
    public $tInicialP4 = '-07-01', $tFinalP4 = '-08-31';
    public $tInicialP5 = '-09-01', $tFinalP5 = '-10-31';
    public $tInicialP6 = '-11-01', $tFinalP6 = '-12-31';

    public $banderaIntentos, $banderaPremiado;
    public $popupInsignia = false;

    public $intentoPlatino, $intentoOro, $intentoPlata, $intentoBronce, $finalPlatino, $finalOro, $finalPlata, $finalBronce;

    // ? Variables Email
    public $nombreAsignador, $nombrePremiado;

    protected $rules = [
        'tipo_insignia' => 'required',
        'valor_business' => 'required',
        'mensaje' => 'required'
    ];

    protected $messages = [
        'tipo_insignia.required' => 'Es necesario que elijas una insignia',
        'valor_business.required' => 'Es necesario que elijas un valor',
        'mensaje.required' => 'Debes agregar un mensaje de retroalimentación'
    ];

    public function mount($no_colaborador)
    {
        $this->colaborador = Colaborador::find($no_colaborador);
        $this->infoColaborador = DB::table('infocolaborador')->where('no_colaborador', $no_colaborador)->get();
        $this->infoAsignador = Colaborador::find(auth()->user()->colaborador_no_colaborador);
        $this->col_premiado = $no_colaborador;
        $this->valores = Valores_business::all();
        $this->yearActual = Carbon::today()->isoFormat('YYYY');
        $this->mesActual = Carbon::today()->isoFormat('MM');
        $this->diaActual = Carbon::today()->isoFormat('DD');
        $this->fechaActual = Carbon::today()->isoFormat('YYYY-MM-DD');
        $this->revisarIntentosYPremiados();
        $this->nombreAsignador = auth()->user()->name;
        $this->nombrePremiado = $this->infoColaborador[0]->nombre_completo;
        $this->correoAsignador = $this->infoAsignador->correo;
        $this->correoPremiado = $this->colaborador->correo;
    }

    public function render()
    {
        $this->esBisiesto($this->yearActual);
        $areas = Area::select('*')->orderBy('nombre_area', 'ASC')->get();
        $puestos = Puesto::join('nivel', 'nivel.id', 'puesto.nivel_id')
            ->select('puesto.id', 'puesto.especialidad_puesto', 'nivel.nombre_nivel')
            ->get();
        $tiposColaborador = Tipo_colaborador::all();

        $premiados = Colaborador::select('no_colaborador', 'nombre_1', 'nombre_2', 'ap_paterno', 'ap_materno')
            ->orderBy('ap_paterno', 'ASC')
            ->get();

        // ? Restriccion de usuario para accesar a esta vista

        if (auth()->user()->role_id == 8) {
            # code...

            if ($this->fechaActual >= $this->yearActual . $this->tInicialP1 && $this->fechaActual <= $this->yearActual . $this->tFinalP1) {
                return view('livewire.insignias', [
                    'colaboradores' => DB::table('v_insignias')->where('no_colaborador_premiado', 'LIKE', "%{$this->search}%")
                        ->orWhere('fecha_asignacion', 'BETWEEN', $this->yearActual . $this->tInicialP1, 'and', $this->yearActual . $this->tFinalP1)
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
            } elseif ($this->fechaActual >= $this->yearActual . $this->tFinalP2 && $this->fechaActual <= $this->yearActual . $this->tFinalP2) {
                return view('livewire.insignias', [
                    'colaboradores' => DB::table('v_insignias')->where('no_colaborador_premiado', 'LIKE', "%{$this->search}%")
                        ->orWhere('fecha_asignacion', 'BETWEEN', $this->yearActual . $this->tInicialP2, 'and', $this->yearActual . $this->tFinalP2)
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
            } elseif ($this->fechaActual >= $this->yearActual . $this->tInicialP3 && $this->fechaActual <= $this->yearActual . $this->tFinalP3) {
                return view('livewire.insignias', [
                    'colaboradores' => DB::table('v_insignias')->where('no_colaborador_premiado', 'LIKE', "%{$this->search}%")
                        ->orWhere('fecha_asignacion', 'BETWEEN', $this->yearActual . $this->tInicialP3, 'and', $this->yearActual . $this->tFinalP3)
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
            } elseif ($this->fechaActual >= $this->yearActual . $this->tInicialP4 && $this->fechaActual <= $this->yearActual . $this->tFinalP4) {
                return view('livewire.insignias', [
                    'colaboradores' => DB::table('v_insignias')->where('no_colaborador_premiado', 'LIKE', "%{$this->search}%")
                        ->orWhere('fecha_asignacion', 'BETWEEN', $this->yearActual . $this->tInicialP4, 'and', $this->yearActual . $this->tFinalP4)
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
            } elseif ($this->fechaActual >= $this->yearActual . $this->tInicialP5 && $this->fechaActual <= $this->yearActual . $this->tFinalP5) {
                return view('livewire.insignias', [
                    'colaboradores' => DB::table('v_insignias')->where('no_colaborador_premiado', 'LIKE', "%{$this->search}%")
                        ->orWhere('fecha_asignacion', 'BETWEEN', $this->yearActual . $this->tInicialP5, 'and', $this->yearActual . $this->tFinalP5)
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
            } elseif ($this->fechaActual >= $this->yearActual . $this->tInicialP6 && $this->fechaActual <= $this->yearActual . $this->tFinalP6) {
                return view('livewire.insignias', [
                    'colaboradores' => DB::table('v_insignias')->where('no_colaborador_premiado', 'LIKE', "%{$this->search}%")
                        ->orWhere('fecha_asignacion', 'BETWEEN', $this->yearActual . $this->tInicialP6, 'and', $this->yearActual . $this->tFinalP6)
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
        } else {
            abort(404);
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

            if ($this->tipo_insignia == 1 && $this->finalPlatino >= 1) {
                $this->insercionBD();
                $this->enviarCorreo();
            } elseif ($this->tipo_insignia == 2 && $this->finalOro >= 1) {
                $this->insercionBD();
                $this->enviarCorreo();
            } elseif ($this->tipo_insignia == 3 && $this->finalPlata >= 1) {
                $this->insercionBD();
                $this->enviarCorreo();
            } elseif ($this->tipo_insignia == 4 && $this->finalBronce >= 1) {
                $this->insercionBD();
                $this->enviarCorreo();
            }else {
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
                    'valores_business_id' => $this->valor_business,
                    'fecha_asignacion' => $this->fecha_asig,
                    'colaborador_asignador' => auth()->user()->colaborador_no_colaborador,
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
        } elseif ($this->fechaActual >= $this->yearActual . $this->tInicialP5 && $this->fechaActual <= $this->yearActual . $this->tFinalP5) {
            $this->asignaIntentos();
            $this->revisarIntentosPeriodo($this->tInicialP5, $this->tFinalP5);
            $this->revisarPremiadoPeriodo($this->tInicialP5, $this->tFinalP5);
        } elseif ($this->fechaActual >= $this->yearActual . $this->tInicialP6 && $this->fechaActual <= $this->yearActual . $this->tFinalP6) {
            $this->asignaIntentos();
            $this->revisarIntentosPeriodo($this->tInicialP6, $this->tFinalP6);
            $this->revisarPremiadoPeriodo($this->tInicialP6, $this->tFinalP6);
        }
    }

    public function revisarIntentosPeriodo($tIinicial, $tfinal)
    {
        // ? Intentos Platino

        if (auth()->user()->colaborador_no_colaborador == 135050) {

            $tmpPlatino = Colaborador_insignia::all()
                ->where('insignia_id', 1)
                ->WhereBetween('fecha_asignacion', [$this->yearActual . $tIinicial, $this->yearActual . $tfinal])
                ->count();

            $this->finalPlatino = $this->intentoPlatino - $tmpPlatino;

            if ($this->finalPlatino <= 0) {
                $this->finalPlatino = 0;
            }
        }

        // ? Intentos Oro

        $tmpOro = Colaborador_insignia::all()
            ->where('insignia_id', 2)
            ->where('colaborador_asignador', auth()->user()->colaborador_no_colaborador)
            ->WhereBetween('fecha_asignacion', [$this->yearActual . $tIinicial, $this->yearActual . $tfinal])
            ->count();

        $this->finalOro = $this->intentoOro - $tmpOro;

        if ($this->finalOro <= 0) {
            $this->finalOro = 0;
        }

        // ? Intentos Plata

        $tmpPlata = Colaborador_insignia::all()
            ->where('insignia_id', 3)
            ->where('colaborador_asignador', auth()->user()->colaborador_no_colaborador)
            ->WhereBetween('fecha_asignacion', [$this->yearActual . $tIinicial, $this->yearActual . $tfinal])
            ->count();

        $this->finalPlata = $this->intentoPlata - $tmpPlata;

        if ($this->finalPlata <= 0) {
            $this->finalPlata = 0;
        }

        // ? Intentos Bronce

        $tmpBronce = Colaborador_insignia::all()
            ->where('insignia_id', 4)
            ->where('colaborador_asignador', auth()->user()->colaborador_no_colaborador)
            ->WhereBetween('fecha_asignacion', [$this->yearActual . $tIinicial, $this->yearActual . $tfinal])
            ->count();

        $this->finalBronce = $this->intentoBronce - $tmpBronce;

        if ($this->finalBronce <= 0) {
            $this->finalBronce = 0;
        }
    }

    public function asignaIntentos()
    {
        if (auth()->user()->colaborador_no_colaborador == '135050') {
            $this->intentoPlatino = 3;
        } elseif (
            auth()->user()->colaborador_no_colaborador == '143010' ||
            auth()->user()->colaborador_no_colaborador == '131901' ||
            auth()->user()->colaborador_no_colaborador == '152090'
        ) {
            $this->intentoOro = 1;
            $this->intentoPlata = 2;
            $this->intentoBronce = 2;
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
            ->where('colaborador_asignador', auth()->user()->colaborador_no_colaborador)
            ->WhereBetween('fecha_asignacion', [$this->yearActual . $tIinicial, $this->yearActual . $tfinal])
            ->count();

        if ($tmpPremiado == 0) {
            $this->banderaPremiado = true;
        } else {
            $this->banderaPremiado = false;
        }
    }

    public function enviarCorreo()
    {
        if ($this->correoPremiado == null | $this->correoPremiado == '') {
            Mail::to('comunicacion@itecnos.com.mx')->send(new NotificaInsignias(
                $this->nombreAsignador,
                $this->correoAsignador,
                $this->nombrePremiado,
                $this->correoPremiado,
                $this->mensaje,
                $this->tipo_insignia,
                $this->valor_business
            ));
        } else {
            Mail::to($this->correoPremiado)->send(new NotificaInsignias(
                $this->nombreAsignador,
                $this->correoAsignador,
                $this->nombrePremiado,
                $this->correoPremiado,
                $this->mensaje,
                $this->tipo_insignia,
                $this->valor_business
            ));
        }
        Mail::to($this->correoAsignador)->send(new NotificaInsigniasAsignador(
            $this->nombreAsignador,
            $this->correoAsignador,
            $this->nombrePremiado,
            $this->correoPremiado,
            $this->mensaje,
            $this->tipo_insignia,
        ));
    }

    public function esBisiesto($year)
    {
        if ((!($year % 4) && ($year % 100)) || !($year % 400)) {
            $this->tFinalP1 = '-02-29';
        } else {
        }
    }

    public function setNull()
    {
        $this->popupInsignia = false;
    }

    public function popupInsignia()
    {
        $this->popupInsignia = true;
    }
}
