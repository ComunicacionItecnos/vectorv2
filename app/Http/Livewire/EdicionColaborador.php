<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Area;
use App\Models\Clave_radio;
use App\Models\Extension;
use App\Models\Ruta_transporte;
use App\Models\Puesto;
use App\Models\Colaborador;
use App\Models\Turno;
use App\Models\Tipo_colaborador;
use App\Models\Tipo_usuario;
use App\Models\Genero;
use App\Models\Estado_civil;
use App\Models\Rango_factor;
use App\Models\Colaborador_evento;
use App\Models\Contactos_emergencia;
use App\Models\Hijos;
use Exception;

class EdicionColaborador extends Component
{
    use WithFileUploads;

    public $no_colaborador, $nombre, $ap_paterno, $ap_materno, $genero, $fecha_nacimiento, $estado_civil,
        $paternidad, $curp, $rfc, $no_seguro_social, $domicilio, $municipio, $estado, $codigo_postal, $tipo_colaborador, $turno,
        $correo, $ruta_transporte, $puesto, $area, $jefe_directo, $tel_fijo, $tel_movil, $tel_recados,
        $extension, $clave_radio, $matriculacion, $tipo_usuario, $password, $fecha_ingreso = '';

    public $foto;

    public $colaborador;

    public function mount($no_colaborador){

        $colaboradores = Colaborador::all();
        $this->colaborador = $colaboradores->find($no_colaborador);
    }

    public function render()
    {
        $clavesRadio = Clave_radio::where('compartida', '1')->orwhere('disponibilidad', '1')->get();
        $areas = Area::all();
        $extensiones = Extension::all();
        $rutas = Ruta_transporte::all();

        $puestos = Puesto::join('nivel', 'nivel.id', 'puesto.nivel_id')
            ->select('puesto.id', 'puesto.especialidad_puesto', 'nivel.nombre_nivel')
            ->get();

        $supervisores = Colaborador::select('no_colaborador', 'nombre', 'ap_paterno', 'ap_materno')->get();

        $turnos = Turno::all();

        $tiposColaborador = Tipo_colaborador::all();

        $tiposUsuario = Tipo_usuario::all();

        $generos = Genero::all();

        $estadosCivil = Estado_civil::all();

        $rango_factor = Rango_factor::all();


        return view('livewire.edicion-colaborador', compact('clavesRadio', 'areas', 'extensiones', 'rutas', 'puestos', 'supervisores', 'turnos', 'tiposColaborador', 'tiposUsuario', 'generos', 'estadosCivil', 'rango_factor'));
    }

    public function downloadImage(){
        $this->alert('info', 'Botón en contrucción', [
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
