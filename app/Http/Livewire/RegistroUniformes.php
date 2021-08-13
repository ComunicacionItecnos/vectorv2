<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Colaborador;
use App\Models\Tipo_vehiculo;
use App\Models\Uniformes_paquete;
use App\Models\Uniformes_prenda;
use App\Models\Uniformes_talla;

class RegistroUniformes extends Component
{

    public $colaborador, $vehiculo;
    public $tipo_vehiculo, $placa, $marca, $modelo, $fecha_modelo, $color;
    public $tipo_vehiculo_original;
    public $marbete, $marbete_numero;
    public $vehiculo_id;
    public $m_id, $m_info;

    public $paquetes, $prendas, $tallas;

    public $banderaExiste = false;
    public $popupRegistro = false;

    public $banderaPrueba = false;

    public function mount($no_colaborador)
    {
        $this->colaborador = Colaborador::find($no_colaborador);
        $this->paquetes = Uniformes_paquete::find(1);
        $this->prendas = Uniformes_prenda::find(1);
        $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 1)->get();
        /* $this->existe(); */
    }

    public function render()
    {
        $tiposVehiculo = Tipo_vehiculo::all();

        return view('livewire.registro-uniformes', compact(
            'tiposVehiculo'
        ))->layout('layouts.guest');
    }

    public function existe()
    {
    }
}
