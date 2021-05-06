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
use App\Models\Clave_radio;
use App\Models\Colaborador;
use App\Models\Estado_civil;
use App\Models\Rango_factor;
use App\Models\Tipo_usuario;
use Livewire\WithFileUploads;
use App\Models\Ruta_transporte;
use App\Models\Tipo_colaborador;
use App\Models\Colaborador_evento;
use App\Models\Contactos_emergencia;
use App\Models\Nacionalidad;
use App\Models\Operacion;
use App\Models\Tipo_contrato;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class EdicionColaborador extends Component
{
    use WithFileUploads;

    public $no_colaborador, $nombre_1, $nombre_2, $ap_paterno, $ap_materno, $genero, $fecha_nacimiento, $estado_civil,
        $paternidad, $curp, $rfc, $no_seguro_social, $domicilio, $municipio, $estado, $codigo_postal, $tipo_colaborador, $turno,
        $correo, $ruta_transporte, $puesto, $area, $jefe_directo, $tel_fijo, $tel_movil, $tel_recados,
        $extension, $clave_radio, $matriculacion, $tipo_usuario, $fecha_ingreso = '';

    public $nacionalidad, $colonia, $operacion, $proceso, $tipo_contrato;

    public $rango_factor;

    public $autoEvalGen, $autoEvalAsig, $autoEvalCal, $evalGen, $evalAsig, $evalCal;

    public $quinquenioAplica, $quinquenioEntrega, $fechaQuinquenio;

    public $ddmAplica, $ddmEntrega, $ddpAplica, $ddpEntrega, $ueAplica, $ueEntrega;

    public $r60Aplica, $r60Entrega, $bffAplica, $bffEntrega;

    public $banderaHijos = false;

    public $foto;

    public $edad_hijo1, $edad_hijo2, $edad_hijo3, $edad_hijo4, $edad_hijo5, $edad_hijo6;
    public $escolaridad_hijo1, $escolaridad_hijo2, $escolaridad_hijo3, $escolaridad_hijo4, $escolaridad_hijo5, $escolaridad_hijo6;

    public $nombre_contacto1, $nombre_contacto2, $nombre_contacto3, $nombre_contacto4;
    public $parentesco_contacto1, $parentesco_contacto2, $parentesco_contacto3, $parentesco_contacto4;
    public $telefono_contacto1, $telefono_contacto2, $telefono_contacto3, $telefono_contacto4;
    public $domicilio_contacto1, $domicilio_contacto2, $domicilio_contacto3, $domicilio_contacto4;

    public $colaborador;

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
        'municipio' => 'required|regex:/[a-zA-Z]/',
        'estado' => 'required|regex:/[a-zA-Z]/',
        'codigo_postal' => 'required|regex:/^[0-9]{5}$/',
        'tipo_colaborador' => 'required',
        'turno' => 'required',
        'correo' => 'required|email',
        'ruta_transporte' => 'required',
        'puesto' => 'required',
        'area' => 'required',
        'jefe_directo' => 'required',
        'tel_fijo' => 'required|regex:/^[0-9]{10}$/',
        'tel_movil' => 'required|regex:/^[0-9]{10}$/',
        'tel_recados' => 'required|regex:/^[0-9]{10}$/',
        'extension' => 'required',
        'clave_radio' => 'required',
        'autoEvalCal' => ['required', 'regex:/^([0-9]|([1-9][0-9])|100)$/'],
        'evalCal' => ['required', 'regex:/^([0-9]|([1-9][0-9])|100)$/'],

        'nombre_contacto1' => 'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
        'parentesco_contacto1' => 'required|regex:/[a-zA-Z]/',
        'telefono_contacto1' => 'required|regex:/^[0-9]{10}$/',
        'domicilio_contacto1' => 'required',

        'matriculacion' => 'required',
        'tipo_usuario' => 'required',
        'fecha_ingreso' => 'required',
    ];

    protected $messages = [
        'no_colaborador.required' => 'El Número de colaborador no puede estar vacío',
        'no_colaborador.digits_between' => 'Solo puede tener 5 dígitos como mínimo y 6 como máximo',
        'nombre_1.required' => 'El primer nombre no puede estar vacío',
        'nombre_1.regex' => 'El primer nombre debe contener únicamente letras y espacios',
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
        'domicilio.required' => 'El Domicilio no puede estar vacio',
        'rfc.regex' => 'El RFC solo puede contener letras, números y guión medio',
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
        'tel_fijo.required' => 'El Teléfono fijo no puede permanecer vacío',
        'tel_fijo.regex' => 'El Teléfono fijo debe contener 10 dígitos',
        'tel_movil.required' => 'El Teléfono móvil no puede permanecer vacío',
        'tel_movil.regex' => 'El Teléfono móvil debe contener 10 dígitos',
        'tel_recados.required' => 'El Teléfono para recados no puede permanecer vacío',
        'tel_recados.regex' => 'El Teléfono para recados debe contener 10 dígitos',
        'extension.required' => 'Esta opción no puede permanecer vacía',
        'clave_radio.required' => 'Esta opción no puede permanecer vacía',
        'autoEvalCal.required' => 'Este campo no puede permanecer vacio',
        'evalCal.required' => 'Este campo no puede permanecer vacio',
        'autoEvalCal.regex' => 'Este campo solo puede contener numeros del 0 al 100 sin punto decimal',
        'evalCal.regex' => 'Este campo solo puede contener numeros del 0 al 100 sin punto decimal',

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
    ];

    public function mount($no_colaborador)
    {

        $colaboradores = Colaborador::all();
        $this->colaborador = $colaboradores->find($no_colaborador);

        $this->tipo_colaborador = $this->colaborador->tipo_colaborador_id;
        $this->nombre_1 = $this->colaborador->nombre_1;
        $this->nombre_2 = $this->colaborador->nombre_2;
        $this->ap_paterno = $this->colaborador->ap_paterno;
        $this->ap_materno = $this->colaborador->ap_materno;
        $this->genero = $this->colaborador->genero_id;
        $this->fecha_nacimiento = $this->colaborador->fecha_nacimiento;
        $this->estado_civil = $this->colaborador->estado_civil_id;
        $this->no_seguro_social = $this->colaborador->no_seguro_social;
        $this->curp = $this->colaborador->curp;
        $this->rfc = $this->colaborador->rfc;
        $this->paternidad = $this->colaborador->paternidad_id;
        $this->nacionalidad = $this->colaborador->nacionalidad_id;
        $this->colonia = $this->colaborador->colonia;
        $this->domicilio = $this->colaborador->domicilio;
        $this->municipio = $this->colaborador->municipio;
        $this->estado = $this->colaborador->estado;
        $this->codigo_postal = $this->colaborador->codigo_postal;
        $this->turno = $this->colaborador->turno_id;
        $this->correo = $this->colaborador->correo;
        $this->ruta_transporte = $this->colaborador->ruta_transporte_id;
        $this->puesto = $this->colaborador->puesto_id;
        $this->area = $this->colaborador->area_id;
        $this->operacion = $this->colaborador->operacion_id;
        $this->proceso = $this->operacion;
        $this->jefe_directo = $this->colaborador->jefe_directo;
        $this->tipo_contrato = $this->colaborador->tipo_contrato_id;
        $this->tel_fijo = $this->colaborador->tel_fijo;
        $this->tel_movil = $this->colaborador->tel_movil;
        $this->tel_recados = $this->colaborador->tel_recados;
        $this->extension = $this->colaborador->extension_id;
        $this->clave_radio = $this->colaborador->clave_radio_id;
        $this->matriculacion = $this->colaborador->matriculacion;
        $this->tipo_usuario = $this->colaborador->tipo_usuario_id;
        $this->rango_factor = $this->colaborador->rango_factor_id;
        $this->fecha_ingreso = $this->colaborador->fecha_ingreso;
        $this->autoEvalGen = $this->colaborador->autoeval_gen;
        $this->autoEvalAsig = $this->colaborador->autoeval_asig;
        $this->autoEvalCal = $this->colaborador->autoeval_cal;
        $this->evalGen = $this->colaborador->eval_gen;
        $this->evalAsig = $this->colaborador->eval_asig;
        $this->evalCal = $this->colaborador->eval_cal;

        // ? Colaborador Evento

        $colaboradorEvento = Colaborador_evento::where('colaborador_no_colaborador', $this->no_colaborador)->get();
        $this->quinquenioEntrega = $colaboradorEvento[0]->entrega;
        $this->ddmEntrega = $colaboradorEvento[1]->entrega;
        $this->ddpEntrega = $colaboradorEvento[2]->entrega;
        $this->ueEntrega = $colaboradorEvento[3]->entrega;
        $this->r60Entrega = $colaboradorEvento[4]->entrega;
        $this->bffEntrega = $colaboradorEvento[5]->entrega;

        // ? Quinquenio

        $fechaIng = Carbon::parse($this->colaborador->fecha_ingreso);
        $fechaActual = Carbon::Now()->parse();
        $this->fechaQuinquenio = $fechaIng->diffInYears($fechaActual);

        if (
            $this->fechaQuinquenio == 5 | $this->fechaQuinquenio == 10 | $this->fechaQuinquenio == 15
            | $this->fechaQuinquenio == 20 | $this->fechaQuinquenio == 25 | $this->fechaQuinquenio == 30
            | $this->fechaQuinquenio == 35 | $this->fechaQuinquenio == 40 | $this->fechaQuinquenio == 45
            | $this->fechaQuinquenio == 50
        ) {
            $this->quinquenioAplica = 1;
        }

        // ? Tabla Hijos

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

        // ? Tabla Datos de contacto

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

        // ? Eventos especiales (excepto quinquenio)

        // * Dia del padre y de la madre
        if ($this->paternidad == 1 && $this->genero == 2) {
            $this->ddmAplica = 1;
        } elseif ($this->paternidad == 1 && $this->genero == 1) {
            $this->ddpAplica = 1;
        }

        // * Utiles escolares 

        $conteoHijos = Hijos::where('colaborador_no_colaborador', $no_colaborador)->get();

        foreach ($conteoHijos as $value) {

            if ($value->edad >= 5 && $value->edad < 18) {
                $this->banderaHijos = true;
            }
        }

        if ($this->paternidad == 1 && $this->banderaHijos == true) {
            $this->ueAplica = 1;
        }

        // * Regalo y Boleto
        $this->r60Aplica = true;
        $this->bffAplica = true;
    }

    public function render()
    {
        $clavesRadio = Clave_radio::select('*')->orderBy('clave', 'ASC')->get();
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

        $rangosFactor = Rango_factor::all();

        $nacionalidades = Nacionalidad::all();

        $operaciones = Operacion::all();

        $tipos_contrato = Tipo_contrato::all();




        return view('livewire.edicion-colaborador', compact(
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
            'rangosFactor',
            'nacionalidades',
            'operaciones',
            'tipos_contrato'
        ));
    }

    public function downloadImage()
    {

        return Storage::disk('public')->download($this->colaborador->foto);
    }

    public function update()
    {
        // ? Actualizacion de fotografia

        if ($this->foto != null) {
            $this->validate([
                'foto' => 'required|image|max:1024'
            ]);
            try {

                Storage::delete('public/' . $this->colaborador->foto);

                $foto_ruta = $this->foto->store('images', 'public');

                Colaborador::where('no_colaborador', $this->colaborador->no_colaborador)
                    ->update([
                        'foto' => $foto_ruta
                    ]);
            } catch (Exception $ex) {
            }
        } else {
        }

        // ? Actualizacion datos del colaborador

        $this->validate();
        try {



            // ? Formato de palabras

            $nombre_c_1 = ucwords(strtolower($this->nombre_1));
            $nombre_c_2 = ucwords(strtolower($this->nombre_2));
            $ap_paterno_c = ucwords(strtolower($this->ap_paterno));
            $ap_materno_c = ucwords(strtolower($this->ap_materno));
            $curp_c = strtoupper($this->curp);
            $rfc_c = strtoupper($this->rfc);
            $no_seguro_social_c = strtoupper($this->no_seguro_social);
            $domicilio_c = ucfirst($this->domicilio);
            $colonia_c = ucfirst($this->colonia);
            $municipio_c = ucwords(strtolower($this->municipio));
            $estado_c = ucwords(strtolower($this->estado));

            Colaborador::where('no_colaborador', $this->colaborador->no_colaborador)
                ->update([
                    'no_colaborador' => $this->no_colaborador,
                    'nombre_1' => $nombre_c_1,
                    'nombre_2' => $nombre_c_2,
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
                    'rango_factor_id' => $this->rango_factor,
                    'autoeval_gen' => $this->autoEvalGen,
                    'autoeval_asig' => $this->autoEvalAsig,
                    'autoeval_cal' => $this->autoEvalCal,
                    'eval_gen' => $this->evalGen,
                    'eval_asig' => $this->evalAsig,
                    'eval_cal' => $this->evalCal,
                ]);

            // ? Eventos especiales

            for ($i = 1; $i <= 6; $i++) {

                switch ($i) {
                    case '1':
                        if ($this->quinquenioEntrega == true) {
                            Colaborador_evento::where('colaborador_no_colaborador', $this->colaborador->no_colaborador)
                                ->where('eventos_especiales_id', $i)
                                ->update([
                                    'entrega' => '1'
                                ]);
                        } else {
                            Colaborador_evento::where('colaborador_no_colaborador', $this->colaborador->no_colaborador)
                                ->where('eventos_especiales_id', $i)
                                ->update([
                                    'entrega' => '0'
                                ]);
                        }
                        break;
                    case '2':
                        if ($this->ddmEntrega == true) {
                            Colaborador_evento::where('colaborador_no_colaborador', $this->colaborador->no_colaborador)
                                ->where('eventos_especiales_id', $i)
                                ->update([
                                    'entrega' => '1'
                                ]);
                        } else {
                            Colaborador_evento::where('colaborador_no_colaborador', $this->colaborador->no_colaborador)
                                ->where('eventos_especiales_id', $i)
                                ->update([
                                    'entrega' => '0'
                                ]);
                        }
                        break;
                    case '3':
                        if ($this->ddpEntrega == true) {
                            Colaborador_evento::where('colaborador_no_colaborador', $this->colaborador->no_colaborador)
                                ->where('eventos_especiales_id', $i)
                                ->update([
                                    'entrega' => '1'
                                ]);
                        } else {
                            Colaborador_evento::where('colaborador_no_colaborador', $this->colaborador->no_colaborador)
                                ->where('eventos_especiales_id', $i)
                                ->update([
                                    'entrega' => '0'
                                ]);
                        }
                        break;
                    case '4':
                        if ($this->ueEntrega == true) {
                            Colaborador_evento::where('colaborador_no_colaborador', $this->colaborador->no_colaborador)
                                ->where('eventos_especiales_id', $i)
                                ->update([
                                    'entrega' => '1'
                                ]);
                        } else {
                            Colaborador_evento::where('colaborador_no_colaborador', $this->colaborador->no_colaborador)
                                ->where('eventos_especiales_id', $i)
                                ->update([
                                    'entrega' => '0'
                                ]);
                        }
                        break;
                    case '5':
                        if ($this->r60Entrega == true) {
                            Colaborador_evento::where('colaborador_no_colaborador', $this->colaborador->no_colaborador)
                                ->where('eventos_especiales_id', $i)
                                ->update([
                                    'entrega' => '1'
                                ]);
                        } else {
                            Colaborador_evento::where('colaborador_no_colaborador', $this->colaborador->no_colaborador)
                                ->where('eventos_especiales_id', $i)
                                ->update([
                                    'entrega' => '0'
                                ]);
                        }
                        break;
                    case '6':
                        if ($this->bffEntrega == true) {
                            Colaborador_evento::where('colaborador_no_colaborador', $this->colaborador->no_colaborador)
                                ->where('eventos_especiales_id', $i)
                                ->update([
                                    'entrega' => '1'
                                ]);
                        } else {
                            Colaborador_evento::where('colaborador_no_colaborador', $this->colaborador->no_colaborador)
                                ->where('eventos_especiales_id', $i)
                                ->update([
                                    'entrega' => '0'
                                ]);
                        }
                        break;
                }
            }

            // ? Update tabla Hijos

            if ($this->paternidad == 0) {
                Hijos::where('colaborador_no_colaborador', $this->no_colaborador)->delete();
            } else {
                Hijos::where('colaborador_no_colaborador', $this->no_colaborador)->delete();

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
            }

            // ? Insert tabla contactos_emergencia

            Contactos_emergencia::where('colaborador_no_colaborador', $this->no_colaborador)->delete();

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
            $this->flash('success', 'Se actualizo correctamente la informacion', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);

            return redirect()->to('/edit/' . $this->colaborador->no_colaborador);
        } catch (Exception $ex) {
            
            $this->alert('error', 'Error al actualizar', [
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
