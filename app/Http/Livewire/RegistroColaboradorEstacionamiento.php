<?php

namespace App\Http\Livewire;

use App\Models\Colaborador;
use Livewire\Component;

class RegistroColaboradorEstacionamiento extends Component
{
    public $colaborador, $tiposVehiculo;

    public function mount($no_colaborador){
        $this->colaborador = Colaborador::find($no_colaborador);
    }

    public function render()
    {
        return view('livewire.registro-colaborador-estacionamiento')->layout('layouts.guest');
    }
}
