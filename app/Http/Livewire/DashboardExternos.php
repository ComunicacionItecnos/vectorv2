<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\Area;
use App\Models\Genero;
use App\Models\Externo;
use Livewire\Component;
use App\Models\Colaborador;
use App\Models\Tipo_externo;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardExternos extends Component
{

    use WithPagination, WithFileUploads;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public $search, $perPage = '5';

    public $modal = false, $createbool = false, $editbool = false, $bandera = false, $banderaImagen = false;

    public $colaborador, $tiposExterno, $generos, $estadosCivil, $areas, $supervisores;
    public $nombre_1, $nombre_2, $ap_paterno, $ap_materno, $fecha_nacimiento, $tipo_externo, $genero, $area, $supervisor, $rfc, $curp, $tel_contacto, $foto, $foto_ruta;

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
        'eliminar',
        'cancelled',
    ];

    public function cancelled()
    {
        $this->alert('info', 'Se canceló la eliminación', [
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

    public function triggerConfirm($id)
    {
        $this->confirm('¿Quieres eliminar este colaborador?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  'Si',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'eliminar',
            'inputAttributes' => $id,
            'onCancelled' => 'cancelled'
        ]);
    }


    public function render()
    {
        return view(
            'livewire.dashboard-externos',
            [
                'externos' => DB::table('colaborador_externo')->where('id', 'LIKE', "%{$this->search}%")
                    ->OrWhere('nombre_completo', 'LIKE', "%{$this->search}%")
                    ->OrWhere('rfc', 'LIKE', "%{$this->search}%")
                    ->OrWhere('area', 'LIKE', "%{$this->search}%")
                    ->OrWhere('supervisor', 'LIKE', "%{$this->search}%")
                    ->OrWhere('tipo_externo', 'LIKE', "%{$this->search}%")
                    ->orderBy('id', 'DESC')
                    ->paginate($this->perPage),
            ]
        );
    }

    public function editar($id)
    {
        $this->resetVariables();
        $this->cargaInfo();
        $this->cargaExterno($id);
        $this->bandera = true;
        $this->editbool = true;
        $this->banderaImagen = true;
        $this->modal = true;
    }
    public function registrar()
    {
        $this->resetVariables();
        $this->cargaInfo();
        $this->bandera = false;
        $this->createbool = true;
        $this->banderaImagen = false;
        $this->modal = true;
    }

    public function registra()
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

            return redirect()->route('dashboard-externos');
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

    public function actualiza($id)
    {
        try {
            if ($this->foto != null) {
                $this->validate([
                    'foto' => 'required|image|max:1024'
                ]);
                try {

                    Storage::delete('public/' . $this->colaborador->foto);

                    DB::transaction(function () use ($id) {
                        $foto_ruta = $this->foto->store('images_externos', 'public');
                        Externo::where('id', $id)
                            ->update([
                                'foto' => $foto_ruta
                            ]);
                    });
                } catch (Exception $ex) {
                }
            } else {
            }

            $this->validate();

            DB::transaction(function () use ($id) {
                Externo::where('id', $id)
                    ->update([
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
                    ]);
            });

            $this->flash('success', 'El colaborador externo se ha actualizado con éxito', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);

            return redirect()->route('dashboard-externos');
        } catch (Exception $ex) {
            dd($ex);
            $this->alert('error', 'Ocurrió un error', [
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

    public function eliminar($id)
    {
        DB::transaction(function () use ($id) {
            $externo = Externo::find($id);
            Storage::delete('public/' . $externo->foto);
            $externo->delete();
        });

        return redirect()->route('dashboard-externos');
    }

    public function downloadImage()
    {
        return Storage::disk('public')->download($this->colaborador->foto);
    }

    public function cargaInfo()
    {
        $this->generos = Genero::all();
        $this->tiposExterno = Tipo_externo::all();
        $this->areas = Area::all();
        $this->supervisores = Colaborador::where('tipo_colaborador_id', 2)->get();
    }

    public function cargaExterno($id)
    {
        $this->colaborador = Externo::find($id);
        $this->nombre_1 = $this->colaborador->nombre_1;
        $this->nombre_2 = $this->colaborador->nombre_2;
        $this->ap_paterno = $this->colaborador->ap_paterno;
        $this->ap_materno = $this->colaborador->ap_materno;
        $this->fecha_nacimiento = $this->colaborador->fecha_nacimiento;
        $this->tipo_externo = $this->colaborador->tipo_externo_id;
        $this->genero = $this->colaborador->genero_id;
        $this->area = $this->colaborador->area_id;
        $this->supervisor = $this->colaborador->supervisor;
        $this->curp = $this->colaborador->curp;
        $this->rfc = $this->colaborador->rfc;
        $this->tel_contacto = $this->colaborador->tel_contacto;
    }

    public function setNull()
    {
        $this->modal = false;
    }

    public function resetVariables()
    {
        $this->nombre_1 = null;
        $this->nombre_2 = null;
        $this->ap_paterno = null;
        $this->ap_materno = null;
        $this->fecha_nacimiento = null;
        $this->tipo_externo = null;
        $this->genero = null;
        $this->area = null;
        $this->supervisor = null;
        $this->curp = null;
        $this->rfc = null;
        $this->tel_contacto = null;
        $this->foto = null;
    }
}
