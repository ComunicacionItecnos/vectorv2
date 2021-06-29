<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Exports\UsersExport;
use Livewire\WithPagination;

use App\Exports\VehiculosExport;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ListaVehiculos extends Component
{

    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public $search, $perPage = '5';

    public $lista;
    public $fecha_actual;


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

    public function export()
    {
        $this->fecha_actual = Carbon::now();
        $this->lista = DB::table('colaborador_estacionamiento')->get();
        return Excel::download(new VehiculosExport($this->lista), 'registro-vehiculos(' . $this->fecha_actual . ').xlsx');
    }
}
