<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\Area;
use App\Models\Genero;
use App\Models\Externo;
use Livewire\Component;
use App\Models\Colaborador;
use App\Models\Tipo_externo;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class RegistroExterno extends Component
{
    use WithFileUploads;

    public $colaborador, $tiposExterno, $generos, $estadosCivil, $areas, $supervisores;

    public $nombre_1, $nombre_2, $ap_paterno, $ap_materno, $fecha_nacimiento, $tipo_externo, $genero, $area, $supervisor, $rfc, $curp, $tel_contacto, $foto, $foto_ruta;

    public $bandera = false;

    protected $rules = [
        'tipo_externo' => 'required',
        'nombre_1' => 'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
        'ap_paterno' => 'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
        'ap_materno' => 'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
        'genero' => 'required',
        'fecha_nacimiento' => 'required',
        'curp' => 'required|regex:/[A-Z0-9]/',
        'rfc' => 'required|regex:/[A-Z0-9-]/',
        'area' => 'required',
        'supervisor' => 'required',
        'tel_contacto' => 'required|regex:/^[0-9]{10}$/',
        'foto' => 'required|image|max:1024',
    ];

    protected $messages = [
        'tipo_externo.required' => 'Este campo no puede estar vacío',
        'nombre_1.required' => 'El primer nombre no puede estar vacío',
        'nombre_1.regex' => 'El primer nombre debe contener únicamente letras y espacios',
        'ap_paterno.required' => 'El Apellido paterno no puede estar vacío',
        'ap_paterno.regex' => 'El Apellido paterno debe contener únicamente letras y espacios',
        'ap_materno.required' => 'El Apellido materno no puede estar vacío',
        'ap_materno.regex' => 'El Apellido materno debe contener unicamente letras y espacios',
        'genero.required' => 'Esta opción no puede permanecer vacía',
        'fecha_nacimiento.required' => 'Esta opción no puede permanecer vacía',
        'curp.required' => 'El CURP no puede estar vacío',
        'curp.regex' => 'El CURP solo puede contener letras mayúsculas y números',
        'rfc.required' => 'El RFC no puede estar vacío',
        'rfc.regex' => 'El RFC solo puede contener letras, números y guión medio',
        'area.required' => 'Esta opción no puede permanecer vacía',
        'supervisor.required' => 'Esta opción no puede permanecer vacía',
        'tel_contacto.required' => 'El Teléfono de contacto no puede permanecer vacío',
        'foto.required' => 'Es necesario que elijas una fotografía'
    ];

    protected $listeners = [
        'registrar',
        'cancelled',
    ];

    public function cancelled()
    {
        $this->alert('info', 'Se canceló el registro', [
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

    public function triggerConfirm()
    {
        $this->confirm('¿Quieres agregar a este colaborador externo?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  'Si',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'registrar',
            'onCancelled' => 'cancelled'
        ]);
    }

    public function mount()
    {
        $this->generos = Genero::all();
        $this->tiposExterno = Tipo_externo::all();
        $this->areas = Area::all();
        $this->supervisores = Colaborador::where('tipo_colaborador_id', 2)->get();
    }

    public function render()
    {
        return view('livewire.registro-externo');
    }

    public function registrar()
    {
        $this->validate();

        try {
            $this->foto_ruta = $this->foto->store('images_externos', 'public');

            DB::transaction(function () {
                Externo::create([
                    'nombre_1' => $this->nombre_1,
                    'nombre_2' => $this->nombre_2,
                    'ap_paterno' => $this->ap_paterno,
                    'ap_materno' => $this->ap_materno,
                    'fecha_nacimiento' => $this->fecha_nacimiento,
                    'genero_id' => $this->genero,
                    'curp' => $this->curp,
                    'rfc' => $this->rfc,
                    'area_id' => $this->area,
                    'supervisor' => $this->supervisor,
                    'tipo_externo_id' => $this->tipo_externo,
                    'tel_contacto' => $this->tel_contacto,
                    'foto' => $this->foto_ruta,
                ]);
            });

            $this->flash('success', 'El colaborador externo se ha registrado con éxito', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);

            return redirect()->route('registro-externos');
        } catch (Exception $ex) {
            $this->alert('error', 'Este externo ya está registrado', [
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
