<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class AltaImss extends Component
{
    public $no_colaborador;
    public $bandera_volver = false;
    public $bandera_descarga = false;

    public function mount($no_colaborador)
    {
        $this->no_colaborador = $no_colaborador;
    }

    public function render()
    {
        return view('livewire.alta-imss')->layout('layouts.guest');
    }

    public function banderas()
    {
        $this->bandera_volver = true;
        $this->bandera_descarga = false;
    }

    public function descargarAlta()
    {
        try {

            $this->banderas();

            $this->alert('success', 'Se descargó correctamente', [
                'position' =>  'top-end',
                'timer' =>  4000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);

            return Storage::disk('public')->download('/altas_imss/' . $this->no_colaborador . '.pdf');
            
        } catch (Exception $ex) {
            $this->alert('error', 'El documento solicitado no se encuentra disponible, favor de comunicarse con Capital Humano por medio de Factor', [
                'position' =>  'top-end',
                'timer' =>  6000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
            $this->banderas();
        }
    }
}
