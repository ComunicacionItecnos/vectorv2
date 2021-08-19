<?php

namespace App\Http\Livewire;

use App\Models\Nuevo_ingreso;
use Livewire\Component;
use Livewire\WithPagination;

class RevisionDoc extends Component
{

    use WithPagination;

    /* Variables */
    public $nuevoIngreso;
    public $nombreCompleto;

    public $archivomodal;
    public $opcion; /* Que pdf se mostrara ejemplo: 1= credencial 2 = curp */

    public function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.revision-doc',['nuevosIngresos'=> Nuevo_ingreso::paginate(2),]);
    }

    /* Modal */
    public function modalPdf($opcion,$archivomodal){

    }

}
