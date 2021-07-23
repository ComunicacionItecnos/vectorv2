<?php

namespace App\Http\Livewire;

use App\Models\Colaborador;
use Livewire\Component;

class UtilesEscolares extends Component
{

    public $no_colaborador;

    public function mount($no_colaborador){
        $this->no_colaborador= Colaborador::find($no_colaborador);
        
    }
    public function render()
    {
        return view('livewire.utiles-escolares');
    }
}
