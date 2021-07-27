<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Colaborador;
use Livewire\WithPagination;
use App\Models\Tipo_incidencia;
use App\Mail\NotificaIncidencias;
use App\Exports\IncidenciasExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Incidencias as ModelsIncidencias;
use App\Models\Incidencias_historial;

class Incidencias extends Component
{

    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public $search, $perPage = '5';

    public $fecha_actual, $incidencia, $nombre_colaborador;
    public $incidencia_colaborador, $incidencia_id;
    public $incidencias_correo;

    public $modalbool = false;
    public $tiposIncidencia, $banderaExiste = false, $colaborador;
    public $ColaboradorRegistro, $colaboradores, $banderaRegistro = false, $tipo_incidencia;

    protected $listeners = [
        'eliminar',
        'cancelled',
    ];

    public function cancelled()
    {
        $this->alert('info', 'Se canceló la eliminación', [
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

    public function triggerConfirm($id)
    {
        $this->confirm('¿Quieres eliminar esta incidencia?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  'Si',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'eliminar',
            'inputAttributes' => $id,
            'onCancelled' => 'cancelled'
        ]);
    }

    public function mount()
    {
    }

    public function render()
    {
        if (auth()->user()->role_id == 4 || auth()->user()->role_id == 6) {
            return view('livewire.incidencias', [
                'incidencias' => DB::table('v_incidencias')->where('no_colaborador', 'LIKE', "%{$this->search}%")
                ->OrWhere('nombre_completo', 'LIKE', "%{$this->search}%")
                ->OrWhere('nombre_incidencia', 'LIKE', "%{$this->search}%")
                ->OrWhere('area', 'LIKE', "%{$this->search}%")
                ->orderBy('id', 'DESC')
                    ->paginate($this->perPage),
            ]);
        } else {
            abort(404);
        }
    }

    public function acciones()
    {
        if ($this->banderaExiste == true) {
            $this->editarIncidencia();
        } else {
            $this->registrarIncidencia();
        }
    }

    public function eliminar($id)
    {
        $this->incidencia_colaborador = ModelsIncidencias::find($id);

        DB::transaction(function () {
            $this->incidencia_colaborador->delete();
        });

        $this->incidencia_colaborador = Incidencias_historial::find($id);

        DB::transaction(function () {
            $this->incidencia_colaborador->delete();
        });

        return redirect()->route('incidencias');
    }

    public function editar($id)
    {
        $this->banderaExiste = true;
        $this->incidencia_id = $id;
        $this->colaboradores = Colaborador::select('no_colaborador', 'nombre_1', 'nombre_2', 'ap_paterno', 'ap_materno')->orderBy('ap_paterno', 'ASC')->get();
        $this->tiposIncidencia = Tipo_incidencia::all();
        $col = ModelsIncidencias::find($id);
        $this->ColaboradorRegistro = Colaborador::find($col->colaborador_no_colaborador);
        $this->ColaboradorRegistro = $this->ColaboradorRegistro->no_colaborador;

        $this->tipo_incidencia = ModelsIncidencias::find($id);
        $this->tipo_incidencia = Tipo_incidencia::find($this->tipo_incidencia->tipo_incidencia_id);
        $this->tipo_incidencia = $this->tipo_incidencia->id;
        $this->modalbool = true;
    }

    public function registrar()
    {
        $this->banderaExiste = false;
        $this->colaborador = null;
        $this->colaboradores = Colaborador::select('no_colaborador', 'nombre_1', 'nombre_2', 'ap_paterno', 'ap_materno')->orderBy('ap_paterno', 'ASC')->get();
        $this->tiposIncidencia = Tipo_incidencia::all();
        $this->modalbool = true;
    }

    public function setNull()
    {
        $this->ColaboradorRegistro = null;
        $this->tipo_incidencia = null;
        $this->banderaExiste = true;
        $this->modalbool = false;
    }

    public function registrarIncidencia()
    {
        $this->fecha_actual = Carbon::now('-05:00')->toDateTimeString();

        $this->incidencia = ModelsIncidencias::updateOrCreate([
            'colaborador_no_colaborador' => $this->ColaboradorRegistro,
            'tipo_incidencia_id' => $this->tipo_incidencia,
            'fecha_incidencia' => $this->fecha_actual,
        ]);
        $this->incidencia->save();

        $this->incidencia = null;

        $this->incidencia = Incidencias_historial::updateOrCreate([
            'colaborador_no_colaborador' => $this->ColaboradorRegistro,
            'tipo_incidencia_id' => $this->tipo_incidencia,
            'fecha_incidencia' => $this->fecha_actual,
        ]);
        $this->incidencia->save();

        $this->checkIncidencia();
    }

    public function editarIncidencia()
    {
        $col_in = ModelsIncidencias::find($this->incidencia_id);
        $col_in->tipo_incidencia_id = $this->tipo_incidencia;
        $col_in->save();

        $col_in = Incidencias_historial::find($this->incidencia_id);
        $col_in->tipo_incidencia_id = $this->tipo_incidencia;
        $col_in->save();

        $this->checkIncidencia();
    }

    public function checkIncidencia()
    {
        $contador_incidencias = DB::table('incidencias')->where('colaborador_no_colaborador', $this->ColaboradorRegistro)
            ->where('tipo_incidencia_id', $this->tipo_incidencia)
            ->count();

        if ($contador_incidencias >= 3) {

            $this->incidencias_correo = DB::table('incidencias')->where('colaborador_no_colaborador', $this->ColaboradorRegistro)->get();

            DB::table('incidencias')->where('colaborador_no_colaborador', $this->ColaboradorRegistro)
                ->where('tipo_incidencia_id', $this->tipo_incidencia)
                ->delete();

            $r = ($this->tipo_incidencia == 1) ? 'Credencial' : 'Vehicular';

            // ? Correo

            $this->nombre_colaborador = DB::table('infocolaborador')
                ->select('nombre_desc')
                ->where('no_colaborador', $this->ColaboradorRegistro)
                ->get();
            $this->nombre_colaborador = $this->nombre_colaborador[0]->nombre_desc;

            $this->enviarCorreo();

            // ? Notificación
            $this->flash('success', 'Se envió un correo al área de Relaciones Laborales para dar seguimiento a las 3 incidencias de tipo ' . $r . ' del colaborador ' . $this->ColaboradorRegistro, [
                'position' =>  'top-end',
                'timer' =>  6000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);

            return redirect()->route('incidencias');
        } else {
            $this->setNull();
        }
    }

    public function enviarCorreo()
    {
        Mail::to('edgarcial@itecnos.com.mx')
        ->cc(['abigailcarretod@gmail.com', 'cleyvac@itecnos.com.mx', 'rreynat@itecnos.com.mx'])
        ->send(new NotificaIncidencias(
            $this->ColaboradorRegistro,
            $this->nombre_colaborador,
            $this->tipo_incidencia,
            $this->incidencias_correo,
        ));
    }

    public function export()
    {
        $this->fecha_actual = Carbon::now('-05:00');
        $this->lista = DB::table('v_incidencias_simp')->get();
        return Excel::download(new IncidenciasExport($this->lista), 'incidencias(' . $this->fecha_actual . ').xlsx');
    }
}
