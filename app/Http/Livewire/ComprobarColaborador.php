<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\Hijos;
use App\Models\Genero;
use Livewire\Component;
use App\Models\Colaborador;
use Illuminate\Support\Arr;
use App\Models\Estado_civil;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Models\Contactos_emergencia;
use App\Models\Actualizar_colaborador;
use Illuminate\Support\Facades\Storage;

class ComprobarColaborador extends Component
{

    use WithFileUploads;

    public $actaNacimientoHijo1, $actaNacimientoHijo2, $actaNacimientoHijo3, $actaNacimientoHijo4, $actaNacimientoHijo5, $actaNacimientoHijo6;
    public $permisoSubiracta1, $permisoSubiracta2, $permisoSubiracta3, $permisoSubiracta4, $permisoSubiracta5, $permisoSubiracta6;
    public $comprobante, $permisoSubircomprobante;
    public $colString, $hijosColaborador;

    public $colaborador, $no_colaborador;
    public $direccion, $colonia, $municipio, $estado, $codigo_postal, $contactoEmergencia;
    public $genero, $estado_civil, $paternidad, $correo, $tel_fijo, $tel_movil, $tel_recados;

    public $edad_hijo1, $edad_hijo2, $edad_hijo3, $edad_hijo4, $edad_hijo5, $edad_hijo6;
    public $escolaridad_hijo1, $escolaridad_hijo2, $escolaridad_hijo3, $escolaridad_hijo4, $escolaridad_hijo5, $escolaridad_hijo6;

    public $nombre_contacto1, $nombre_contacto2, $nombre_contacto3, $nombre_contacto4;
    public $parentesco_contacto1, $parentesco_contacto2, $parentesco_contacto3, $parentesco_contacto4;
    public $telefono_contacto1, $telefono_contacto2, $telefono_contacto3, $telefono_contacto4;
    public $domicilio_contacto1, $domicilio_contacto2, $domicilio_contacto3, $domicilio_contacto4;

    protected $rules = [
        'genero' => 'required',
        'estado_civil' => 'required',
        'paternidad' => 'required',
        'direccion' => 'required',
        'colonia' => 'required',
        'municipio' => 'required|regex:/[a-zA-Z]/',
        'estado' => 'required|regex:/[a-zA-Z]/',
        'codigo_postal' => 'required|regex:/^[0-9]{5}$/',
        'correo' => 'required|email',
        'tel_fijo' => 'regex:/^[0-9]{10}$/',
        'tel_movil' => 'regex:/^[0-9]{10}$/',

        'nombre_contacto1' => 'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
        'parentesco_contacto1' => 'required|regex:/[a-zA-Z]/',
        'telefono_contacto1' => 'required|regex:/^[0-9]{10}$/',
        'domicilio_contacto1' => 'required',
        'comprobante.*' => 'mimes:pdf|max:5120',
        'actaNacimientoHijo1.*'  => 'mimes:pdf|max:5120',
        'actaNacimientoHijo2.*'  => 'mimes:pdf|max:5120',
        'actaNacimientoHijo3.*'  => 'mimes:pdf|max:5120',
        'actaNacimientoHijo4.*'  => 'mimes:pdf|max:5120',
        'actaNacimientoHijo5.*'  => 'mimes:pdf|max:5120',
        'actaNacimientoHijo6.*'  => 'mimes:pdf|max:5120',
    ];

