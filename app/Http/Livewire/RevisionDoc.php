<?php

namespace App\Http\Livewire;

use App\Models\Nuevo_ingreso;
use Livewire\Component;
use Livewire\WithPagination;

use function Psy\debug;

class RevisionDoc extends Component
{

    use WithPagination;

    /* Variables */
    public $nuevoIngreso;
    public $nombreCompleto;

    public $search, $perPage = '1';

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.revision-doc',[
            'nuevosIngresos'=>Nuevo_ingreso::where('nombre_1','LIKE',"%{$this->search}%")
                                            ->orWhere('curp', 'LIKE', "%{$this->search}%")
                                            ->orWhere('rfc', 'LIKE', "%{$this->search}%")
                                            ->orWhere('no_seguro_social', 'LIKE', "%{$this->search}%")
                                            ->paginate($this->perPage),
        ]);
    }

}
