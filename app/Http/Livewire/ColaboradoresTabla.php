<?php

namespace App\Http\Livewire;

use App\Models\Colaborador;
use Livewire\Component;
use Livewire\WithPagination;

class ColaboradoresTabla extends Component
{
    use WithPagination;
    public $search, $perPage='5';

    public function render()
    {
        if ($this->search == 'activo') {
            return view('livewire.colaboradores-tabla', [
                'colaboradores' => Colaborador::where('no_colaborador', 'LIKE', "%{$this->search}%")
                    ->orWhere('nombre', 'LIKE', "%{$this->search}%")
                    ->orWhere('estado_colaborador', 1)
                    ->paginate($this->perPage)
            ]);
        } else if ($this->search == 'inactivo') {
            return view('livewire.colaboradores-tabla', [
                'colaboradores' => Colaborador::where('no_colaborador', 'LIKE', "%{$this->search}%")
                    ->orWhere('nombre', 'LIKE', "%{$this->search}%")
                    ->orWhere('estado_colaborador', 0)
                    ->paginate($this->perPage)
            ]);
        }

        return view('livewire.colaboradores-tabla', [
            'colaboradores' => Colaborador::where('no_colaborador', 'LIKE', "%{$this->search}%")
                ->orWhere('nombre', 'LIKE', "%{$this->search}%")
                ->paginate($this->perPage)
        ]);
    }
}
