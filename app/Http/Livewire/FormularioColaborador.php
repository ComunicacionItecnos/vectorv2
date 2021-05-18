<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\Area;
use App\Models\Hijos;
use App\Models\Turno;
use App\Models\Genero;
use App\Models\Puesto;
use Livewire\Component;
use App\Models\Extension;
use App\Models\Operacion;
use App\Models\Clave_radio;
use App\Models\Colaborador;
use App\Models\Estado_civil;
use App\Models\Nacionalidad;
use App\Models\Rango_factor;
use App\Models\Tipo_usuario;
use App\Models\Tipo_contrato;
use Livewire\WithFileUploads;
use App\Models\Ruta_transporte;
use App\Models\Tipo_colaborador;
use App\Models\Colaborador_evento;
use Illuminate\Support\Facades\DB;
use App\Models\Contactos_emergencia;

class FormularioColaborador extends Component
{
    use WithFileUploads;

    public $no_colaborador, $nombre_1, $nombre_2, $ap_paterno, $ap_materno, $genero, $fecha_nacimiento, $estado_civil,
        $paternidad, $curp, $rfc, $no_seguro_social, $domicilio, $municipio, $estado, $codigo_postal, $tipo_colaborador, $turno,
        $correo, $ruta_transporte, $puesto, $area, $jefe_directo, $tel_fijo, $tel_movil, $tel_recados,
        $extension, $clave_radio, $matriculacion, $tipo_usuario, $fecha_ingreso = '';

    public $nacionalidad, $colonia, $operacion, $tipo_contrato;

    public $foto;

    public $edad_hijo1, $edad_hijo2, $edad_hijo3, $edad_hijo4, $edad_hijo5, $edad_hijo6;
    public $escolaridad_hijo1, $escolaridad_hijo2, $escolaridad_hijo3, $escolaridad_hijo4, $escolaridad_hijo5, $escolaridad_hijo6;

    public $nombre_contacto1, $nombre_contacto2, $nombre_contacto3, $nombre_contacto4;
    public $parentesco_contacto1, $parentesco_contacto2, $parentesco_contacto3, $parentesco_contacto4;
    public $telefono_contacto1, $telefono_contacto2, $telefono_contacto3, $telefono_contacto4;
    public $domicilio_contacto1, $domicilio_contacto2, $domicilio_contacto3, $domicilio_contacto4;

    protected $rules = [
        'no_colaborador' => 'required|digits_between:5,6',
        'nombre_1' => 'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
        'ap_paterno' => 'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
        'ap_materno' => 'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
        'genero' => 'required',
        'fecha_nacimiento' => 'required',
        'estado_civil' => 'required',
        'paternidad' => 'required',
        'curp' => 'required|regex:/[A-Z0-9]/',
        'rfc' => 'required|regex:/[A-Z0-9-]/',
        'domicilio' => 'required',
        'colonia' => 'required',
        'municipio' => 'required|regex:/[a-zA-Z]/',
        'estado' => 'required|regex:/[a-zA-Z]/',
        'nacionalidad' => 'required',
        'codigo_postal' => 'required|regex:/^[0-9]{5}$/',
        'tipo_colaborador' => 'required',
        'tipo_contrato' => 'required',
        'turno' => 'required',
        'correo' => 'required|email',
        'ruta_transporte' => 'required',
        'puesto' => 'required',
        'operacion' => 'required',
        'area' => 'required',
        'jefe_directo' => 'required',
        'tel_fijo' => 'regex:/^[0-9]{10}$/',
        'tel_movil' => 'regex:/^[0-9]{10}$/',
        'tel_recados' => 'regex:/^[0-9]{10}$/',
        'extension' => 'required',
        'clave_radio' => 'required',

        'nombre_contacto1' => 'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
        'parentesco_contacto1' => 'required|regex:/[a-zA-Z]/',
        'telefono_contacto1' => 'required|regex:/^[0-9]{10}$/',
        'domicilio_contacto1' => 'required',

        'matriculacion' => 'required',
        'tipo_usuario' => 'required',
        'fecha_ingreso' => 'required',

        'foto' => 'required|image|max:1024',
    ];

