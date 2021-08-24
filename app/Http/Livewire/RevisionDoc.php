<?php

namespace App\Http\Livewire;

use App\Models\Nuevo_ingreso;
use Livewire\Component;
use Livewire\WithPagination;

class RevisionDoc extends Component
{
    use WithPagination;

    /* Variables */
    public $search, $perPage = '1';
    public $count = 0;
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public $nuevoIngreso;
    public $nombreCompleto;

    public $candidatoDoc;

    public $curpValue = true;
    public $obseracionCurp;

    public $actaNacValue = true;
    public $observacionActaNac;

    public $dirValue = true;
    public $observacionDir;
    

    public function mount(){
        $this->candidatoDoc = Nuevo_ingreso::where('id','21')->first();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.revision-doc',['nuevosIngresos'=>Nuevo_ingreso::where('nombre_1','LIKE',"%{$this->search}%")
                                        ->orWhere('curp', 'LIKE', "%{$this->search}%")
                                        ->orWhere('rfc', 'LIKE', "%{$this->search}%")
                                        ->orWhere('no_seguro_social', 'LIKE', "%{$this->search}%")
                                        ->paginate($this->perPage),
        ]);
    }

    
    public function candidato($id){
        if ($id == null || $id == '') {
           $this->candidatoDoc = Nuevo_ingreso::where('id','=',$id)->get();
        } else {
            dd('Ejecutando funcion');
        }
       
    }

    public function curpToogle()
    {
        ($this->curpValue) ? $this->obseracionCurp = '' : $this->curpValue ;
    }

    public function actaNacToogle(){
        ($this->actaNacValue) ? $this->observacionActaNac = '' : $this->actaNacValue;
    }

    public function direccionToggle()
    {
        ($this->dirValue) ? $this->observacionDir = '': $this->dirValue;
    }


}
