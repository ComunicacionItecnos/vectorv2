<?php

namespace App\Http\Livewire;

use App\Models\Colaborador;
use Exception;
use Livewire\Component;

class ComprobarColaborador extends Component
{

    public $bandera, $no_colaborador;

    public function render()
    {
        return view('livewire.comprobar-colaborador');
    }

    public function comprueba()
    {

        $prueba = Colaborador::find($this->no_colaborador);

        if ($prueba != null) {
            $this->alert('success', 'El numero de colaborador ' . $this->no_colaborador . ' existe', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
        } else {
            $this->alert('error', 'El numero de colaborador ' . $this->no_colaborador . ' no existe', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
        }
    }
}
