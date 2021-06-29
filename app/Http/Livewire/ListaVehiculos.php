<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Exports\UsersExport;
use Livewire\WithPagination;

use App\Exports\VehiculosExport;
use App\Models\Estacionamiento;
use App\Models\Marbete;
use App\Models\Vehiculo;
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
    public $vehiculo_colaborador, $vehiculo, $marbete;

    protected $listeners = [
        'eliminar',
        'cancelled',
    ];

    public function cancelled()
    {
        $this->alert('info', 'Se canceló la eliminación', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
        ]);
    }

    public function triggerConfirm($id)
    {
        $this->confirm('¿Quieres eliminar este registro?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  'Si',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'eliminar',
            'inputAttributes' => $id,
            'onCancelled' => 'cancelled'
        ]);
    }


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

    public function eliminar($id)
    {
        $this->vehiculo_colaborador = Estacionamiento::find($id);
        $this->vehiculo = Vehiculo::find($this->vehiculo_colaborador->vehiculo_id);
        $this->marbete = Marbete::find($this->vehiculo_colaborador->marbete_id);

        DB::transaction(function () {
            Marbete::where('id', $this->vehiculo_colaborador->marbete_id)
                ->update([
                    'estado' => 1,
                ]);
            $this->vehiculo->delete();
        });

        return redirect()->route('lista-vehiculos');
    }
}
