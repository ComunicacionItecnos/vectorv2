<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Colaborador;
use Livewire\WithPagination;
use App\Models\Uniformes_talla;
use App\Models\Uniformes_prenda;
use App\Models\Uniformes_paquete;
use Illuminate\Support\Facades\DB;
use App\Models\Colaborador_paquete_uniforme;

use function PHPUnit\Framework\isEmpty;

class RegistroUniformes extends Component
{
    use WithPagination;

    /* protegidos */
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage',
    ];

    /* Variables */
    public $search, $perPage = '5';

    public $colaborador;
    public $colaboradorBusca;

    public $paquetes, $prendas, $tallas;

    public $banderaPrueba = false;
    public $totalSteps = 0;
    public $tope = 0;
    public $currentStep = 0;
    public $paqueteId = 2;
    public $nombrePaquete;
    public $nombrePrenda;
    public $playera60;
    public $genero_id;
    

    public $nombreCompleto;
    public $area;
    public $tipo_usuario;
    public $genero;
    public $foto;

    public $unidadNegocioinput;
    public $lineasinput;
    public $sublineasinput;
    public $calibresinput;
    public $operacioneinputs;
    public $maquinasinput;

    public $unidadNegocio;
    public $lineas;
    public $unidadNegocioLineas;
    public $unidadNegocioLineas2;
    
    public $sublineas;
    public $sublineas2;

    public $calibres;
    public $operaciones;
    public $maquinas;

    public $userLogin;

    public $mostrarNuevoRegistro = false;
    public $busquedaNuevo = false;
    public $mostrarTabla = true;
    public $mostrarBntEditar = false;

    public function mount(/* $no_colaborador */)
    {
        $this->userLogin = auth()->user()->role_id;
        if ($this->userLogin == 1 || $this->userLogin == 3) {
            $this->mostrarBntEditar = true;
        }

        /* obtener unidadNegocio,line,sublineas,calibre,operacion,maquina */
        $this->unidadNegocio = DB::table('unidaD_de_negocio')->get();
        
        $this->lineas = DB::table('lineas')->get();
        $this->unidadNegocioLineas = [
            $this->unidadNegocio[0]->nombre_unidadNegocio.' '.$this->lineas[0]->nombre_linea.' (Rifle)',
            $this->unidadNegocio[1]->nombre_unidadNegocio.' '.$this->lineas[0]->nombre_linea.' (Pistola)',
            $this->unidadNegocio[2]->nombre_unidadNegocio.' '.$this->lineas[0]->nombre_linea.' (Comunes/Misc)',
            $this->unidadNegocio[2]->nombre_unidadNegocio.' '.$this->lineas[1]->nombre_linea,
            $this->unidadNegocio[2]->nombre_unidadNegocio.' '.$this->lineas[2]->nombre_linea,
            $this->unidadNegocio[3]->nombre_unidadNegocio.' '.$this->lineas[3]->nombre_linea,
            $this->unidadNegocio[3]->nombre_unidadNegocio.' '.$this->lineas[4]->nombre_linea,
            $this->unidadNegocio[3]->nombre_unidadNegocio.' '.$this->lineas[5]->nombre_linea,
        ];
        $this->unidadNegocioLineas2 = $this->unidadNegocioLineas;
        $this->sublineas = $this->sublineas2;
        /* $this->sublineas2 =  DB::table('sublineas')->get(); */
        /* $this->colaborador = Colaborador::find($no_colaborador);
        $this->genero_id = $this->colaborador->genero_id;
        $this->paquetes = DB::table('vu_paquete_prenda')->where('paquete_id', $this->paqueteId)->get();
        $this->totalSteps = count($this->paquetes) - 1;
        $this->nombrePaquete = $this->paquetes[0]->nombre_paquete;
        $this->prendas = Uniformes_prenda::find(1);
        $this->checkPaquete();
        $this->tallaMethod(); */
    }

    public function render()
    {
        $this->sublineas2 =  DB::table('sublineas')->get();
        return view('livewire.registro-uniformes', [
            'colaborador_uniforme_paquete' => DB::table('vu_colaborador_paquete')->where('no_colaborador', 'LIKE', "%{$this->search}%")
                ->orWhere("nombre_desc", "LIKE", "%{$this->search}%")
                ->orWhere("nombre_paquete", "LIKE", "%{$this->search}%")
                ->orderBy('id', 'DESC')
                ->paginate($this->perPage)
        ,/* 'sublineas'=>$this->sublineas =  DB::table('sublineas')->get() */]);
    }

    public function checkPaquete()
    {
        if ($this->paqueteId == 5 || $this->paqueteId == 6) {
            $this->totalSteps = $this->totalSteps - 1;
        }
    }

    public function tallaMethod()
    {
        if ($this->paqueteId == 1) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 15)->get();
            }
        }
        if ($this->paqueteId == 2) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 13)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 2)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 3) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 8)->get();
            }
        }
        if ($this->paqueteId == 3) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 14)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 16)->get();
            }
        }
        if ($this->paqueteId == 4) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 13)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 17)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 11)->get();
            }
            if ($this->currentStep == 3) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 21)->get();
            }
            if ($this->currentStep == 4) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 19)->get();
            }
            if ($this->currentStep == 5) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 6)->get();
            }
            if ($this->currentStep == 6) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 7)->get();
            }
            if ($this->currentStep == 7) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 8) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 20)->get();
            }
            if ($this->currentStep == 9) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 12)->get();
            }
            if ($this->currentStep == 10) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 18)->get();
            }
        }
        if ($this->paqueteId == 5) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 14)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 16)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 11)->get();
            }
            if ($this->currentStep == 3) {
                if ($this->genero_id == 1) {
                    $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 19)->get();
                } elseif ($this->genero_id == 2) {
                    $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 21)->get();
                }
            }
            if ($this->currentStep == 4) {
                if ($this->genero_id == 1) {
                    $this->increaseStep();
                } elseif ($this->genero_id == 2) {
                    $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 6)->get();
                }
            }
            if ($this->currentStep == 5) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 6) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 7)->get();
            }
        }
        if ($this->paqueteId == 6) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 14)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 16)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 11)->get();
            }
            if ($this->currentStep == 3) {
                if ($this->genero_id == 1) {
                    $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 19)->get();
                } elseif ($this->genero_id == 2) {
                    $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 21)->get();
                }
            }
            if ($this->currentStep == 4) {
                if ($this->genero_id == 1) {
                    $this->increaseStep();
                } elseif ($this->genero_id == 2) {
                    $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 6)->get();
                }
            }
            if ($this->currentStep == 5) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 20)->get();
            }
            if ($this->currentStep == 6) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 7) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 7)->get();
            }
        }
        if ($this->paqueteId == 7) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 14)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 9)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 11)->get();
            }
            if ($this->currentStep == 3) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 4) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 19)->get();
            }
            if ($this->currentStep == 5) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 7)->get();
            }
        }
        if ($this->paqueteId == 8) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 15)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 10)->get();
            }
        }
        if ($this->paqueteId == 9) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 14)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 9)->get();
            }
        }
        if ($this->paqueteId == 10) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 14)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 9)->get();
            }
            if ($this->currentStep == 3) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 16)->get();
            }
        }
        if ($this->paqueteId == 11) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 14)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 16)->get();
            }
        }
        if ($this->paqueteId == 12) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 14)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 10)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 16)->get();
            }
            if ($this->currentStep == 3) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 15)->get();
            }
            if ($this->currentStep == 4) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 5) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 7)->get();
            }
        }
        if ($this->paqueteId == 13) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 14)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 2)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 8)->get();
            }
        }
        if ($this->paqueteId == 14) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 14)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 5)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 9)->get();
            }
        }
        if ($this->paqueteId == 15) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 14)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 9)->get();
            }
        }
    }

    public function increaseStep()
    {
        /* $this->resetErrorBag(); */
        /* $this->validateData(); */

        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
        $this->tallaMethod();
    }

    public function decreaseStep()
    {
        /* $this->resetErrorBag(); */

        $this->currentStep--;
        if ($this->currentStep < 0) {
            $this->currentStep = 0;
        }
        $this->tallaMethod();
    }

    public function doubleDecreaseStep()
    {
        /* $this->resetErrorBag(); */

        $this->currentStep--;
        $this->currentStep--;
        if ($this->currentStep < 0) {
            $this->currentStep = 0;
        }
        $this->tallaMethod();
    }

    public function tallasPaquetes()
    {
    }

    public function showRegistro()
    {
        $this->mostrarNuevoRegistro = true;
        $this->mostrarTabla = false;

        $this->busquedaNuevo = true;
        $this->colaborador = 'ocultar';
    }

    public function showTabla()
    {
        $this->mostrarNuevoRegistro = false;
        $this->mostrarTabla = true;

        $this->resetErrorBag();
        $this->colaborador = NULL;
        $this->colaboradorBusca = NULL;
        $this->nombreCompleto = NULL;
        $this->area = NULL;
        $this->tipo_usuario = NULL;
    }

    public function buscar()
    {       
        $this->resetErrorBag();
        $this->colaborador = 'ocultar';
        $this->nombreCompleto = NULL;
        $this->area = NULL;
        $this->tipo_usuario = NULL;
        $this->genero = NULL;
        $this->foto = NULL;
        $this->unidadNegocioinput = NULL;
        $this->lineasinput = NULL;
        $this->sublineasinput = NULL;
        $this->calibresinput = NULL;
        $this->operacioneinputs = NULL;
        $this->maquinasinput = NULL;
        $this->unidadNegocio = NULL;
        $this->lineas = NULL;
        $this->sublineas = NULL;
        $this->calibres = NULL;
        $this->operaciones = NULL;
        $this->maquinas = NULL;

        $this->validate(
            ['colaboradorBusca' => 'required|digits_between:5,6'],
            [ 'colaboradorBusca.required' => 'El Número de colaborador no puede estar vacío',
              'colaboradorBusca.digits_between' => 'Solo puede tener 5 dígitos como mínimo y 6 como máximo']
        );

        $this->colaborador = DB::table("infocolaborador")->where("no_colaborador", "LIKE", $this->colaboradorBusca)->get();
        /* dd($this->colaborador); */
        if (count($this->colaborador) == 0) {
            $this->colaborador = 'error';
            $this->nombreCompleto = NULL;
            $this->area = NULL;
            $this->tipo_usuario = NULL;
            $this->genero = NULL;
            $this->foto = NULL;
            $this->unidadNegocioinput = NULL;
            $this->lineasinput = NULL;
            $this->sublineasinput = NULL;
            $this->calibresinput = NULL;
            $this->operacionesinput = NULL;
            $this->maquinasinput = NULL;
        } else {
            $this->nombreCompleto = $this->colaborador[0]->nombre_completo;
            $this->area = $this->colaborador[0]->area;
            $this->tipo_usuario = $this->colaborador[0]->nombre_tipo;
            $this->genero = $this->colaborador[0]->nombre_genero;
            $this->foto = $this->colaborador[0]->foto;
        }
    }

    public function ver($id)
    {
        $this->mostrarNuevoRegistro = true;
        $this->mostrarTabla = false;
        $this->busquedaNuevo = false;
    }

    public function editar($id)
    {
        $this->mostrarNuevoRegistro = true;
        $this->mostrarTabla = false;
        $this->busquedaNuevo = false;
    }

    public function updatedunidadNegocioinput(){
       
        
        if( $this->unidadNegocioinput == '') {
            $unidadNegocioinput2= NULL;
            $this->unidadNegocioLineas = $this->unidadNegocioLineas2;
            $this->sublineasinput= '';
            $this->sublineas = $this->sublineas2;
        }else{
            $this->sublineas = [];
            if ($this->unidadNegocioinput == '1 Fuego Central (Rifle)') {
                $unidadNegocioinput2 = 1;
                $this->lineas = 1;
            }elseif($this->unidadNegocioinput == '2 Fuego Central (Pistola)') {
                $unidadNegocioinput2 = 2;
                $this->lineas = 1;
            }elseif($this->unidadNegocioinput == '3 Fuego Central (Comunes/Misc)') {
                $unidadNegocioinput2 = 3;
                $this->lineas = 1;
            }elseif($this->unidadNegocioinput == '3 Escopeta') {
                $unidadNegocioinput2 = 3;
                $this->lineas = 2;
            }elseif($this->unidadNegocioinput == '3 Torre de Plomo') {
                $unidadNegocioinput2 = 3;
                $this->lineas = 3;
            }elseif($this->unidadNegocioinput == '4 Fuego Anular') {
                $unidadNegocioinput2 = 4;
                $this->lineas = 4;
            }elseif($this->unidadNegocioinput == '4 Fuego Anular') {
                $unidadNegocioinput2 = 4;
                $this->lineas = 4;
            }elseif($this->unidadNegocioinput == '4 Mezclas Químicas') {
                $unidadNegocioinput2 = 4;
                $this->lineas = 5;
            }elseif($this->unidadNegocioinput == '4 Componentes/Casa 10') {
                $unidadNegocioinput2 = 4;
                $this->lineas = 6;
            }

            $buscasublinea = DB::select('SELECT DISTINCT id_unidadnegocio,id_linea,id_sublinea FROM `area_trabajo_operativo` WHERE id_unidadnegocio = '.$unidadNegocioinput2.' && id_linea ='.$this->lineas);

            foreach ($buscasublinea as $bs) {
                $this->sublineas[] = DB::table('sublineas')->where('id','=',$bs->id_sublinea)->get();
            }

        }

    }

    public function updatedsublineasinput(){
        
        if ( $this->sublineasinput == '' ) {
            $this->unidadNegocioLineas = $this->unidadNegocioLineas2;
            $this->unidadNegocioinput = '';
            $this->sublineas = $this->sublineas2;
            /* dd($this->sublineas,$this->unidadNegocioLineas); */
        }else{
            $this->unidadNegocioLineas = [];

            $buscarUN = DB::select('SELECT DISTINCT id_unidadnegocio,id_linea,id_sublinea,id_calibre FROM `area_trabajo_operativo` WHERE id_sublinea = '.$this->sublineasinput);
        
            foreach ($buscarUN as $bun) {
                $this->unidadNegocio = DB::table('unidad_de_negocio')->distinct('id,nombre_unidadNegocio')->where('id', '=', $bun->id_unidadnegocio)->get();
                $this->lineas = DB::table('lineas')->distinct('id,nombre_lineas')->where('id','=',$bun->id_linea)->get();

                $this->unidadNegocioLineas[] = $this->unidadNegocio[0]->nombre_unidadNegocio.' '.$this->lineas[0]->nombre_linea;
            }
            
            $this->unidadNegocioLineas = array_unique($this->unidadNegocioLineas);

            foreach ($this->unidadNegocioLineas as $unl) {
                if ($unl == '1 Fuego Central') {
                    $this->unidadNegocioLineas[0] = '1 Fuego Central (Rifle)';
                } elseif($unl == '2 Fuego Central') {
                    $this->unidadNegocioLineas[0] = '2 Fuego Central (Pistola)';
                }elseif($unl == '3 Fuego Central'){
                    $this->unidadNegocioLineas[] = '3 Fuego Central (Comunes/Misc)';
                    $basura = array_shift($this->unidadNegocioLineas);
                }
            }
                     
        }
   
    }

}