    protected $messages = [
        'no_colaborador.required' => 'El Número de colaborador no puede estar vacío',
        'no_colaborador.digits_between' => 'Solo puede tener 5 dígitos como mínimo y 6 como máximo',
        'nombre_1.required' => 'El Nombre no puede estar vacío',
        'nombre_1.regex' => 'El Nombre debe contener únicamente letras y espacios',
        'nombre_2.required' => 'El Nombre no puede estar vacío',
        'nombre_2.regex' => 'El Nombre debe contener únicamente letras y espacios',
        'ap_paterno.required' => 'El Apellido paterno no puede estar vacío',
        'ap_paterno.regex' => 'El Apellido paterno debe contener únicamente letras y espacios',
        'ap_materno.required' => 'El Apellido materno no puede estar vacío',
        'ap_materno.regex' => 'El Apellido materno debe contener unicamente letras y espacios',
        'genero.required' => 'Esta opción no puede permanecer vacía',
        'fecha_nacimiento.required' => 'Esta opción no puede permanecer vacía',
        'estado_civil.required' => 'Esta opción no puede permanecer vacía',
        'paternidad.required' => 'Esta opción no puede permanecer vacía',
        'curp.required' => 'El CURP no puede estar vacío',
        'curp.regex' => 'El CURP solo puede contener letras mayúsculas y números',
        'rfc.required' => 'El RFC no puede estar vacío',
        'domicilio.required' => 'El Domicilio no puede estar vacío',
        'colonia.required' => 'La Colonia no puede estar vacía',
        'nacionalidad.required' => 'La Nacionalidad no puede estar vacía',
        'tipo_operacion.required' => 'El Tipo de operación no puede estar vacío',
        'tipo_contrato.required' => 'El Tipo de contrato no puede estar vacío',
        'rfc.regex' => 'El RFC solo puede contener letras, números y guión medio',
        'no_seguro_social.required' => 'El No. Seguro Social no puede estar vacío',
        'no_seguro_social.regex' => 'El No. Seguro Social solo puede contener letras mayúsculas, números y guión medio',
        'municipio.required' => 'El Municipio no puede estar vacío',
        'municipio.regex' => 'El Municipio solo puede contener letras mayúsculas y minúsculas',
        'estado.required' => 'El Estado no puede estar vacío',
        'estado.regex' => 'El Estado solo puede contener letras mayúsculas y minúsculas',
        'codigo_postal.required' => 'El Codigo postal no puede estar vacío',
        'codigo_posta.regex' => 'El Código postal solo puede contener 5 digitos',
        'tipo_colaborador.required' => 'Esta opción no puede permanecer vacía',
        'turno.required' => 'Esta opción no puede permanecer vacía',
        'correo.required' => 'El correo no puede estar vacío',
        'correo.email' => 'Este no es un formato válido de correo',
        'ruta_transporte.required' => 'Esta opción no puede permanecer vacía',
        'puesto.required' => 'Esta opción no puede permanecer vacía',
        'area.required' => 'Esta opción no puede permanecer vacía',
        'jefe_directo.required' => 'Esta opción no puede permanecer vacía',
        'tel_fijo.regex' => 'El Teléfono fijo debe contener 10 dígitos',
        'tel_movil.required' => 'El Teléfono móvil no puede permanecer vacío',
        'tel_movil.regex' => 'El Teléfono móvil debe contener 10 dígitos',
        'tel_recados.regex' => 'El Teléfono para recados debe contener 10 dígitos',
        'extension.required' => 'Esta opción no puede permanecer vacía',
        'clave_radio.required' => 'Esta opción no puede permanecer vacía',

        'nombre_contacto1.required' => 'Se requiere al menos un contacto de emergencia',
        'parentesco_contacto1.required' => 'Este campo no puede estar vacío',
        'telefono_contacto1.required' => 'Este campo no puede estar vacío',
        'domicilio_contacto1.required' => 'Este campo no puede estar vacío',

        'nombre_contacto1.regex' => 'El nombre solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ',
        'parentesco_contacto1.regex' => 'El parentesco solo puede contener letras mayúsculas y minúsculas',
        'telefono_contacto1.regex' => 'El número telefónico debe contener 10 dígitos',

        'matriculacion.required' => 'Este campo no puede estar vacío',
        'tipo_usuario.required' => 'Este campo no puede estar vacío',
        'fecha_ingreso.required' => 'Este campo no puede estar vacío',

        'foto.required' => 'Es necesario que elijas una fotografía'
    ];

