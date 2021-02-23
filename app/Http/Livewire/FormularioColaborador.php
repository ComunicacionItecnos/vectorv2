<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Area;
use App\Models\Clave_radio;
use App\Models\Extension;
use App\Models\Ruta_transporte;
use App\Models\Puesto;
use App\Models\Colaborador;
use App\Models\Turno;
use App\Models\Tipo_colaborador;
use App\Models\Tipo_usuario;
use App\Models\Genero;
use App\Models\Estado_civil;
use App\Models\Rango_factor;

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

        $turnos = Turno::all();

        $tiposColaborador = Tipo_colaborador::all();

        $tiposUsuario = Tipo_usuario::all();

        $generos = Genero::all();

        $estadosCivil = Estado_civil::all();

        $rango_factor = Rango_factor::all();


        return view('livewire.formulario-colaborador', compact('clavesRadio','areas', 'extensiones', 'rutas', 'puestos', 'supervisores', 'turnos','tiposColaborador','tiposUsuario','generos','estadosCivil', 'rango_factor'));
    }
}
