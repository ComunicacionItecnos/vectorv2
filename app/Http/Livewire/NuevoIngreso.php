<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NuevoIngreso extends Component
{
    public function render()
    {
        return view('livewire.nuevo-ingreso')->layout('layouts.guest');
    }
}
