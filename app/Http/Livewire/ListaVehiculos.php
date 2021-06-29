<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ListaVehiculos extends Component
{

    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public $search, $perPage = '5';


    public function render()
    {   
        return view('livewire.lista-vehiculos', [
            'vehiculos' => DB::table('colaborador_estacionamiento')->where('no_colaborador', 'LIKE', "%{$this->search}%")
                ->OrWhere('placa', 'LIKE', "%{$this->search}%")
                ->OrWhere('tipo_vehiculo', 'LIKE', "%{$this->search}%")
                ->OrWhere('no_marbete', 'LIKE', "%{$this->search}%")
                ->paginate($this->perPage),
        ]);
    }
}
