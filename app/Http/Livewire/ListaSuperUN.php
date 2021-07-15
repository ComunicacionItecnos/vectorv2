<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ListaSuperUN extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public $search, $perPage = '5';
    public $no_colaborador;

    public function render()
    {
        if (auth()->user()->role_id == 9) {
            if (auth()->user()->colaborador_no_colaborador == 110899) {
                return view('livewire.lista-super-u-n', [
                    'colaboradores' => DB::table('unriflesuper')
                        ->where('no_colaborador', 'LIKE', "%{$this->search}%")
                        ->orWhere('nombre_completo', 'LIKE', "%{$this->search}%")
                        ->orWhere('puesto', 'LIKE', "%{$this->search}%")
                        ->orWhere('area', 'LIKE', "%{$this->search}%")
                        ->groupBy('no_colaborador')
                        ->paginate($this->perPage)
                ]);
            } elseif (auth()->user()->colaborador_no_colaborador == 102050) {
                return view('livewire.lista-super-u-n', [
                    'colaboradores' => DB::table('unpistolasuper')
                        ->where('no_colaborador', 'LIKE', "%{$this->search}%")
                        ->orWhere('nombre_completo', 'LIKE', "%{$this->search}%")
                        ->orWhere('puesto', 'LIKE', "%{$this->search}%")
                        ->orWhere('area', 'LIKE', "%{$this->search}%")
                        ->groupBy('no_colaborador')
                        ->paginate($this->perPage)
                ]);
            } elseif (auth()->user()->colaborador_no_colaborador == 137355) {
                return view('livewire.lista-super-u-n', [
                    'colaboradores' => DB::table('unmiscsuper')
                        ->where('no_colaborador', 'LIKE', "%{$this->search}%")
                        ->orWhere('nombre_completo', 'LIKE', "%{$this->search}%")
                        ->orWhere('puesto', 'LIKE', "%{$this->search}%")
                        ->orWhere('area', 'LIKE', "%{$this->search}%")
                        ->groupBy('no_colaborador')
                        ->paginate($this->perPage)
                ]);
            } elseif (auth()->user()->colaborador_no_colaborador == 135870) {
                return view('livewire.lista-super-u-n', [
                    'colaboradores' => DB::table('unl22super')
                        ->where('no_colaborador', 'LIKE', "%{$this->search}%")
                        ->orWhere('nombre_completo', 'LIKE', "%{$this->search}%")
                        ->orWhere('puesto', 'LIKE', "%{$this->search}%")
                        ->orWhere('area', 'LIKE', "%{$this->search}%")
                        ->groupBy('no_colaborador')
                        ->paginate($this->perPage)
                ]);
            }
        }else{
            abort(403, 'No tienes autorizacón para visualizar el contenido de esta vista');
        }
    }
}
