<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class EvaluacionDesempeno extends Component
{
    public $colaborador;
    public $foto,$nombre,$puesto;
    public $fotoRandom;

    public function mount($no_colaborador)
    {
        $this->colaborador = DB::table('infocolaborador')->where('no_colaborador',$no_colaborador)->get();
    
        /* $this->foto = $this->colaborador[0]->foto; */

        /* Por sino tienen foto */
        $this->fotoRandom = Http::get('https://randomuser.me/api/');
        $this->fotoRandom = $this->fotoRandom->json();
        $this->fotoRandom = $this->fotoRandom['results'][0]['picture'];
        $this->fotoRandom = $this->fotoRandom['large'];
        
        /* $this->nombre = $this->colaborador[0]->nombre_desc; */
        $this->nombre = $this->colaborador[0]->nombre;
        $this->puesto = $this->colaborador[0]->puesto;
    }

    public function render()
    {
        return view('livewire.evaluacion-desempeno')->layout('layouts.guest');
    }
}
