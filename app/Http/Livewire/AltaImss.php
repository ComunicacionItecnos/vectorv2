<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

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
        return Storage::disk('public')->download('/altas_imss/' . $this->no_colaborador . '.pdf');
    }
}
