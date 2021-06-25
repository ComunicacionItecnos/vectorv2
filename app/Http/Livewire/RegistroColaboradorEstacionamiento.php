<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Colaborador;
use App\Models\Estacionamiento as ModelsEstacionamiento;
use App\Models\Marbete;
use App\Models\Tipo_vehiculo;
use App\Models\Vehiculo;
use Carbon\Carbon;
use Estacionamiento;
use Exception;
use Illuminate\Support\Facades\DB;

class RegistroColaboradorEstacionamiento extends Component
{
    public $colaborador, $vehiculo;
    public $tipo_vehiculo, $placa, $marca, $modelo, $fecha_modelo, $color;
    public $tipo_vehiculo_original;
    public $marbete, $marbete_numero;
    public $vehiculo_id;
    public $m_id;

    public $banderaExiste = false;

    protected $rules = [
        'tipo_vehiculo' => 'required',
        'placa' => 'required',
        'marca' => 'required',
        'modelo' => 'required',
        'fecha_modelo' => ['required', 'regex:/(?:(?:19|20)[0-9]{2})/'],
        'color' => 'required',
    ];

    protected $messages = [
        'tipo_vehiculo.required' => 'Debe elegir un tipo de vehículo',
        'placa.required' => 'El campo Placa no puede estar vacío',
        'marca.required' => 'El campo Marca no puede estar vacío',
        'modelo.required' => 'El campo Modelo no puede estar vacío',
        'color.required' => 'El campo Color no puede estar vacío',
        'fechamodelo.required' => 'El campo Año no puede estar vacío',
        'fecha_modelo.regex' => 'El Año solo puede contener 4 dígitos y debe ser una fecha válida',
    ];

    public function mount($no_colaborador)
    {
        $this->colaborador = Colaborador::find($no_colaborador);
        $this->existe();
    }

    public function render()
    {
        $tiposVehiculo = Tipo_vehiculo::all();

        return view('livewire.registro-colaborador-estacionamiento', compact(
            'tiposVehiculo',
        ))->layout('layouts.guest');
    }

    public function existe()
    {
        $vehiculo = Vehiculo::where('colaborador_no_colaborador', $this->colaborador->no_colaborador)->get();
        if (count($vehiculo) == 0) {
            $this->banderaExiste = false;
        } else {
            $this->banderaExiste = true;
            $this->tipo_vehiculo = $vehiculo[0]->tipo_vehiculo_id;
            $this->tipo_vehiculo_original = $this->tipo_vehiculo;
            $this->placa = $vehiculo[0]->placa;
            $this->marca = $vehiculo[0]->marca;
            $this->modelo = $vehiculo[0]->modelo;
            $this->fecha_modelo = $vehiculo[0]->fecha_modelo;
            $this->color = $vehiculo[0]->color;
        }
    }

    public function acciones()
    {
        $this->validate();

        if ($this->banderaExiste == true) {
            $this->actualiza();
        } else {
            $this->registra();
        }
    }

    public function actualiza()
    {
        DB::transaction(function () {
            Vehiculo::where('colaborador_no_colaborador', $this->colaborador->no_colaborador)
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

            $this->m_id = ModelsEstacionamiento::where('colaborador_no_colaborador', $this->colaborador->no_colaborador)->get();

            DB::transaction(function () {
                Marbete::where('id', $this->m_id[0]->marbete_id)
                    ->update([
                        'estado' => 1,
                    ]);
            });

            $this->consultaMarbete();
            DB::transaction(function () {
                ModelsEstacionamiento::where('colaborador_no_colaborador', $this->colaborador->no_colaborador)
                    ->update([
                        'marbete_id' => $this->marbete[0]->id,
                        'updated_at' => Carbon::now(),
                    ]);
            });

            $this->restaMarbete();

            return redirect()->to('/registro-colaborador-estacionamiento/' . $this->colaborador->no_colaborador);
        } else {
            return redirect()->to('/registro-colaborador-estacionamiento/' . $this->colaborador->no_colaborador);
        }
    }

    public function registra()
    {
        $this->registraVehiculo();
        $this->consultaMarbete();
        $this->registraEstacionamiento();
        $this->restaMarbete();

        return redirect()->to('/registro-colaborador-estacionamiento/' . $this->colaborador->no_colaborador);
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
                'colaborador_no_colaborador' => $this->colaborador->no_colaborador,
            ]);
        });
    }
    public function consultaMarbete()
    {
        if ($this->tipo_vehiculo == 1) {
            DB::transaction(function () {
                $this->marbete = Marbete::where('tipo_vehiculo_id', '=', $this->tipo_vehiculo)
                    ->where('numero', '>=', 46)
                    ->where('estado', '=', 1)
                    ->get();
            });
        } else {
            DB::transaction(function () {
                $this->marbete = Marbete::where('tipo_vehiculo_id', '=', $this->tipo_vehiculo)
                    ->where('estado', '=', 1)
                    ->get();
            });
        }

        $this->marbete_numero = $this->marbete[0]->numero;
    }

    public function registraEstacionamiento()
    {
        $this->vehiculo_id = Vehiculo::where('colaborador_no_colaborador', '=', $this->colaborador->no_colaborador)->get();

        DB::transaction(function () {

            ModelsEstacionamiento::updateOrCreate([
                'colaborador_no_colaborador' => $this->colaborador->no_colaborador,
                'vehiculo_id' => $this->vehiculo_id[0]->id,
                'marbete_id' => $this->marbete[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        });
    }

    public function restaMarbete()
    {
        $cambio = Marbete::find($this->marbete[0]->id);
        $cambio->estado = 0;
        $cambio->save();
    }
}
