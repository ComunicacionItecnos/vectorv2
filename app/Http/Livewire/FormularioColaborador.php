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
use Exception;

class FormularioColaborador extends Component
{
    use WithFileUploads;

    public $no_colaborador, $nombre, $ap_paterno, $ap_materno, $genero, $fecha_nacimiento, $estado_civil,
        $paternidad, $domicilio, $municipio, $estado, $codigo_postal, $tipo_colaborador, $turno,
        $correo, $ruta_transporte, $puesto, $area, $jefe_directo, $tel_fijo, $tel_movil, $tel_recados,
        $extension, $clave_radio, $matriculacion, $tipo_usuario, $password, $fecha_ingreso, $foto;




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


        return view('livewire.formulario-colaborador', compact('clavesRadio', 'areas', 'extensiones', 'rutas', 'puestos', 'supervisores', 'turnos', 'tiposColaborador', 'tiposUsuario', 'generos', 'estadosCivil', 'rango_factor'));
    }

    public function store()
    {

        if ($this->tipo_colaborador == 1 | $this->tipo_colaborador == 3) {
            $r_f = 1;
        } else {
            $r_f = 2;
        }
        if (isset($this->jefe_directo)) {
            $j_d = $this->jefe_directo;
        } else {
            $j_d = '';
        }

        try {
            $this->validate([
                'foto' => 'image|max:1024', // 1MB Max
            ]);

            $foto_ruta = $this->foto->store('images', 'public');

            Colaborador::create([

                'no_colaborador' => $this->no_colaborador,
                'nombre' => $this->nombre,
                'ap_paterno' => $this->ap_paterno,
                'ap_materno' => $this->ap_materno,
                'fecha_nacimiento' => $this->fecha_nacimiento,
                'genero_id' => $this->genero,
                'estado_civil_id' => $this->estado_civil,
                'domicilio' => $this->domicilio,
                'municipio' => $this->municipio,
                'estado' => $this->estado,
                'codigo_postal' => $this->codigo_postal,
                'paternidad_id' => $this->paternidad,
                'turno_id' => $this->turno,
                'ruta_transporte_id' => $this->ruta_transporte,
                'puesto_id' => $this->puesto,
                'area_id' => $this->area,
                'correo' => $this->correo,
                'tel_fijo' => $this->tel_fijo,
                'tel_movil' => $this->tel_movil,
                'tel_recados' => $this->tel_recados,
                'extension_id' => $this->extension,
                'clave_radio_id' => $this->clave_radio,
                'jefe_directo' => $j_d,
                'tipo_colaborador_id' => $this->tipo_colaborador,
                'fecha_ingreso' => $this->fecha_ingreso,
                'password' => $this->password,
                'matriculacion' => $this->matriculacion,
                'tipo_usuario_id' => $this->tipo_usuario,
                'tipo_usuario_id' => $this->tipo_usuario,
                'rango_factor_id' => $r_f,
                'rims' => '0',
                'autoeval_gen' => '0',
                'autoeval_asig' => '0',
                'autoeval_cal' => '0',
                'eval_gen' => '0',
                'eval_asig' => '0',
                'eval_cal' => '0',
                'estado_colaborador' => '1',
                'foto' => $foto_ruta,
            ]);

            session()->flash('success', 'El colaborador ' . $this->no_colaborador . ' ha sido registrado con éxito');

        } catch (Exception) {
            session()->flash('error', 'Ya existe el colaborador ' . $this->no_colaborador);
        }
    }
}