    protected $messages = [
        'genero.required' => 'Esta opción no puede permanecer vacía',
        'estado_civil.required' => 'Esta opción no puede permanecer vacía',
        'paternidad.required' => 'Esta opción no puede permanecer vacía',
        'direccion.required' => 'El Domicilio no puede estar vacío',
        'colonia.required' => 'La Colonia no puede estar vacía',
        'municipio.required' => 'El Municipio no puede estar vacío',
        'municipio.regex' => 'El Municipio solo puede contener letras mayúsculas y minúsculas',
        'estado.required' => 'El Estado no puede estar vacío',
        'estado.regex' => 'El Estado solo puede contener letras mayúsculas y minúsculas',
        'codigo_postal.required' => 'El Codigo postal no puede estar vacío',
        'codigo_posta.regex' => 'El Código postal solo puede contener 5 digitos',
        'correo.required' => 'El correo no puede estar vacío',
        'correo.email' => 'Este no es un formato válido de correo',
        'tel_fijo.regex' => 'El Teléfono fijo debe contener 10 dígitos',
        'tel_movil.required' => 'El Teléfono móvil no puede permanecer vacío',
        'tel_movil.regex' => 'El Teléfono móvil debe contener 10 dígitos',

        'nombre_contacto1.required' => 'Se requiere al menos un contacto de emergencia',
        'parentesco_contacto1.required' => 'Este campo no puede estar vacío',
        'telefono_contacto1.required' => 'Este campo no puede estar vacío',
        'domicilio_contacto1.required' => 'Este campo no puede estar vacío',

        'nombre_contacto1.regex' => 'El nombre solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ',
        'parentesco_contacto1.regex' => 'El parentesco solo puede contener letras mayúsculas y minúsculas',
        'telefono_contacto1.regex' => 'El número telefónico debe contener 10 dígitos',
    ];


    protected $listeners = [
        'actualizar',
        'cancelled',
    ];

