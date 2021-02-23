<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Area;
use App\Models\Clave_radio;
use App\Models\Extension;
use App\Models\Ruta_transporte;
use App\Models\Puesto;
use App\Models\Colaborador;

class FormularioColaborador extends Component
{
    public function render()
    {
        $clavesRadio = Clave_radio::where('compartida', '1')->orwhere('disponibilidad', '1')->get();
        $areas = Area::all();
        $extensiones = Extension::all();
        $rutas = Ruta_transporte::all();

        $puestos = Puesto::join('nivel', 'nivel.id', 'puesto.nivel_id')
                            ->select('puesto.*', 'nivel.*')
                            ->get();

        $supervisores = Colaborador::select('no_colaborador', 'nombre', 'ap_paterno', 'ap_materno')->get();


        return view('livewire.formulario-colaborador', compact('clavesRadio','areas', 'extensiones', 'rutas', 'puestos', 'supervisores'));
    }
}
