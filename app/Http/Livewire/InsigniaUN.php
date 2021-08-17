<?php

namespace App\Http\Livewire;

use Exception;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Colaborador;
use Carbon\CarbonImmutable;
use Livewire\WithPagination;
use App\Mail\NotificaUNPremiado;
use App\Models\Valores_business;
use App\Mail\NotificaUNAsignador;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Unidad_negocio_colaborador_insignia;

class InsigniaUN extends Component
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

    public $yearActual, $mesActual, $diaActual, $fechaActual, $fechaHoraActual, $endHora;

    public $tInicial, $tFinal;

    protected $start, $end;

    public $banderaIntentos, $banderaPremiado;
    public $popupInsignia = false, $switchButton = false;

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

        $en = CarbonImmutable::now()->locale('en_US');
        $this->start = $en->startOfWeek(Carbon::SATURDAY);
        $this->end = $en->endOfWeek(Carbon::THURSDAY);

        $this->tInicial = $this->start->format('-m-d');
        $this->tFinal = $this->end->format('-m-d');

        $this->revisarIntentosYPremiados();
        $this->nombreAsignador = auth()->user()->name;
        $this->nombrePremiado = $this->infoColaborador[0]->nombre_completo;
        $this->correoAsignador = $this->infoAsignador->correo;
        $this->correoPremiado = $this->colaborador->correo;
        $this->bloqueoAsignacion();
    }

    public function render()
    {
        $premiados = Colaborador::select('no_colaborador', 'nombre_1', 'nombre_2', 'ap_paterno', 'ap_materno')
            ->orderBy('ap_paterno', 'ASC')
            ->get();

        // ? Restriccion de usuario para accesar a esta vista

        if (auth()->user()->role_id == 9) {

            if ($this->fechaActual >= $this->yearActual . $this->tInicial && $this->fechaActual <= $this->yearActual . $this->tFinal) {

                return view('livewire.insignia-u-n', [
                    'colaboradores' => DB::table('v_insignias_un')->where('colaborador_asignador', auth()->user()->colaborador_no_colaborador)
                        ->where('fecha_asignacion', 'BETWEEN', $this->yearActual . $this->tInicial, 'and', $this->yearActual . $this->tFinal)
                        ->orderBy('id', 'DESC')
                        ->paginate($this->perPage)
                ], compact(
                    'premiados'
                ));
            } else {
                abort(403, 'El día viernes no hay asignaciones');
            }
        } else {
            abort(403, 'No eres un gerente de Unidad de Negocio');
        }
    }

    public function bloqueoAsignacion()
    {
        if ($this->diaActual == $this->end->format('d')) {

            $this->fechaHoraActual = Carbon::now()->format('H:i');

            if ($this->fechaHoraActual >= '16:00') {
                $this->switchButton = true;
            } else {
            }
        } else {
            $this->switchButton = false;
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
                Unidad_negocio_colaborador_insignia::updateOrCreate([
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
            return redirect()->to('/insignias-unidad-negocio/' . $this->colaborador->no_colaborador);
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
        if ($this->fechaActual >= $this->yearActual . $this->tInicial && $this->fechaActual <= $this->yearActual . $this->tFinal) {
            $this->asignaIntentos();
            $this->revisarIntentosPeriodo($this->tInicial, $this->tFinal);
            $this->revisarPremiadoPeriodo($this->tInicial, $this->tFinal);
        }
    }

    public function revisarIntentosPeriodo($tIinicial, $tfinal)
    {
        // ? Intentos Platino

        if (auth()->user()->colaborador_no_colaborador == 135050) {

            $tmpPlatino = Unidad_negocio_colaborador_insignia::all()
                ->where('insignia_id', 1)
                ->WhereBetween('fecha_asignacion', [$this->yearActual . $tIinicial, $this->yearActual . $tfinal])
                ->count();

            $this->finalPlatino = $this->intentoPlatino - $tmpPlatino;

            if ($this->finalPlatino <= 0) {
                $this->finalPlatino = 0;
            }
        }

        // ? Intentos Oro

        $tmpOro = Unidad_negocio_colaborador_insignia::all()
            ->where('insignia_id', 2)
            ->where('colaborador_asignador', auth()->user()->colaborador_no_colaborador)
            ->WhereBetween('fecha_asignacion', [$this->yearActual . $tIinicial, $this->yearActual . $tfinal])
            ->count();

        $this->finalOro = $this->intentoOro - $tmpOro;

        if ($this->finalOro <= 0) {
            $this->finalOro = 0;
        }

        // ? Intentos Plata

        $tmpPlata = Unidad_negocio_colaborador_insignia::all()
            ->where('insignia_id', 3)
            ->where('colaborador_asignador', auth()->user()->colaborador_no_colaborador)
            ->WhereBetween('fecha_asignacion', [$this->yearActual . $tIinicial, $this->yearActual . $tfinal])
            ->count();

        $this->finalPlata = $this->intentoPlata - $tmpPlata;

        if ($this->finalPlata <= 0) {
            $this->finalPlata = 0;
        }

        // ? Intentos Bronce

        $tmpBronce = Unidad_negocio_colaborador_insignia::all()
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
        } else {
            $this->intentoOro = 3;
            $this->intentoPlata = 2;
            $this->intentoBronce = 1;
        }
    }

    public function revisarPremiadoPeriodo($tIinicial, $tfinal)
    {
        $tmpPremiado = Unidad_negocio_colaborador_insignia::all()
            ->where('colaborador_no_colaborador', $this->col_premiado)
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
            Mail::to('comunicacion@itecnos.com.mx')->send(new NotificaUNPremiado(
                $this->nombreAsignador,
                $this->correoAsignador,
                $this->nombrePremiado,
                $this->correoPremiado,
                $this->mensaje,
                $this->tipo_insignia,
                $this->valor_business
            ));
        } else {
            Mail::to($this->correoPremiado)->send(new NotificaUNPremiado(
                $this->nombreAsignador,
                $this->correoAsignador,
                $this->nombrePremiado,
                $this->correoPremiado,
                $this->mensaje,
                $this->tipo_insignia,
                $this->valor_business
            ));
        }
        Mail::to($this->correoAsignador)->send(new NotificaUNAsignador(
            $this->nombreAsignador,
            $this->correoAsignador,
            $this->nombrePremiado,
            $this->correoPremiado,
            $this->mensaje,
            $this->tipo_insignia,
        ));
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