    protected $listeners = [
        'store',
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
        $this->confirm('¿Quieres agregar a este colaborador?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  'Si',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'store',
            'onCancelled' => 'cancelled'
        ]);
    }




    public function render()
    {
        $clavesRadio = Clave_radio::where('compartida', '1')->orwhere('disponibilidad', '1')->orderBy('clave', 'ASC')->get();
        $areas = Area::select('*')->orderBy('nombre_area', 'ASC')->get();
        $extensiones = Extension::all();
        $rutas = Ruta_transporte::all();

        $puestos = Puesto::join('nivel', 'nivel.id', 'puesto.nivel_id')
            ->select('puesto.id', 'puesto.especialidad_puesto', 'nivel.nombre_nivel')
            ->get();

        $supervisores = Colaborador::select('no_colaborador', 'nombre_1', 'nombre_2', 'ap_paterno', 'ap_materno')->where('tipo_colaborador_id', 2)->orderBy('ap_paterno', 'ASC')->get();

        $turnos = Turno::all();

        $tiposColaborador = Tipo_colaborador::all();

        $tiposUsuario = Tipo_usuario::all();

        $generos = Genero::all();

        $estadosCivil = Estado_civil::all();

        $rango_factor = Rango_factor::all();

        $nacionalidades = Nacionalidad::select('*')->orderBy('pais', 'ASC')->get();;

        $operaciones = Operacion::all();

        $tipos_contrato = Tipo_contrato::all();


        return view('livewire.formulario-colaborador', compact(
            'clavesRadio',
            'areas',
            'extensiones',
            'rutas',
            'puestos',
            'supervisores',
            'turnos',
            'tiposColaborador',
            'tiposUsuario',
            'generos',
            'estadosCivil',
            'rango_factor',
            'nacionalidades',
            'operaciones',
            'tipos_contrato'
        ));
    }

    public function store()
    {

        if ($this->tipo_colaborador == 1 | $this->tipo_colaborador == 3) {
            $r_f = 1;
        } else {
            $r_f = 2;
        }
        $this->validate();
        try {

            $foto_ruta = $this->foto->store('images', 'public');

            DB::transaction(function () use($r_f,$foto_ruta){


                // ? Formato de palabras

                $nombre_1_c = ucwords(strtolower($this->nombre_1));
                $nombre_2_c = ucwords(strtolower($this->nombre_2));
                $ap_paterno_c = ucwords(strtolower($this->ap_paterno));
                $ap_materno_c = ucwords(strtolower($this->ap_materno));
                $curp_c = strtoupper($this->curp);
                $rfc_c = strtoupper($this->rfc);
                $no_seguro_social_c = strtoupper($this->no_seguro_social);
                $domicilio_c = ucfirst($this->domicilio);
                $colonia_c = ucwords(strtolower($this->colonia));
                $municipio_c = ucwords(strtolower($this->municipio));
                $estado_c = ucwords(strtolower($this->estado));

                Colaborador::updateOrCreate([

                    'no_colaborador' => $this->no_colaborador,
                    'nombre_1' => $nombre_1_c,
                    'nombre_2' => $nombre_2_c,
                    'ap_paterno' => $ap_paterno_c,
                    'ap_materno' => $ap_materno_c,
                    'fecha_nacimiento' => $this->fecha_nacimiento,
                    'genero_id' => $this->genero,
                    'estado_civil_id' => $this->estado_civil,
                    'curp' => $curp_c,
                    'rfc' => $rfc_c,
                    'no_seguro_social' => $no_seguro_social_c,
                    'domicilio' => $domicilio_c,
                    'colonia' => $colonia_c,
                    'municipio' => $municipio_c,
                    'estado' => $estado_c,
                    'nacionalidad_id' => $this->nacionalidad,
                    'codigo_postal' => $this->codigo_postal,
                    'paternidad_id' => $this->paternidad,
                    'turno_id' => $this->turno,
                    'ruta_transporte_id' => $this->ruta_transporte,
                    'puesto_id' => $this->puesto,
                    'operacion_id' => $this->operacion,
                    'area_id' => $this->area,
                    'correo' => $this->correo,
                    'tel_fijo' => $this->tel_fijo,
                    'tel_movil' => $this->tel_movil,
                    'tel_recados' => $this->tel_recados,
                    'extension_id' => $this->extension,
                    'clave_radio_id' => $this->clave_radio,
                    'jefe_directo' => $this->jefe_directo,
                    'tipo_colaborador_id' => $this->tipo_colaborador,
                    'tipo_contrato_id' => $this->tipo_contrato,
                    'fecha_ingreso' => $this->fecha_ingreso,
                    'matriculacion' => $this->matriculacion,
                    'tipo_usuario_id' => $this->tipo_usuario,
                    'rango_factor_id' => $r_f,
                    'autoeval_gen' => '0',
                    'autoeval_asig' => '0',
                    'autoeval_cal' => '0',
                    'eval_gen' => '0',
                    'eval_asig' => '0',
                    'eval_cal' => '0',
                    'estado_colaborador' => '1',
                    'foto' => $foto_ruta,
                ]);

                for ($i = 1; $i <= 6; $i++) {
                    Colaborador_evento::updateOrCreate([
                        'colaborador_no_colaborador' => $this->no_colaborador,
                        'eventos_especiales_id' => $i,
                        'entrega' => '0'
                    ]);
                }

                // ? Insert tabla Hijos

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

                // ? Insert tabla contactos_emergencia

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
            $this->flash('success', 'El colaborador se ha registrado con éxito', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);

            return redirect()->route('dashboard');
        } catch (Exception $ex) {

            $this->alert('error', 'Ha ocurrido un error', [
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