    public function cancelled()
    {
        $this->alert('info', 'Se canceló la actualizacion de datos', [
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
        $this->confirm('¿Quieres actualizar tus datos?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  'Si',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'actualizar',
            'onCancelled' => 'cancelled'
        ]);
    }

    public function mount($no_colaborador)
    {
        $this->colaborador = Colaborador::findOrFail($no_colaborador);
        $this->direccion = $this->colaborador->domicilio;
        $this->colonia = $this->colaborador->colonia;
        $this->municipio = $this->colaborador->municipio;
        $this->estado = $this->colaborador->estado;
        $this->codigo_postal = $this->colaborador->codigo_postal;
        $this->genero = $this->colaborador->genero_id;
        $this->estado_civil = $this->colaborador->estado_civil_id;
        $this->paternidad = $this->colaborador->paternidad_id;
        $this->tel_fijo = $this->colaborador->tel_fijo;
        $this->tel_movil = $this->colaborador->tel_movil;
        $this->tel_recados = $this->colaborador->tel_recados;
        $this->correo = $this->colaborador->correo;

        // Hijos
        $this->hijosColaborador = Hijos::where('colaborador_no_colaborador', $no_colaborador)->get();
        for ($i = 1; $i <= count($this->hijosColaborador); $i++) {
            switch ($i) {
                case '1':
                    $this->edad_hijo1 = $this->hijosColaborador[0]->edad;
                    $this->escolaridad_hijo1 = $this->hijosColaborador[0]->escolaridad_id;
                    break;
                case '2':
                    $this->edad_hijo2 = $this->hijosColaborador[1]->edad;
                    $this->escolaridad_hijo2 = $this->hijosColaborador[1]->escolaridad_id;
                    break;
                case '3':
                    $this->edad_hijo3 = $this->hijosColaborador[2]->edad;
                    $this->escolaridad_hijo3 = $this->hijosColaborador[2]->escolaridad_id;
                    break;
                case '4':
                    $this->edad_hijo4 = $this->hijosColaborador[3]->edad;
                    $this->escolaridad_hijo4 = $this->hijosColaborador[3]->escolaridad_id;
                    break;
                case '5':
                    $this->edad_hijo5 = $this->hijosColaborador[4]->edad;
                    $this->escolaridad_hijo5 = $this->hijosColaborador[4]->escolaridad_id;
                    break;
                case '6':
                    $this->edad_hijo6 = $this->hijosColaborador[5]->edad;
                    $this->escolaridad_hijo6 = $this->hijosColaborador[5]->escolaridad_id;
                    break;

                default:

                    break;
            }
        }

        //Contactos de emergencia
        $contactosColaborador = Contactos_emergencia::where('colaborador_no_colaborador', $no_colaborador)->get();

        for ($i = 0; $i <= count($contactosColaborador); $i++) {

            switch ($i) {
                case '1':
                    $this->nombre_contacto1 = $contactosColaborador[0]->nombre;
                    $this->parentesco_contacto1 = $contactosColaborador[0]->parentesco;
                    $this->telefono_contacto1 = $contactosColaborador[0]->telefono;
                    $this->domicilio_contacto1 = $contactosColaborador[0]->domicilio;
                    break;
                case '2':
                    $this->nombre_contacto2 = $contactosColaborador[1]->nombre;
                    $this->parentesco_contacto2 = $contactosColaborador[1]->parentesco;
                    $this->telefono_contacto2 = $contactosColaborador[1]->telefono;
                    $this->domicilio_contacto2 = $contactosColaborador[1]->domicilio;
                    break;
                case '3':
                    $this->nombre_contacto3 = $contactosColaborador[2]->nombre;
                    $this->parentesco_contacto3 = $contactosColaborador[2]->parentesco;
                    $this->telefono_contacto3 = $contactosColaborador[2]->telefono;
                    $this->domicilio_contacto3 = $contactosColaborador[2]->domicilio;
                    break;
                case '4':
                    $this->nombre_contacto4 = $contactosColaborador[3]->nombre;
                    $this->parentesco_contacto4 = $contactosColaborador[3]->parentesco;
                    $this->telefono_contacto4 = $contactosColaborador[3]->telefono;
                    $this->domicilio_contacto4 = $contactosColaborador[3]->domicilio;
                    break;
                case '5':
                    $this->nombre_contacto4 = $contactosColaborador[4]->nombre;
                    $this->parentesco_contacto4 = $contactosColaborador[4]->parentesco;
                    $this->telefono_contacto4 = $contactosColaborador[4]->telefono;
                    $this->domicilio_contacto4 = $contactosColaborador[4]->domicilio;
                    break;
                case '6':
                    $this->nombre_contacto4 = $contactosColaborador[5]->nombre;
                    $this->parentesco_contacto4 = $contactosColaborador[5]->parentesco;
                    $this->telefono_contacto4 = $contactosColaborador[5]->telefono;
                    $this->domicilio_contacto4 = $contactosColaborador[5]->domicilio;
                    break;
                default:

                    break;
            }
        }

        //Validar botones de subida de archivo
        $this->colString = $this->colaborador->no_colaborador;

        /* Validar si existe el archivo de comprobante de domicilio */
        Storage::exists('public/documentos/' . $this->colString . '/' . $this->colString . '_comprobanteDomicilio.pdf') ? $this->permisoSubircomprobante = true : $this->permisoSubircomprobante = false;
    }

    public function render()
    {
        $generos = Genero::all();
        $estadosCivil = Estado_civil::all();
        $paternidadArray = [array('id' => 0, 'nom' => 'No'), array('id' => 1, 'nom' => 'Si')];
        $paternidadArray = collect($paternidadArray);

        if ($this->edad_hijo1 != null && $this->escolaridad_hijo1 != null) {
            $this->permisoSubiracta1 = true;

            if ($this->hijosColaborador->isempty()) {
                $this->permisoSubiracta1 = true;
            } else {
                if (Storage::exists('public/documentos/' . $this->colString . '/actasHijos/' . $this->hijosColaborador[0]->id . '.pdf')) {
                    $this->permisoSubiracta1 = false;
                } else {
                    $this->permisoSubiracta1 = true;
                }
            }
        } else {
            $this->permisoSubiracta1 = false;
        }

        if ($this->edad_hijo2 != null && $this->escolaridad_hijo2 != null) {
            $this->permisoSubiracta2 = true;
            if ($this->hijosColaborador->get(1)) {
                if (Storage::exists('public/documentos/' . $this->colString . '/actasHijos/' . $this->hijosColaborador[1]->id . '.pdf')) {
                    $this->permisoSubiracta2 = false;
                } else {
                    $this->permisoSubiracta2 = true;
                }
            }
        } else {
            $this->permisoSubiracta2 = false;
        }

        if ($this->edad_hijo3 != null && $this->escolaridad_hijo3 != null) {
            $this->permisoSubiracta3 = true;
            if ($this->hijosColaborador->get(2)) {
                if (Storage::exists('public/documentos/' . $this->colString . '/actasHijos/' . $this->hijosColaborador[2]->id . '.pdf')) {
                    $this->permisoSubiracta3 = false;
                } else {
                    $this->permisoSubiracta3 = true;
                }
            }
        } else {
            $this->permisoSubiracta3 = false;
        }

        if ($this->edad_hijo4 != null && $this->escolaridad_hijo4 != null) {
            $this->permisoSubiracta4 = true;
            if ($this->hijosColaborador->get(3)) {
                if (Storage::exists('public/documentos/' . $this->colString . '/actasHijos/' . $this->hijosColaborador[3]->id . '.pdf')) {
                    $this->permisoSubiracta4 = false;
                } else {
                    $this->permisoSubiracta4 = true;
                }
            }
        } else {
            $this->permisoSubiracta4 = false;
        }

        if ($this->edad_hijo5 != null && $this->escolaridad_hijo5 != null) {
            $this->permisoSubiracta5 = true;
            if ($this->hijosColaborador->get(4)) {
                if (Storage::exists('public/documentos/' . $this->colString . '/actasHijos/' . $this->hijosColaborador[4]->id . '.pdf')) {
                    $this->permisoSubiracta5 = false;
                } else {
                    $this->permisoSubiracta5 = true;
                }
            }
        } else {
            $this->permisoSubiracta5 = false;
        }

        if ($this->edad_hijo6 != null && $this->escolaridad_hijo6 != null) {
            $this->permisoSubiracta6 = true;
            if ($this->hijosColaborador->get(5)) {
                if (Storage::exists('public/documentos/' . $this->colString . '/actasHijos/' . $this->hijosColaborador[5]->id . '.pdf')) {
                    $this->permisoSubiracta6 = false;
                } else {
                    $this->permisoSubiracta6 = true;
                }
            }
        } else {
            $this->permisoSubiracta6 = false;
        }

        $permisoSubiractasRender1 = $this->permisoSubiracta1;
        $permisoSubiractasRender2 = $this->permisoSubiracta2;
        $permisoSubiractasRender3 = $this->permisoSubiracta3;
        $permisoSubiractasRender4 = $this->permisoSubiracta4;
        $permisoSubiractasRender5 = $this->permisoSubiracta5;
        $permisoSubiractasRender6 = $this->permisoSubiracta6;
        $permisoSubircomprobante2 = $this->permisoSubircomprobante;

        /* Validar si hay un cambio en los input de direccion,colonia,municipio,estado,cod_postal. */
        $this->direccion != $this->colaborador->domicilio || $this->colonia != $this->colaborador->colonia || $this->municipio != $this->colaborador->municipio || $this->estado != $this->colaborador->estado || $this->codigo_postal != $this->colaborador->codigo_postal ? $permisoSubircomprobante2 = !$this->permisoSubircomprobante : $permisoSubircomprobante2 = $this->permisoSubircomprobante;

        return view('livewire.comprobar-colaborador', compact(
            'generos',
            'estadosCivil',
            'paternidadArray',
            'permisoSubiractasRender1',
            'permisoSubiractasRender2',
            'permisoSubiractasRender3',
            'permisoSubiractasRender4',
            'permisoSubiractasRender5',
            'permisoSubiractasRender6',
            'permisoSubircomprobante2'
        ))->layout('layouts.guest');
    }

    public function actualizar()
    {
        $this->validate();

        // Actualizar datos
        try {

            DB::transaction(function () {

                // Colaborador
                $domicilio_c = ucfirst($this->direccion);
                $colonia_c = ucwords(strtolower($this->colonia));
                $municipio_c = ucwords(strtolower($this->municipio));
                $estado_c = ucwords(strtolower($this->estado));

                Colaborador::where('no_colaborador', $this->no_colaborador)->update([
                    'genero_id' => $this->genero,
                    'estado_civil_id' => $this->estado_civil,
                    'domicilio' => $domicilio_c,
                    'colonia' => $colonia_c,
                    'municipio' => $municipio_c,
                    'estado' => $estado_c,
                    'codigo_postal' => $this->codigo_postal,
                    'paternidad_id' => $this->paternidad,
                    'correo' => $this->correo,
                    'tel_fijo' => $this->tel_fijo,
                    'tel_movil' => $this->tel_movil,
                    'tel_recados' => $this->tel_recados
                ]);

                // Hijos datos
                for ($i = 1; $i <= 6; $i++) {
                    switch ($i) {

                        case '1':
                            if ($this->edad_hijo1 != null | $this->escolaridad_hijo1 != null) {
                                Hijos::updateOrCreate([
                                    'colaborador_no_colaborador' => $this->no_colaborador,
                                    'edad' => $this->edad_hijo1,
                                    'escolaridad_id' => $this->escolaridad_hijo1,
                                ]);
                            }
                            break;

                        case '2':
                            if ($this->edad_hijo2 != null | $this->escolaridad_hijo2 != null) {
                                Hijos::updateOrCreate([
                                    'colaborador_no_colaborador' => $this->no_colaborador,
                                    'edad' => $this->edad_hijo2,
                                    'escolaridad_id' => $this->escolaridad_hijo2,
                                ]);
                            }
                            break;

                        case '3':
                            if ($this->edad_hijo3 != null | $this->escolaridad_hijo3 != null) {
                                Hijos::updateOrCreate([
                                    'colaborador_no_colaborador' => $this->no_colaborador,
                                    'edad' => $this->edad_hijo3,
                                    'escolaridad_id' => $this->escolaridad_hijo3,
                                ]);
                            }
                            break;

                        case '4':
                            if ($this->edad_hijo4 != null | $this->escolaridad_hijo4 != null) {
                                Hijos::updateOrCreate([
                                    'colaborador_no_colaborador' => $this->no_colaborador,
                                    'edad' => $this->edad_hijo4,
                                    'escolaridad_id' => $this->escolaridad_hijo4,
                                ]);
                            }
                            break;

                        case '5':
                            if ($this->edad_hijo5 != null | $this->escolaridad_hijo5 != null) {
                                Hijos::updateOrCreate([
                                    'colaborador_no_colaborador' => $this->no_colaborador,
                                    'edad' => $this->edad_hijo5,
                                    'escolaridad_id' => $this->escolaridad_hijo5,
                                ]);
                            }
                            break;

                        case '6':
                            if ($this->edad_hijo6 != null | $this->escolaridad_hijo6 != null) {
                                Hijos::updateOrCreate([
                                    'colaborador_no_colaborador' => $this->no_colaborador,
                                    'edad' => $this->edad_hijo6,
                                    'escolaridad_id' => $this->escolaridad_hijo6,
                                ]);
                            }
                            break;
                    }
                }

                // Contactos Emergencia
                for ($i = 1; $i <= 4; $i++) {

                    switch ($i) {

                        case '1':
                            if (
                                $this->nombre_contacto1 != null | $this->parentesco_contacto1 != null |
                                $this->telefono_contacto1 != null | $this->domicilio_contacto1 != null
                            ) {
                                $nombre_contacto1_c = ucwords(strtolower($this->nombre_contacto1));
                                $parentesco_contacto1_c = ucfirst($this->parentesco_contacto1);
                                $domicilio_contacto1_c = ucfirst($this->domicilio_contacto1);

                                Contactos_emergencia::updateOrCreate([
                                    'colaborador_no_colaborador' => $this->no_colaborador,
                                    'nombre' => $nombre_contacto1_c,
                                    'parentesco' => $parentesco_contacto1_c,
                                    'telefono' => $this->telefono_contacto1,
                                    'domicilio' => $domicilio_contacto1_c,
                                ]);
                            }
                            break;
                        case '2':
                            if (
                                $this->nombre_contacto2 != null | $this->parentesco_contacto2 != null |
                                $this->telefono_contacto2 != null | $this->domicilio_contacto2 != null
                            ) {
                                $nombre_contacto2_c = ucwords(strtolower($this->nombre_contacto2));
                                $parentesco_contacto2_c = ucfirst($this->parentesco_contacto2);
                                $domicilio_contacto2_c = ucfirst($this->domicilio_contacto2);

                                Contactos_emergencia::updateOrCreate([
                                    'colaborador_no_colaborador' => $this->no_colaborador,
                                    'nombre' => $nombre_contacto2_c,
                                    'parentesco' => $parentesco_contacto2_c,
                                    'telefono' => $this->telefono_contacto2,
                                    'domicilio' => $domicilio_contacto2_c,
                                ]);
                            }
                            break;
                        case '3':
                            if (
                                $this->nombre_contacto3 != null | $this->parentesco_contacto3 != null |
                                $this->telefono_contacto3 != null | $this->domicilio_contacto3 != null
                            ) {

                                $nombre_contacto3_c = ucwords(strtolower($this->nombre_contacto3));
                                $parentesco_contacto3_c = ucfirst($this->parentesco_contacto3);
                                $domicilio_contacto3_c = ucfirst($this->domicilio_contacto3);

                                Contactos_emergencia::updateOrCreate([
                                    'colaborador_no_colaborador' => $this->no_colaborador,
                                    'nombre' => $nombre_contacto3_c,
                                    'parentesco' => $parentesco_contacto3_c,
                                    'telefono' => $this->telefono_contacto3,
                                    'domicilio' => $domicilio_contacto3_c,
                                ]);
                            }
                            break;
                        case '4':
                            if (
                                $this->nombre_contacto4 != null | $this->parentesco_contacto4 != null |
                                $this->telefono_contacto4 != null | $this->domicilio_contacto4 != null
                            ) {

                                $nombre_contacto4_c = ucwords(strtolower($this->nombre_contacto4));
                                $parentesco_contacto4_c = ucfirst($this->parentesco_contacto4);
                                $domicilio_contacto4_c = ucfirst($this->domicilio_contacto4);

                                Contactos_emergencia::updateOrCreate([
                                    'colaborador_no_colaborador' => $this->no_colaborador,
                                    'nombre' => $nombre_contacto4_c,
                                    'parentesco' => $parentesco_contacto4_c,
                                    'telefono' => $this->telefono_contacto4,
                                    'domicilio' => $domicilio_contacto4_c,
                                ]);
                            }
                            break;
                    }
                }
            });

            /* Eliminar todos los hijosActas si selecciona la opcion No(0) */
            if ($this->paternidad == 0) {
                Hijos::where('colaborador_no_colaborador', $this->colString)->delete();
                Storage::deleteDirectory('public/documentos/' . $this->colString . '/actasHijos');
            }

            /* Eliminar a un hijo & acta */
            if (($this->edad_hijo1 === null || empty($this->edad_hijo1)) && ($this->escolaridad_hijo1 === null || empty($this->escolaridad_hijo1))) {
                try {
                    Hijos::where('id', $this->hijosColaborador[0]->id)->delete();
                    Storage::delete('public/documentos/' . $this->colString . '/actasHijos/' . $this->hijosColaborador[0]->id . '.pdf');
                } catch (Exception $ex) {
                }
            }

            if (($this->edad_hijo2 === null || empty($this->edad_hijo2)) && ($this->escolaridad_hijo2 === null || empty($this->escolaridad_hijo2))) {
                try {
                    if ($this->hijosColaborador->get(1)) {
                        Hijos::where('id', $this->hijosColaborador[1]->id)->delete();
                        Storage::delete('public/documentos/' . $this->colString . '/actasHijos/' . $this->hijosColaborador[1]->id . '.pdf');
                    }
                } catch (Exception $ex) {
                }
            }

            if (($this->edad_hijo3 === null || empty($this->edad_hijo3)) && ($this->escolaridad_hijo3 === null || empty($this->escolaridad_hijo3))) {
                try {
                    if ($this->hijosColaborador->get(2)) {
                        Hijos::where('id', $this->hijosColaborador[2]->id)->delete();
                        Storage::delete('public/documentos/' . $this->colString . '/actasHijos/' . $this->hijosColaborador[2]->id . '.pdf');
                    }
                } catch (Exception $ex) {
                }
            }

            if (($this->edad_hijo4 === null || empty($this->edad_hijo4)) && ($this->escolaridad_hijo4 === null || empty($this->escolaridad_hijo4))) {
                try {
                    if ($this->hijosColaborador->get(3)) {
                        Hijos::where('id', $this->hijosColaborador[3]->id)->delete();
                        Storage::delete('public/documentos/' . $this->colString . '/actasHijos/' . $this->hijosColaborador[3]->id . '.pdf');
                    }
                } catch (Exception $ex) {
                }
            }

            if (($this->edad_hijo5 === null || empty($this->edad_hijo5)) && ($this->escolaridad_hijo5 === null || empty($this->escolaridad_hijo5))) {
                try {
                    if ($this->hijosColaborador->get(4)) {
                        Hijos::where('id', $this->hijosColaborador[4]->id)->delete();
                        Storage::delete('public/documentos/' . $this->colString . '/actasHijos/' . $this->hijosColaborador[4]->id . '.pdf');
                    }
                } catch (Exception $ex) {
                }
            }

            if (($this->edad_hijo6 === null || empty($this->edad_hijo6)) && ($this->escolaridad_hijo6 === null || empty($this->escolaridad_hijo6))) {
                try {
                    if ($this->hijosColaborador->get(5)) {
                        Hijos::where('id', $this->hijosColaborador[5]->id)->delete();
                        Storage::delete('public/documentos/' . $this->colString . '/actasHijos/' . $this->hijosColaborador[5]->id . '.pdf');
                    }
                } catch (Exception $ex) {
                }
            }

            /* Validar si esta activo el input de actas */
            $this->hijosColaborador = Hijos::where('colaborador_no_colaborador', $this->colString)->get();
            if ($this->permisoSubiracta1 === false) {
                $rutaActas[] = $rutaActa1 = NULL;
            } else {
                if (empty($this->actaNacimientoHijo1) || $this->actaNacimientoHijo1 === '') {
                    $rutaActas[] = $rutaActa1 = NULL;
                } else {
                    if ($this->hijosColaborador->get('0')) {
                        $rutaActa1 = $this->actaNacimientoHijo1->storeAs('public/documentos/' . $this->colString . '/actasHijos', $this->hijosColaborador[0]->id . '.pdf');
                        // dd($rutaActa1);
                        $rutaActas[] = $rutaActa1;
                    }
                }
            }

            if ($this->permisoSubiracta2 === false) {
                $rutaActas[] = $rutaActa2 = NULL;
            } else {
                if (empty($this->actaNacimientoHijo2) || $this->actaNacimientoHijo2 === '') {
                    $rutaActas[] = $rutaActa2 = NULL;
                } else {
                    if ($this->hijosColaborador->get(1)) {
                        $rutaActa2 = $this->actaNacimientoHijo2->storeAs('public/documentos/' . $this->colString . '/actasHijos', $this->hijosColaborador[1]->id . '.pdf');
                        $rutaActas[] = $rutaActa2;
                    }
                }
            }

            if ($this->permisoSubiracta3 === false) {
                $rutaActas[] = $rutaActa3 = NULL;
            } else {
                if (empty($this->actaNacimientoHijo3) || $this->actaNacimientoHijo3 === '') {
                    $rutaActas[] = $rutaActa3 = NULL;
                } else {
                    if ($this->hijosColaborador->get(2)) {
                        $rutaActa3 = $this->actaNacimientoHijo3->storeAs('public/documentos/' . $this->colString . '/actasHijos', $this->hijosColaborador[2]->id . '.pdf');
                        $rutaActas[] = $rutaActa3;
                    }
                }
            }

            if ($this->permisoSubiracta4 === false) {
                $rutaActas[] = $rutaActa4 = NULL;
            } else {
                if (empty($this->actaNacimientoHijo4) || $this->actaNacimientoHijo4 === '') {
                    $rutaActas[] = $rutaActa4 = NULL;
                } else {
                    if ($this->hijosColaborador->get(3)) {
                        $rutaActa4 = $this->actaNacimientoHijo4->storeAs('public/documentos/' . $this->colString . '/actasHijos', $this->hijosColaborador[3]->id . '.pdf');
                        $rutaActas[] = $rutaActa4;
                    }
                }
            }

            if ($this->permisoSubiracta5 === false) {
                $rutaActas[] = $rutaActa5 = NULL;
            } else {
                if (empty($this->actaNacimientoHijo5) || $this->actaNacimientoHijo5 === '') {
                    $rutaActas[] = $rutaActa5 = NULL;
                } else {
                    if ($this->hijosColaborador->get(4)) {
                        $rutaActa5 = $this->actaNacimientoHijo5->storeAs('public/documentos/' . $this->colString . '/actasHijos', $this->hijosColaborador[4]->id . '.pdf');
                        $rutaActas[] = $rutaActa5;
                    }
                }
            }

            if ($this->permisoSubiracta6 === false) {
                $rutaActas[] = $rutaActa6 = NULL;
            } else {
                if (empty($this->actaNacimientoHijo6) || $this->actaNacimientoHijo6 === '') {
                    $rutaActas[] = $rutaActa6 = NULL;
                } else {
                    if ($this->hijosColaborador->get(5)) {
                        $rutaActa6 = $this->actaNacimientoHijo6->storeAs('public/documentos/' . $this->colString . '/actasHijos', $this->hijosColaborador[5]->id . '.pdf');
                        $rutaActas[] = $rutaActa6;
                    }
                }
            }

            /* Validar si esta activo el input de Comprobante */
            if ($this->permisoSubircomprobante === true) {
                $rutaComprobante = '';
            } else {
                if (empty($this->comprobante) || $this->comprobante === '') {
                    $rutaComprobante = '';
                } else {
                    $rutaComprobante = $this->comprobante->storeAs('public/documentos/' . $this->colString, $this->colString . '_comprobanteDomicilio.pdf');
                }
            }

            /* Guardar datos que cambio el colaborador */
            $rutaActas = json_encode($rutaActas);

            Actualizar_colaborador::create([
                'colaborador_no_colaborador' => $this->no_colaborador,
                'direccion' => $this->direccion,
                'colonia' => $this->colonia,
                'municipio' => $this->municipio,
                'estado' => $this->estado,
                'codigo_postal' => $this->codigo_postal,
                'genero_id' => $this->genero,
                'estado_civil_id' => $this->estado_civil,
                'paternidad_id' => $this->paternidad,
                'rutaActas' => $rutaActas,
                'rutacomporbante' => $rutaComprobante
            ]);

            $this->flash('success', 'El colaborador se ha actualizado con éxito', [
                'position' =>  'top-end',
                'timer' =>  3500,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
            return redirect()->to('/colaborador/' . $this->colaborador->no_colaborador);
        } catch (Exception $ex) {
            $this->alert('error', 'Ha ocurrido un error:', [
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
