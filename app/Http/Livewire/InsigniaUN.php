<?php

namespace App\Http\Livewire;

use Livewire\Component;

class InsigniaUN extends Component
{

    public function mount($no_colaborador){
        /* dd($no_colaborador); */
    }

    public function render()
    {
        return view('livewire.insignia-u-n');
    }
}
