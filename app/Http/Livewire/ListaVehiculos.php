<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Marbete;
use Livewire\Component;

use App\Models\Vehiculo;
use App\Models\Colaborador;
use Livewire\WithPagination;
use App\Models\Tipo_vehiculo;
use App\Models\Estacionamiento;
use App\Exports\VehiculosExport;
use Exception;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ListaVehiculos extends Component
{

    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public $search, $perPage = '5';

    public $lista;
    public $fecha_actual;
    public $vehiculo_colaborador, $vehiculo, $marbete;

    public $editbool = false, $nuevobool = false;
    public $estacionamiento, $e_id;
    public $tiposVehiculo, $banderaExiste, $colaborador, $vehiculo_2;
    public $tipo_vehiculo, $placa, $marca, $modelo, $fecha_modelo, $color;
    public $tipo_vehiculo_original;
    public $ColaboradorRegistro, $colaboradores, $banderaRegistro = false;

    protected $rules = [
        'ColaboradorRegistro' => 'required',
        'tipo_vehiculo' => 'required',
        'placa' => 'required',
        'marca' => 'required',
        'modelo' => 'required',
        'fecha_modelo' => ['required', 'regex:/(?:(?:19|20)[0-9]{2})/'],
        'color' => 'required',
    ];

    protected $messages = [
        'ColaboradorRegistro.required' => 'Este campo no puede estar vacío',
        'tipo_vehiculo.required' => 'Debe elegir un tipo de vehículo',
        'placa.required' => 'El campo Placa no puede estar vacío',
        'marca.required' => 'El campo Marca no puede estar vacío',
        'modelo.required' => 'El campo Modelo no puede estar vacío',
        'color.required' => 'El campo Color no puede estar vacío',
        'fechamodelo.required' => 'El campo Año no puede estar vacío',
        'fecha_modelo.regex' => 'El Año solo puede contener 4 dígitos y debe ser una fecha válida',
    ];


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
        $this->confirm('¿Quieres eliminar este registro?', [
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


    public function render()
    {
        return view('livewire.lista-vehiculos', [
            'vehiculos' => DB::table('colaborador_estacionamiento')->where('no_colaborador', 'LIKE', "%{$this->search}%")
                ->OrWhere('placa', 'LIKE', "%{$this->search}%")
                ->OrWhere('tipo_vehiculo', 'LIKE', "%{$this->search}%")
                ->OrWhere('no_marbete', 'LIKE', "%{$this->search}%")
                ->orderBy('id', 'DESC')
                ->paginate($this->perPage),
        ]);
    }

    public function export()
    {
        $this->fecha_actual = Carbon::now();
        $this->lista = DB::table('colaborador_estacionamiento')->select('id', 'no_colaborador', 'placa', 'marca', 'modelo', 'fecha_modelo', 'color', 'tipo_vehiculo', 'no_marbete')->get();
        if (count($this->lista) == 0) {
            $this->alert('info', 'No hay ningún colaborador registrado', [
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
            return Excel::download(new VehiculosExport($this->lista), 'registro-vehiculos-externos(' . $this->fecha_actual . ').xlsx');
        }
    }

    public function eliminar($id)
    {
        try {
            $this->vehiculo_colaborador = Estacionamiento::find($id);
            $this->vehiculo = Vehiculo::find($this->vehiculo_colaborador->vehiculo_id);
            $this->marbete = Marbete::find($this->vehiculo_colaborador->marbete_id);

            DB::transaction(function () {
                Marbete::where('id', $this->vehiculo_colaborador->marbete_id)
                    ->update([
                        'estado' => 1,
                    ]);
                $this->vehiculo->delete();
            });

            $this->flash('success', 'Se eliminó correctamente el registro', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);

            return redirect()->route('lista-vehiculos');
        } catch (Exception $ex) {
            $this->alert('error', 'Error al eliminar el registro', [
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

    public function updatedColaboradorRegistro($no_col)
    {
        $temp = Estacionamiento::where('colaborador_no_colaborador', $no_col)->get();
        $this->banderaRegistro = false;
        /* if (count($temp) == 0) {
            $this->banderaRegistro = false;
        } else {
            $this->banderaRegistro = true;
        } */
    }

    public function editar($id)
    {
        $this->estacionamiento = Estacionamiento::find($id);
        $this->colaborador = $this->estacionamiento->colaborador_no_colaborador;
        $this->existe();
        $this->editbool = true;
        $this->ColaboradorRegistro = $this->colaborador;
    }
    public function registrar()
    {
        $this->colaborador = null;
        $this->banderaRegistro = false;
        $this->resetVariables();
        $this->colaboradores = Colaborador::select('no_colaborador', 'nombre_1', 'nombre_2', 'ap_paterno', 'ap_materno')->orderBy('ap_paterno', 'ASC')->get();
        $this->existe();
        $this->editbool = true;
    }

    public function existe()
    {
        $this->tiposVehiculo = Tipo_vehiculo::all();
        $vehiculo_2 = Vehiculo::where('colaborador_no_colaborador', $this->colaborador)->get();
        
        if (count($vehiculo_2) == 0) {
            $this->banderaExiste = false;
        } else {
            $this->banderaExiste = true;

            $m_temp = Estacionamiento::where('colaborador_no_colaborador', $this->colaborador)->get();
            $this->m_info = Marbete::where('id', $m_temp[0]->marbete_id)->get();
            $this->tipo_vehiculo = $vehiculo_2[0]->tipo_vehiculo_id;
            $this->tipo_vehiculo_original = $this->tipo_vehiculo;
            $this->placa = $vehiculo_2[0]->placa;
            $this->marca = $vehiculo_2[0]->marca;
            $this->modelo = $vehiculo_2[0]->modelo;
            $this->fecha_modelo = $vehiculo_2[0]->fecha_modelo;
            $this->color = $vehiculo_2[0]->color;
        }
    }

    public function acciones()
    {
        $this->validate();

        if ($this->banderaExiste == true) {
            try {
                $this->actualiza();
                $this->flash('success', 'Se actualizó correctamente la información', [
                    'position' =>  'top-end',
                    'timer' =>  3000,
                    'toast' =>  true,
                    'text' =>  '',
                    'confirmButtonText' =>  'Ok',
                    'cancelButtonText' =>  'Cancel',
                    'showCancelButton' =>  false,
                    'showConfirmButton' =>  false,
                ]);
                return redirect()->route('lista-vehiculos');
            } catch (Exception $ex) {
                $this->alert('error', 'Error al actualizar', [
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
        } else {
            try {
                $this->registra();

                $this->flash('success', 'Se registró correctamente el colaborador', [
                    'position' =>  'top-end',
                    'timer' =>  3000,
                    'toast' =>  true,
                    'text' =>  '',
                    'confirmButtonText' =>  'Ok',
                    'cancelButtonText' =>  'Cancel',
                    'showCancelButton' =>  false,
                    'showConfirmButton' =>  false,
                ]);
                return redirect()->route('lista-vehiculos');
            } catch (Exception $ex) {
                $this->alert('error', 'Error al registrar', [
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

    public function actualiza()
    {
        DB::transaction(function () {
            Vehiculo::where('colaborador_no_colaborador', $this->colaborador)
                ->update([
                    'placa' => $this->placa,
                    'tipo_vehiculo_id' => $this->tipo_vehiculo,
                    'marca' => $this->marca,
                    'modelo' => $this->modelo,
                    'fecha_modelo' => $this->fecha_modelo,
                    'color' => $this->color,
                ]);
        });


        if ($this->tipo_vehiculo_original != $this->tipo_vehiculo) {

            $this->m_id = Estacionamiento::where('colaborador_no_colaborador', $this->colaborador)->get();

            DB::transaction(function () {
                Marbete::where('id', $this->m_id[0]->marbete_id)
                    ->update([
                        'estado' => 1,
                    ]);
            });

            $this->consultaMarbete();
            DB::transaction(function () {
                Estacionamiento::where('colaborador_no_colaborador', $this->colaborador)
                    ->update([
                        'marbete_id' => $this->marbete[0]->id,
                        'updated_at' => Carbon::now(),
                    ]);
            });

            $this->restaMarbete();
        } else {
        }
        $this->setNull();
    }

    public function registra()
    {
        $this->registraVehiculo();
        $this->consultaMarbete();
        $this->registraEstacionamiento();
        $this->restaMarbete();
        $this->resetVariables();
        $this->setNull();
    }

    public function registraVehiculo()
    {
        DB::transaction(function () {
            Vehiculo::updateOrCreate([
                'placa' => mb_strtoupper($this->placa),
                'tipo_vehiculo_id' => $this->tipo_vehiculo,
                'marca' => $this->marca,
                'modelo' => $this->modelo,
                'fecha_modelo' => $this->fecha_modelo,
                'color' => $this->color,
                'colaborador_no_colaborador' => $this->ColaboradorRegistro,
            ]);
        });
    }

    public function registraEstacionamiento()
    {
        $this->vehiculo_id = Vehiculo::where('colaborador_no_colaborador', '=', $this->ColaboradorRegistro)->get();

        DB::transaction(function () {

            Estacionamiento::updateOrCreate([
                'colaborador_no_colaborador' => $this->ColaboradorRegistro,
                'vehiculo_id' => $this->vehiculo_id[0]->id,
                'marbete_id' => $this->marbete[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        });
    }

    public function consultaMarbete()
    {
        if ($this->tipo_vehiculo == 1) {
            DB::transaction(function () {
                $this->marbete = Marbete::where('tipo_vehiculo_id', '=', $this->tipo_vehiculo)
                    ->whereBetween('numero', [46, 1299])
                    ->where('estado', '=', 1)
                    ->get();
            });
        } else {
            DB::transaction(function () {
                $this->marbete = Marbete::where('tipo_vehiculo_id', '=', $this->tipo_vehiculo)
                    ->whereBetween('numero', [180, 200])    
                ->where('estado', '=', 1)
                    ->get();
            });
        }

        $this->marbete_numero = $this->marbete[0]->numero;
    }
    public function restaMarbete()
    {
        $cambio = Marbete::find($this->marbete[0]->id);
        $cambio->estado = 0;
        $cambio->save();
    }

    public function setNull()
    {
        $this->editbool = false;
    }

    public function resetVariables()
    {
        $this->ColaboradorRegistro = null;
        $this->tipo_vehiculo = null;
        $this->placa = null;
        $this->marca = null;
        $this->modelo = null;
        $this->fecha_modelo = null;
        $this->color = null;
    }
}
