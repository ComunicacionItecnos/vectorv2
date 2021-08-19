<?php

namespace App\Http\Livewire;

use App\Models\Nuevo_ingreso;
use Livewire\Component;

class RevisionDoc extends Component
{
    /* Variables */
    public $nuevoIngreso;
    public $nombreCompleto;

    public $archivomodal;
    public $opcion; /* Que pdf se mostrara ejemplo: 1= credencial 2 = curp */

    public function mount()
    {
        $this->nuevoIngreso = Nuevo_ingreso::findorFail('1')->get();
        if ($this->nuevoIngreso[0]->nombre_2 == '') {
            $this->nombreCompleto = $this->nuevoIngreso[0]->nombre_1.' '.$this->nuevoIngreso[0]->ap_paterno.' '.$this->nuevoIngreso[0]->ap_materno;
        } else {
            $this->nombreCompleto = $this->nuevoIngreso[0]->nombre_1.' '.$this->nuevoIngreso[0]->nombre_2.''.$this->nuevoIngreso[0]->ap_paterno.' '.$this->nuevoIngreso[0]->ap_materno;
        }
        
        
    }

    public function render()
    {
        return view('livewire.revision-doc');
    }

    /* Modal */
    public function modalPdf($opcion,$archivomodal){

    }

}
