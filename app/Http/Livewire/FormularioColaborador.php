<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Area;
use App\Models\Clave_radio;
use App\Models\Area;
use App\Models\Area;
use App\Models\Area;
use App\Models\Area;
use App\Models\Area;
use App\Models\Area;
use App\Models\Area;
use App\Models\Area;
use App\Models\Area;
use App\Models\Area;


class FormularioColaborador extends Component
{
    public function render()
    {
        $area = Area::all();
        return view('livewire.formulario-colaborador', compact('areas','rutas'));
    }
}
