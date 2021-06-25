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
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class RegistroColaboradorEstacionamiento extends Component
{
    public $colaborador;
    public $tipo_vehiculo, $placa, $marca, $modelo, $fecha_modelo, $color;
    public $marbete, $marbete_numero;
    public $vehiculo_id;

    public function mount($no_colaborador)
    {
        $this->colaborador = Colaborador::find($no_colaborador);
    }

    public function render()
    {
        $tiposVehiculo = Tipo_vehiculo::all();

        return view('livewire.registro-colaborador-estacionamiento', compact(
            'tiposVehiculo',
        ))->layout('layouts.guest');
    }

    public function registra()
    {
        /* $this->registraVehiculo();
        $this->consultaMarbete();
        $this->registraEstacionamiento();
        $this->restaMarbete(); */

        $comprueba = Vehiculo::where('colaborador_no_colaborador', '147190')->get();
        if(!empty($comprueba)){
            dd('Tiene coche');
        }else{
            dd('No tiene coche');
        }
        

        return redirect()->to('/registro-colaborador-estacionamiento/' . $this->colaborador->no_colaborador);
    }

    public function registraVehiculo()
    {
        DB::transaction(function () {
            Vehiculo::updateOrCreate([
                'placa' => $this->placa,
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
