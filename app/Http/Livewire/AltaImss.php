<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AltaImss extends Component
{
    public $no_colaborador;

    public function mount($no_colaborador){
        $this->no_colaborador = $no_colaborador;
    }

    public function render()
    {
        return view('livewire.alta-imss')->layout('layouts.guest');
    }

    public function descargarAlta(){
        dd($this->no_colaborador);
    }
}
