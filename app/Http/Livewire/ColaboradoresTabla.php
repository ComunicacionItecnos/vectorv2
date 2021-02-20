<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ColaboradoresTabla extends Component
{
    public function render()
    {
        $users = User::latest('id')->get();
        return view('livewire.colaboradores-tabla', compact('users'));
    }
}
