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
use Illuminate\Support\Facades\Storage;

class EdicionColaborador extends Component
{
    use WithFileUploads;

    public $no_colaborador, $nombre, $ap_paterno, $ap_materno, $genero, $fecha_nacimiento, $estado_civil,
        $paternidad, $curp, $rfc, $no_seguro_social, $domicilio, $municipio, $estado, $codigo_postal, $tipo_colaborador, $turno,
        $correo, $ruta_transporte, $puesto, $area, $jefe_directo, $tel_fijo, $tel_movil, $tel_recados,
        $extension, $clave_radio, $matriculacion, $tipo_usuario, $password, $fecha_ingreso = '';

    public $foto;

    public $edad_hijo1, $edad_hijo2, $edad_hijo3, $edad_hijo4, $edad_hijo5, $edad_hijo6;
    public $escolaridad_hijo1, $escolaridad_hijo2, $escolaridad_hijo3, $escolaridad_hijo4, $escolaridad_hijo5, $escolaridad_hijo6;

    public $nombre_contacto1, $nombre_contacto2, $nombre_contacto3, $nombre_contacto4;
    public $parentesco_contacto1, $parentesco_contacto2, $parentesco_contacto3, $parentesco_contacto4;
    public $telefono_contacto1, $telefono_contacto2, $telefono_contacto3, $telefono_contacto4;
    public $domicilio_contacto1, $domicilio_contacto2, $domicilio_contacto3, $domicilio_contacto4;



    public $colaborador;

    public function mount($no_colaborador)
    {

        $colaboradores = Colaborador::all();
        $this->colaborador = $colaboradores->find($no_colaborador);

        $this->tipo_colaborador = $this->colaborador->tipo_colaborador_id;
        $this->nombre = $this->colaborador->nombre;
        $this->ap_paterno = $this->colaborador->ap_paterno;
        $this->ap_materno = $this->colaborador->ap_materno;
        $this->genero = $this->colaborador->genero_id;
        $this->fecha_nacimiento = $this->colaborador->fecha_nacimiento;
        $this->estado_civil = $this->colaborador->estado_civil_id;
        $this->no_seguro_social = $this->colaborador->no_seguro_social;
        $this->curp = $this->colaborador->curp;
        $this->rfc = $this->colaborador->rfc;
        $this->paternidad = $this->colaborador->paternidad_id;
        $this->domicilio = $this->colaborador->domicilio;
        $this->municipio = $this->colaborador->municipio;
        $this->estado = $this->colaborador->estado;
        $this->codigo_postal = $this->colaborador->codigo_postal;
        $this->turno = $this->colaborador->turno_id;
        $this->correo = $this->colaborador->correo;
        $this->ruta_transporte = $this->colaborador->ruta_transporte_id;
        $this->puesto = $this->colaborador->puesto_id;
        $this->area = $this->colaborador->area_id;
        $this->jefe_directo = $this->colaborador->jefe_directo;
        $this->tel_fijo = $this->colaborador->tel_fijo;
        $this->tel_movil = $this->colaborador->tel_movil;
        $this->tel_recados = $this->colaborador->tel_recados;
        $this->extension = $this->colaborador->extension_id;
        $this->clave_radio = $this->colaborador->clave_radio_id;
        $this->matriculacion = $this->colaborador->matriculacion;
        $this->tipo_usuario = $this->colaborador->tipo_usuario_id;
        $this->password = $this->colaborador->password;
        $this->fecha_ingreso = $this->colaborador->fecha_ingreso;

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

    public function downloadImage()
    {

        return Storage::disk('public')->download($this->colaborador->foto);
    }
}
