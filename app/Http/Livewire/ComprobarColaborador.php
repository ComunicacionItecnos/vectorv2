<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\Genero;
use Livewire\Component;
use App\Models\Colaborador;
use App\Models\Estado_civil;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ComprobarColaborador extends Component
{

    use WithFileUploads;

    public $fotos = [];

    public $bandera = true, $no_colaborador;
    public $genero, $estado_civil, $paternidad, $correo, $tel_fijo, $tel_movil, $tel_recados;

    public $edad_hijo1, $edad_hijo2, $edad_hijo3, $edad_hijo4, $edad_hijo5, $edad_hijo6;
    public $escolaridad_hijo1, $escolaridad_hijo2, $escolaridad_hijo3, $escolaridad_hijo4, $escolaridad_hijo5, $escolaridad_hijo6;

    public $nombre_contacto1, $nombre_contacto2, $nombre_contacto3, $nombre_contacto4;
    public $parentesco_contacto1, $parentesco_contacto2, $parentesco_contacto3, $parentesco_contacto4;
    public $telefono_contacto1, $telefono_contacto2, $telefono_contacto3, $telefono_contacto4;
    public $domicilio_contacto1, $domicilio_contacto2, $domicilio_contacto3, $domicilio_contacto4;

    public function render()
    {
        $generos = Genero::all();
        $estadosCivil = Estado_civil::all();

        return view('livewire.comprobar-colaborador', compact('generos', 'estadosCivil'));
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
            $this->bandera = true;
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
    public function setFalse()
    {
        $this->bandera = false;
    }

    public function actualizar()
    {
        $this->validate([
            'photos.*' => 'image|max:4096', // 1MB Max
        ]);

        foreach ($this->fotos as $foto) {
            $foto->store('images', 'public');
        }
    }
}
