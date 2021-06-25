<?php

namespace App\Http\Livewire;

use App\Models\Actualizar_colaborador;
use Exception;
use App\Models\Hijos;
use App\Models\Genero;
use Livewire\Component;
use App\Models\Colaborador;
use App\Models\Estado_civil;
use Illuminate\Support\Facades\DB;
use App\Models\Contactos_emergencia;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class ComprobarColaborador extends Component
{

    use WithFileUploads;

    public $actasNacimientoHijo = [],$permisoSubiractas;
    public $comprobante,$permisoSubircomprobante;
    public $colString;

    public $habilitarForm = true;

    

    public $colaborador,$no_colaborador;
    public $direccion,$colonia,$municipio,$estado,$codigo_postal,$contactoEmergencia;
    public $genero, $estado_civil, $paternidad,$correo, $tel_fijo, $tel_movil, $tel_recados;

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
        'actasNacimientoHijo.*'  => 'mimes:pdf|max:10240',
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
        'telefono_contacto1.regex' => 'El número telefónico debe contener 10 dígitos'
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

    public function mount($no_colaborador){
        $this->colaborador = Colaborador::findOrFail($no_colaborador);
        $this->direccion = $this->colaborador->domicilio;
        $this->colonia= $this->colaborador->colonia;
        $this->municipio= $this->colaborador->municipio;
        $this->estado = $this->colaborador->estado;
        $this->codigo_postal = $this->colaborador->codigo_postal;
        $this->genero= $this->colaborador->genero_id;
        $this->estado_civil = $this->colaborador->estado_civil_id;
        $this->paternidad = $this->colaborador->paternidad_id;
        $this->tel_fijo= $this->colaborador->tel_fijo;
        $this->tel_movil = $this->colaborador->tel_movil;
        $this->tel_recados = $this->colaborador->tel_recados;
        $this->correo = $this->colaborador->correo;
        
        // Hijos
        $hijosColaborador = Hijos::where('colaborador_no_colaborador', $no_colaborador)->get();
        $noHijos = Hijos::where('colaborador_no_colaborador', $no_colaborador)->count();

        for ($i = 0; $i <= $noHijos; $i++) {

            switch ($i) {
                case '1':
                    $this->edad_hijo1 = $hijosColaborador[0]->edad;
                    $this->escolaridad_hijo1 = $hijosColaborador[0]->escolaridad_id;
                    break;
                case '2':
                    $this->edad_hijo2 = $hijosColaborador[1]->edad;
                    $this->escolaridad_hijo2 = $hijosColaborador[1]->escolaridad_id;
                    break;
                case '3':
                    $this->edad_hijo3 = $hijosColaborador[2]->edad;
                    $this->escolaridad_hijo3 = $hijosColaborador[2]->escolaridad_id;
                    break;
                case '4':
                    $this->edad_hijo4 = $hijosColaborador[3]->edad;
                    $this->escolaridad_hijo4 = $hijosColaborador[3]->escolaridad_id;
                    break;
                case '5':
                    $this->edad_hijo5 = $hijosColaborador[4]->edad;
                    $this->escolaridad_hijo5 = $hijosColaborador[4]->escolaridad_id;
                    break;
                case '6':
                    $this->edad_hijo6 = $hijosColaborador[5]->edad;
                    $this->escolaridad_hijo6 = $hijosColaborador[5]->escolaridad_id;
                    break;

                default:

                    break;
            }
        }

        //Contactos de emergencia
        $contactosColaborador = Contactos_emergencia::where('colaborador_no_colaborador', $no_colaborador)->get();
        $noContactos = Contactos_emergencia::where('colaborador_no_colaborador', $no_colaborador)->count();

        for ($i = 0; $i <= $noContactos; $i++) {

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

                default:

                    break;
            }
        }

        //Validar botones de subida de archivo
        $this->colString= $this->colaborador->no_colaborador;
        if (Storage::exists('public/documentos/'.$this->colString.'/actasHijos/')) {
            $this->permisoSubiractas= true;
            // Existe las actas
        }else{
           $this->permisoSubiractas = false;
            // No existe las actas   
        }

        if (Storage::exists('public/documentos/'.$this->colString.'/'.$this->colString.'_comprobanteDomicilio.pdf')) {
            $this->permisoSubircomprobante= true;
            
            //Existe comprobante
        } else {
            $this->permisoSubircomprobante= false;
            // No existe combrobante
        }        

    }

    public function render()
    {
        $generos = Genero::all();
        $estadosCivil = Estado_civil::all();
        $paternidadArray = [ array('id'=>0,'nom'=>'No'),array('id'=>1,'nom'=>'Si') ];
        $paternidadArray = collect($paternidadArray);

        $permisoSubiractas2= $this->permisoSubiractas;
        $permisoSubircomprobante2=$this->permisoSubircomprobante;
        $habilitarForm = $this->habilitarForm;

        return view('livewire.comprobar-colaborador', compact('generos','estadosCivil','paternidadArray','permisoSubiractas2','permisoSubircomprobante2','habilitarForm'))->layout('layouts.guest');
    }

    public function habilitar()
    {
        $this->habilitarForm= !$this->habilitarForm;
    }


    public function actualizar()
    {
        $this->validate();

        // Actualizar datos
        try {

            DB::transaction(function (){

                // Colaborador
                $domicilio_c = ucfirst($this->direccion);
                $colonia_c = ucwords(strtolower($this->colonia));
                $municipio_c = ucwords(strtolower($this->municipio));
                $estado_c = ucwords(strtolower($this->estado));
                
                Colaborador::where('no_colaborador',$this->no_colaborador)->update([
                    'genero_id' =>$this->genero,
                    'estado_civil_id' =>$this->estado_civil,
                    'domicilio' => $domicilio_c,
                    'colonia' => $colonia_c,
                    'municipio' => $municipio_c,
                    'estado' => $estado_c,
                    'codigo_postal' =>$this->codigo_postal,
                    'paternidad_id' => $this->paternidad,
                    'correo' =>$this->correo,
                    'tel_fijo' =>$this->tel_fijo,
                    'tel_movil' =>$this->tel_movil,
                    'tel_recados' =>$this->tel_recados
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

                /* Validar si esta activo los input de actas y comprobante */
                if ($this->permisoSubiractas === true) {
            
                }else{
                    foreach ($this->actasNacimientoHijo as $anH) {
                        $anH->store('documentos/'.$this->colString.'/actasHijos/','public');
                    }
                }
        
                if ($this->permisoSubircomprobante === true) {
                    
                } else {
                    $this->comprobante->storeAs('public/documentos/'.$this->colString,$this->colString.'_comprobanteDomicilio.pdf');
                }

            });

            $this->flash('success', 'El colaborador se ha actualizado con éxito', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
            return redirect()->to('/colaborador/' . $this->colaborador->no_colaborador);
        } catch (Exception $ex) {
            // dd($ex);
            $this->alert('error', 'Ha ocurrido un error:'.$ex, [
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
