<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Uniformes_talla;
use App\Exports\UniformesExport;
use App\Models\Uniformes_paquete;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Uniformes_paquete_prenda;


class RegistroUniformes extends Component
{
    use WithPagination;

    /* protegidos */
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage',
    ];

    protected $listeners = [
        'registro',
        'cancelled',
        'actulizarTallas',
        'cancelled2'
    ];

    /* Variables */
    public $search, $perPage = '5';

    public $colaborador;
    public $colaboradorShow;
    public $colaboradorBusca;
    
    public $paquetes, $prendas, $tallas = [];
    public $tallasValidacion = false;

    public $paqueteId = NULL;
    public $genero_id;
    
    public $nombreCompleto;
    public $area;
    public $tipo_usuario;
    public $genero;
    public $foto;

    public $unidadNegocioinput;
    public $unidadNegocioinput2;
    public $lineasinput;
    public $sublineasinput;
    public $calibresinput;
    public $operacionesinput;

    public $unidadNegocio;
    public $lineas;
    public $unidadNegocioLineas;
    public $unidadNegocioLineas2;    
    public $sublineas;
    public $calibres;
    public $operaciones;
  
    public $seleccionPersonal = false;
    public $desabilitarSelect = false;
    public $desabilitarSelect2 = false;
    public $seleccionPersonalInput;
    public $paqueteEleccion;

    public $seleccionPaquete;
    public $seleccionPaqueteInput;

    public $userLogin;

    public $mostrarNuevoRegistro = false;
    public $busquedaNuevo = false;
    public $mostrarTabla = true;
    public $mostrarBntEditar = false;
    public $verRegistro = false;

    public $areaExtras;

    public $prendas1 = 'Bota Conductiva';
    public $prendas2 = 'Bota Antivibracion';
    public $prendas3 = 'Bota Dielectrica';
    public $prendas4 = 'Bota Metatarzal';
    public $prendas5 = 'Bota Para Soldador';
    public $prendas6 = 'Bota Para Pailero';
    public $prendas7 = 'Brasiere Blanco';
    public $prendas8 = 'Calcetas 100% Algodón';
    public $prendas9 = 'Camisa de Mezclilla';
    public $prendas10 = 'Camisola Mezclilla';
    public $prendas11 = 'Camisola Poliester';
    public $prendas12 = 'Cofia 100% Algodón';
    public $prendas13 = 'Mandil 100 % Algodón';
    public $prendas14 = 'Pantalon 100 % Algodón';
    public $prendas15 = 'Pantalon de Mezclilla';
    public $prendas16 = 'Pantalon de Poliester';
    public $prendas17 = 'Playera Tipo Polo';
    public $prendas18 = 'Playera Tipo Polo Blanca';
    public $prendas19 = 'Sudadera';
    public $prendas20 = 'Truza 100% Algodón';
    public $prendas21 = 'Zapato Conductivo';
    public $prendas22 = 'Pantaleta 100% Algodón';

    public $Selecionprendas1 = NULL;
    public $Selecionprendas2 = NULL;
    public $Selecionprendas3 = NULL;
    public $Selecionprendas4 = NULL;
    public $Selecionprendas5 = NULL;
    public $Selecionprendas6 = NULL;
    public $Selecionprendas7 = NULL;
    public $Selecionprendas8 = NULL;
    public $Selecionprendas9 = NULL;
    public $Selecionprendas10 = NULL;
    public $Selecionprendas11 = NULL;
    public $Selecionprendas12 = NULL;
    public $Selecionprendas13 = NULL;
    public $Selecionprendas14 = NULL;
    public $Selecionprendas15 = NULL;
    public $Selecionprendas16 = NULL;
    public $Selecionprendas17 = NULL;
    public $Selecionprendas18 = NULL;
    public $Selecionprendas19 = NULL;
    public $Selecionprendas20 = NULL;
    public $Selecionprendas21 = NULL;
    public $Selecionprendas22 = NULL;

    public $modalAbrir = false;

    public $uniformesShow = [];
    public $areaTrabajoUnidadShow = [];
    public $areaTrabajoExtraShow = NULL;
    
    public $sublineasinput2;
    public $calibresinput2;
    public $operacionesinput2;
    public $sublineas2;
    public $calibres2;
    public $operaciones2;
    public $seleccionPaqueteInput2;

    public $EditarPaquete;
    public $id_unidadNegocio;
    public $nombre_linea;
    public $nombre_sublinea;
    public $nombre_calibre;
    public $nombre_operacion;

    public $exportarUniformes;
    public $exportarModal =false;
    public $lista;

    public function mount()
    {
        $this->userLogin = auth()->user()->role_id;
        if ($this->userLogin == 1 || $this->userLogin == 3) {
            $this->mostrarBntEditar = true;
        }
    }

    public function render()
    {
        $this->todosSelect();

        return view('livewire.registro-uniformes', [
            'colaborador_uniforme_paquete' => DB::table('vu_colaborador_paquete')->orwhere('no_colaborador', 'LIKE', "%{$this->search}%")
                ->orWhere("nombre_desc", "LIKE", "%{$this->search}%")
                ->orWhere("nombre_paquete", "LIKE", "%{$this->search}%")
                ->groupBy('no_colaborador')
                ->orderBy('id', 'DESC')
                ->paginate($this->perPage)
        ,]);
    }

    public function uniformesPaquetePrenda()
    {
        return Uniformes_paquete_prenda::where('uniformes_paquete_id',$this->paqueteId)->get();
    }

    public function tallaMethod()
    {
        $this->tallas = [];
        $tallasPaquetes = [];

        $this->Selecionprendas1 = NULL;
        $this->Selecionprendas2 = NULL;
        $this->Selecionprendas3 = NULL;
        $this->Selecionprendas4 = NULL;
        $this->Selecionprendas5 = NULL;
        $this->Selecionprendas6 = NULL;
        $this->Selecionprendas7 = NULL;
        $this->Selecionprendas8 = NULL;
        $this->Selecionprendas9 = NULL;
        $this->Selecionprendas10 = NULL;
        $this->Selecionprendas11 = NULL;
        $this->Selecionprendas12 = NULL;
        $this->Selecionprendas13 = NULL;
        $this->Selecionprendas14 = NULL;
        $this->Selecionprendas15 = NULL;
        $this->Selecionprendas16 = NULL;
        $this->Selecionprendas17 = NULL;
        $this->Selecionprendas18 = NULL;
        $this->Selecionprendas19 = NULL;
        $this->Selecionprendas20 = NULL;
        $this->Selecionprendas21 = NULL;
        $this->Selecionprendas22 = NULL;

        /*  Paquete 1 TORRE DE PLOMO */
        if ($this->paqueteId == 2) {
            $tallasPaquetes = $this->uniformesPaquetePrenda();
            
            
            foreach ($tallasPaquetes as $tP) {
                $this->tallas[] = Uniformes_talla::where('uniformes_prenda_id', $tP->uniformes_prenda_id)->get();
            }
          
        }
        /* Paquete 2 Produccion FC,FA y Almacen */
        if ($this->paqueteId == 3) {
            $tallasPaquetes = $this->uniformesPaquetePrenda();
            
            foreach ($tallasPaquetes as $tP) {
                $this->tallas[] = Uniformes_talla::where('uniformes_prenda_id', $tP->uniformes_prenda_id)->get();
            }
        }
        /* Paquete 3 BLANCO */
        if ($this->paqueteId == 4) {
            $tallasPaquetes = $this->uniformesPaquetePrenda();

            foreach ($tallasPaquetes as $tP) {
                $this->tallas[] = Uniformes_talla::where('uniformes_prenda_id', $tP->uniformes_prenda_id)->get();
            }
        }
        /* Paquete 4 Carga FC */
        if ($this->paqueteId == 5) {
            $tallasPaquetes = $this->uniformesPaquetePrenda();
            
            foreach ($tallasPaquetes as $tP) {
                $this->tallas[] = Uniformes_talla::where('uniformes_prenda_id', $tP->uniformes_prenda_id)->get();
            }
        }
        /* Paquete 5 Carga FA (Linea 22) */
        if ($this->paqueteId == 6) {
            $tallasPaquetes = $this->uniformesPaquetePrenda();
            
            foreach ($tallasPaquetes as $tP) {
                $this->tallas[] = Uniformes_talla::where('uniformes_prenda_id', $tP->uniformes_prenda_id)->get();
            }
            
        }
        /* Paquete 6 MANETENIMIENTO GENERAL */
        if ($this->paqueteId == 7) {
            $tallasPaquetes = $this->uniformesPaquetePrenda();
            
            foreach ($tallasPaquetes as $tP) {
                $this->tallas[] = Uniformes_talla::where('uniformes_prenda_id', $tP->uniformes_prenda_id)->get();
            }
        }
        /* Paquete 7 LAVADO(S) */
        if ($this->paqueteId == 8) {
            $tallasPaquetes = $this->uniformesPaquetePrenda();
            
            foreach ($tallasPaquetes as $tP) {
                $this->tallas[] = Uniformes_talla::where('uniformes_prenda_id', $tP->uniformes_prenda_id)->get();
            }
        }
        /* Paquete 8 HORNO(S) */
        if ($this->paqueteId == 9) {
            $tallasPaquetes = $this->uniformesPaquetePrenda();
            
            foreach ($tallasPaquetes as $tP) {
                $this->tallas[] = Uniformes_talla::where('uniformes_prenda_id', $tP->uniformes_prenda_id)->get();
            }
        }
        /* Paquete 9 Herramientas Especial */
        if ($this->paqueteId == 10) {
            $tallasPaquetes = $this->uniformesPaquetePrenda();
            
            foreach ($tallasPaquetes as $tP) {
                $this->tallas[] = Uniformes_talla::where('uniformes_prenda_id', $tP->uniformes_prenda_id)->get();
            }
        }
        /* Paquete 10 CONTROL AMBIENTAL */
        if ($this->paqueteId == 11) {
            $tallasPaquetes = $this->uniformesPaquetePrenda();
            
            foreach ($tallasPaquetes as $tP) {
                $this->tallas[] = Uniformes_talla::where('uniformes_prenda_id', $tP->uniformes_prenda_id)->get();
            }
        }
        /* Paquete 11 COMPONENTES (DETONADORES) */
        if ($this->paqueteId == 12) {
            $tallasPaquetes = $this->uniformesPaquetePrenda();
            
            foreach ($tallasPaquetes as $tP) {
                $this->tallas[] = Uniformes_talla::where('uniformes_prenda_id', $tP->uniformes_prenda_id)->get();
            }
        }
        /* Paquete 12 TROQUELADOS */
        if ($this->paqueteId == 13) {
            $tallasPaquetes = $this->uniformesPaquetePrenda();
            
            foreach ($tallasPaquetes as $tP) {
                $this->tallas[] = Uniformes_talla::where('uniformes_prenda_id', $tP->uniformes_prenda_id)->get();
            }
        }
        /* Paquete 13 PAILERIA */
        if ($this->paqueteId == 14) {
            $tallasPaquetes = $this->uniformesPaquetePrenda();
            
            foreach ($tallasPaquetes as $tP) {
                $this->tallas[] = Uniformes_talla::where('uniformes_prenda_id', $tP->uniformes_prenda_id)->get();
            }
        }
        /* Paqute 14 ENCERADOS */
        if ($this->paqueteId == 15) {
            $tallasPaquetes = $this->uniformesPaquetePrenda();
            
            foreach ($tallasPaquetes as $tP) {
                $this->tallas[] = Uniformes_talla::where('uniformes_prenda_id', $tP->uniformes_prenda_id)->get();
            }
        }
        /* Paquete 15 SINDICATO */
        if ($this->paqueteId == 16) {
            $tallasPaquetes = $this->uniformesPaquetePrenda();
            
            foreach ($tallasPaquetes as $tP) {
                $this->tallas[] = Uniformes_talla::where('uniformes_prenda_id', $tP->uniformes_prenda_id)->get();
            }
        }

        return $this->tallas;
    }

    public function showRegistro()
    {
        $this->mostrarNuevoRegistro = true;
        $this->mostrarTabla = false;

        $this->busquedaNuevo = true;
        $this->colaborador = 'ocultar';
        $this->areaTrabajoShow = NULL;
    }

    public function showTabla()
    {
        $this->mostrarNuevoRegistro = false;
        $this->mostrarTabla = true;

        $this->colaborador = NULL;
        $this->colaboradorBusca = NULL;
        $this->nombreCompleto = NULL;
        $this->area = NULL;
        $this->tipo_usuario = NULL;
        $this->areaTrabajoUnidadShow = [];
        $this->areaTrabajoExtraShow = NULL;
        $this->uniformesShow = [];
        $this->colaborador = NULL;
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
        $this->operacionesinput = NULL;
        $this->unidadNegocio = NULL;
        $this->lineas = NULL;
        $this->sublineas = NULL;
        $this->calibres = NULL;
        $this->operaciones = NULL;
        $this->seleccionPersonal = false;
        $this->seleccionPersonalInput = NULL;
        $this->seleccionPaqueteInput = NULL;
        $this->desabilitarSelect = false;
        $this->desabilitarSelect2 = false;
        $this->tallas = [];
        $this->paqueteId = NULL;

        $this->Selecionprendas1 = NULL;
        $this->Selecionprendas2 = NULL;
        $this->Selecionprendas3 = NULL;
        $this->Selecionprendas4 = NULL;
        $this->Selecionprendas5 = NULL;
        $this->Selecionprendas6 = NULL;
        $this->Selecionprendas7 = NULL;
        $this->Selecionprendas8 = NULL;
        $this->Selecionprendas9 = NULL;
        $this->Selecionprendas10 = NULL;
        $this->Selecionprendas11 = NULL;
        $this->Selecionprendas12 = NULL;
        $this->Selecionprendas13 = NULL;
        $this->Selecionprendas14 = NULL;
        $this->Selecionprendas15 = NULL;
        $this->Selecionprendas16 = NULL;
        $this->Selecionprendas17 = NULL;
        $this->Selecionprendas18 = NULL;
        $this->Selecionprendas19 = NULL;
        $this->Selecionprendas20 = NULL;
        $this->Selecionprendas21 = NULL;
        $this->Selecionprendas22 = NULL;
		
        $this->validate(
            ['colaboradorBusca' => 'required|digits_between:5,6'],
            [ 'colaboradorBusca.required' => 'El Número de colaborador no puede estar vacío',
              'colaboradorBusca.digits_between' => 'Solo puede tener 5 dígitos como mínimo y 6 como máximo']
        );

        $this->colaborador = DB::table("infocolaborador")->where("no_colaborador", "LIKE", $this->colaboradorBusca)->get();
        
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
            $this->seleccionPersonal = false;
            $this->seleccionPersonalInput = NULL;
            $this->seleccionPaqueteInput = NULL;
            $this->desabilitarSelect = false;
            $this->desabilitarSelect2 = false;
            $this->tallas = [];
            $this->paqueteId = NULL;

            $this->Selecionprendas1 = NULL;
            $this->Selecionprendas2 = NULL;
            $this->Selecionprendas3 = NULL;
            $this->Selecionprendas4 = NULL;
            $this->Selecionprendas5 = NULL;
            $this->Selecionprendas6 = NULL;
            $this->Selecionprendas7 = NULL;
            $this->Selecionprendas8 = NULL;
            $this->Selecionprendas9 = NULL;
            $this->Selecionprendas10 = NULL;
            $this->Selecionprendas11 = NULL;
            $this->Selecionprendas12 = NULL;
            $this->Selecionprendas13 = NULL;
            $this->Selecionprendas14 = NULL;
            $this->Selecionprendas15 = NULL;
            $this->Selecionprendas16 = NULL;
            $this->Selecionprendas17 = NULL;
            $this->Selecionprendas18 = NULL;
            $this->Selecionprendas19 = NULL;
            $this->Selecionprendas20 = NULL;
            $this->Selecionprendas21 = NULL;
            $this->Selecionprendas22 = NULL;

        }else{
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
        $this->verRegistro = true;
        $this->areaTrabajoUnidadShow = [];
        $this->areaTrabajoExtraShow = NULL;

        $this->colaboradorShow = DB::table("infocolaborador")->where("no_colaborador", "LIKE", $id)->get();
        
        if (count($this->colaboradorShow) > 0) {
            
            $this->nombreCompleto = $this->colaboradorShow[0]->nombre_completo;
            $this->area = $this->colaboradorShow[0]->area;
            $this->tipo_usuario = $this->colaboradorShow[0]->nombre_tipo;
            $this->genero = $this->colaboradorShow[0]->nombre_genero;
            $this->foto = $this->colaboradorShow[0]->foto;

            $this->uniformesShow = DB::table('vu_colaborador_paquete')->where('no_colaborador',$id)->get();
            $this->paqueteId = $this->uniformesShow[0]->nombre_paquete;
            
            $this->areaTrabajoUnidadShow = DB::table('colaborador_trabajooperativo')->where('no_colaborador',$id)->get();
            
            $this->areaTrabajoExtraShow = $this->areaTrabajoUnidadShow;

            if($this->areaTrabajoUnidadShow[0]->areaExterna == NULL){
                
                unset($this->areaTrabajoUnidadShow[0]->areaExterna);
                
                $this->areaTrabajoUnidadShow = DB::select("SELECT ato.id_unidadnegocio,ls.nombre_linea,sl.nombre_sublinea,cs.nombre_calibre,os.nombre_operacion FROM `area_trabajo_operativo` ato 
                JOIN lineas ls ON ls.id = ato.id_unidadnegocio 
                JOIN sublineas sl ON sl.id = ato.id_sublinea
                JOIN calibres cs ON cs.id = ato.id_calibre
                JOIN operaciones os ON os.id = ato.id_operacion
                WHERE ato.id =".$this->areaTrabajoUnidadShow[0]->id_area_trabajo_operativo);
                
                $this->areaTrabajoExtraShow = NULL;

            }elseif($this->areaTrabajoExtraShow[0]->id_area_trabajo_operativo == NULL){

                unset($this->areaTrabajoExtraShow[0]->id_area_trabajo_operativo);
                
                $this->areaTrabajoExtraShow = $this->areaTrabajoExtraShow[0]->areaExterna;
                $this->areaTrabajoUnidadShow = [];
            }

        }else{
            $this->nombreCompleto = NULL;
            $this->area = NULL;
            $this->genero = NULL;
            $this->foto = NULL;
            $this->uniformesShow = [];
            $this->paqueteId = NULL;
            $this->areaTrabajoShow = NULL;
            $this->areaTrabajoExtraShow = NULL;
            $this->areaTrabajoUnidadShow = [];
        }
    }

    public function editar($id)
    {
        $this->colaborador = $id;
        $this->mostrarNuevoRegistro = true;
        $this->mostrarTabla = false;
        $this->busquedaNuevo = false;
        $this->verRegistro = false;

        $this->areaTrabajoUnidadShow = [];
        $this->areaTrabajoExtraShow = NULL;
        $this->EditarPaquete = NULL;
        $this->id_unidadNegocio = NULL;
        $this->nombre_linea = NULL;
        $this->nombre_sublinea = NULL;
        $this->nombre_calibre = NULL;
        $this->nombre_operacion = NULL;
        $this->paqueteEleccion = NULL;
        $this->paqueteId = NULL;

        $this->colaboradorShow = DB::table("infocolaborador")->where("no_colaborador", "LIKE", $id)->get();
        if (count($this->colaboradorShow) > 0) {

            $this->nombreCompleto = $this->colaboradorShow[0]->nombre_completo;
            $this->area = $this->colaboradorShow[0]->area;
            $this->tipo_usuario = $this->colaboradorShow[0]->nombre_tipo;
            $this->genero = $this->colaboradorShow[0]->nombre_genero;
            $this->foto = $this->colaboradorShow[0]->foto;

            $this->areaTrabajoUnidadShow = DB::table('colaborador_trabajooperativo')->where('no_colaborador',$id)->get();
            $this->areaTrabajoExtraShow = $this->areaTrabajoUnidadShow;

            $this->uniformesShow = DB::table('vu_colaborador_paquete')->where('no_colaborador',$id)->get();
            /* dd($this->uniformesShow); */
            $this->paqueteEleccion = $this->uniformesShow[0]->nombre_paquete;
            $this->paqueteId = $this->uniformesShow[0]->paquete_id;
            
            $this->tallaMethod();

            if($this->areaTrabajoUnidadShow[0]->areaExterna == NULL){
                
                unset($this->areaTrabajoUnidadShow[0]->areaExterna);
                
                $this->areaTrabajoUnidadShow = DB::select("SELECT ato.id_unidadnegocio,ls.nombre_linea,sl.nombre_sublinea,cs.nombre_calibre,os.nombre_operacion FROM `area_trabajo_operativo` ato 
                JOIN lineas ls ON ls.id = ato.id_unidadnegocio 
                JOIN sublineas sl ON sl.id = ato.id_sublinea
                JOIN calibres cs ON cs.id = ato.id_calibre
                JOIN operaciones os ON os.id = ato.id_operacion
                WHERE ato.id =".$this->areaTrabajoUnidadShow[0]->id_area_trabajo_operativo);

                $this->id_unidadNegocio = $this->areaTrabajoUnidadShow[0]->id_unidadnegocio;
                $this->nombre_linea = $this->areaTrabajoUnidadShow[0]->nombre_linea;
                $this->nombre_sublinea = $this->areaTrabajoUnidadShow[0]->nombre_sublinea;
                $this->nombre_calibre = $this->areaTrabajoUnidadShow[0]->nombre_calibre;
                $this->nombre_operacion = $this->areaTrabajoUnidadShow[0]->nombre_operacion;

                $this->areaTrabajoExtraShow = NULL;

            }elseif($this->areaTrabajoExtraShow[0]->id_area_trabajo_operativo == NULL){

                unset($this->areaTrabajoExtraShow[0]->id_area_trabajo_operativo);
                
                $this->areaTrabajoExtraShow = $this->areaTrabajoExtraShow[0]->areaExterna;
                $this->areaTrabajoUnidadShow = [];
            }


        }else{
            $this->nombreCompleto = NULL;
            $this->area = NULL;
            $this->genero = NULL;
            $this->foto = NULL;
            $this->uniformesShow = [];
            $this->paqueteId = NULL;
            $this->areaTrabajoShow = NULL;
            $this->areaTrabajoExtraShow = NULL;
            $this->areaTrabajoUnidadShow = [];
        }
    }

    public function actulizarTallas()
    {

        DB::transaction(function(){
            
            $funObtn = $this->vaciosBuscar();

            $arrayObtn2 = $funObtn[1];
            $filtrarVaciosPrendas = NULL;
            /* $actualizar = NULL; */
            $res = NULL;
            /* Editar paquete actual */
            if ($this->EditarPaquete == 1) {
                
                unset($arrayObtn2[0],$arrayObtn2[1]);
                $filtrarVaciosPrendas = array_filter($arrayObtn2);
                $filtrarVaciosPrendas = array_values($filtrarVaciosPrendas);

                if ($filtrarVaciosPrendas == []) {
                    $this->alert('success', 'No hay cambios en las tallas', [
                        'position' =>  'top-end',
                        'timer' =>  3500,
                        'toast' =>  true,
                        'text' =>  '',
                        'confirmButtonText' =>  'Ok',
                        'cancelButtonText' =>  'Cerrar',
                        'showCancelButton' =>  false,
                        'showConfirmButton' =>  true,
                    ]);
                    $this->EditarPaquete = 0;
                }else{
                    $actualizar = DB::table('colaborador_uniforme_paquete')->where('colaborador_no_colaborador','=',$this->colaborador)
                    ->where('uniformes_paquete_id','=',$this->paqueteId)->get();

                    for ($i=0; $i < count($actualizar) ; $i++) { 
                    
                        for ($i=0; $i < count($filtrarVaciosPrendas); $i++) { 
                            $res = DB::table('colaborador_uniforme_paquete')
                            ->where('colaborador_no_colaborador','=',$this->colaborador)
                            ->where('uniformes_paquete_id','=',$this->paqueteId)
                            ->where('uniformes_talla_id','=',$actualizar[$i]->uniformes_talla_id)
                            ->update(['uniformes_talla_id' => $filtrarVaciosPrendas[$i]]);
                        }
                    }

                }

                if ($res) {
                    $this->flash('success', 'Se actualizo '.$this->colaborador, [
                        'position' =>  'center',
                        'timer' =>  3500,
                        'toast' =>  true,
                        'text' =>  '',
                        'confirmButtonText' =>  'Ok',
                        'cancelButtonText' =>  'Cerrar',
                        'showCancelButton' =>  true,
                        'showConfirmButton' =>  false,
                    ]);

                    return redirect()->to('/uniformes/');
                }

            }
        });
    }

    public function cancelled2()
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

    public function triggerConfirm2()
    {
        $this->confirm('¿Deseas terminar el registro?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  'Si',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'actulizarTallas',
            'onCancelled' => 'cancelled'
        ]);
    }

    /* Filtrado por unidad de negocio y lineas*/
    public function updatedunidadNegocioinput()
    {
        if( $this->unidadNegocioinput == '') {
            $unidadNegocioinput2= NULL;
            $this->unidadNegocioLineas = $this->unidadNegocioLineas2;
            $this->sublineas;
            $this->calibres;
            $this->operaciones2 = [];
            $this->operaciones;

            $this->seleccionPersonal = false;
            $this->desabilitarSelect2 = false;
        }else{
            $this->seleccionPersonal = true;
            $this->desabilitarSelect2 = true;
            $this->reset(['sublineas']);

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
            }elseif($this->unidadNegocioinput == '4 Componentes / Casa 10') {
                $unidadNegocioinput2 = 4;
                $this->lineas = 6;
            }

            $buscasublinea = DB::select('SELECT DISTINCT id_unidadnegocio,id_linea,id_sublinea,id_calibre FROM `area_trabajo_operativo` WHERE id_unidadnegocio = '.$unidadNegocioinput2.' && id_linea ='.$this->lineas);
            
            foreach ($buscasublinea as $bs) {
                $this->sublineas[] = DB::table('sublineas')->distinct('id,nombre_sublinea')->where('id','=',$bs->id_sublinea)->get()->toArray();
            }
            
            $this->sublineas = array_unique($this->sublineas, SORT_REGULAR );
            $this->sublineas = array_values($this->sublineas);
        }

    }
    /* Filtrado por sublineas */
    public function updatedsublineasinput()
    {
        if ( $this->sublineasinput == '' ) {
            $unidadNegocioinput2= NULL;
            $this->unidadNegocioLineas = $this->unidadNegocioLineas2;
            $this->sublineas;
            $this->calibres;
            $this->operaciones2 = [];
            $buscarUN = [];
            $this->operaciones;
            $this->seleccionPersonal = false;
            $this->desabilitarSelect2 = false;
        }else{
            $this->seleccionPersonal = true;
            $this->desabilitarSelect2 = true;
            $this->reset(['calibres', 'unidadNegocioLineas','unidadNegocioLineas2']);
            $buscarUN = [];
            if($this->unidadNegocioinput != '')
            {
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
                }elseif($this->unidadNegocioinput == '4 Componentes / Casa 10') {
                    $unidadNegocioinput2 = 4;
                    $this->lineas = 6;
                }
            
                $buscarUN = DB::select('SELECT DISTINCT id_unidadnegocio,id_linea,id_sublinea,id_calibre FROM `area_trabajo_operativo` WHERE id_unidadnegocio = '.$unidadNegocioinput2.' && id_linea ='.$this->lineas. ' && id_sublinea = '.$this->sublineasinput);
            }else{ 
                $buscarUN = DB::select('SELECT DISTINCT id_unidadnegocio,id_linea,id_sublinea,id_calibre FROM `area_trabajo_operativo` WHERE id_sublinea = '.$this->sublineasinput);
            }

            foreach ($buscarUN as $bun) {
                $this->unidadNegocio = DB::table('unidad_de_negocio')->distinct('id,nombre_unidadNegocio')->where('id', '=', $bun->id_unidadnegocio)->get();
                $this->lineas = DB::table('lineas')->distinct('id,nombre_lineas')->where('id','=',$bun->id_linea)->get();

                $this->unidadNegocioLineas[] = $this->unidadNegocio[0]->nombre_unidadNegocio.' '.$this->lineas[0]->nombre_linea;
                
                $this->calibres[] = DB::table('calibres')->distinct('id,nombre_calibre')->where('id','=',$bun->id_calibre)->get();
            }

            $this->unidadNegocioLineas = array_unique($this->unidadNegocioLineas);

            $this->calibres = array_unique($this->calibres, SORT_REGULAR );
            $this->calibres = array_values($this->calibres);
           

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
    /* Filtrado por calibres */
    public function updatedcalibresinput()
    {
        
        if ($this->calibresinput == '') {
            $unidadNegocioinput2= NULL;
            $this->unidadNegocioLineas = $this->unidadNegocioLineas2;
            $this->sublineas;
            $this->calibres;
            $this->operaciones;
            $buscarUN = [];
        }else{
            $this->reset([ 'unidadNegocioLineas' ,'unidadNegocioLineas2' ,'sublineas','operaciones']);

            $buscarUN = [];
            
            if ($this->unidadNegocioinput != '') {
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
                }elseif($this->unidadNegocioinput == '4 Componentes / Casa 10') {
                    $unidadNegocioinput2 = 4;
                    $this->lineas = 6;
                }
                
                $buscarUN = DB::select('SELECT DISTINCT id_unidadnegocio,id_linea,id_sublinea,id_calibre,id_operacion FROM `area_trabajo_operativo` WHERE id_unidadnegocio ='.$unidadNegocioinput2.' && id_linea = '.$this->lineas.' && id_calibre ='.$this->calibresinput);
            }
            if($this->sublineasinput != ''){
                $buscarUN = DB::select('SELECT DISTINCT id_unidadnegocio,id_linea,id_sublinea,id_calibre,id_operacion FROM `area_trabajo_operativo` WHERE id_sublinea ='.$this->sublineasinput.' && id_calibre ='.$this->calibresinput);
            }
            if ($this->unidadNegocioinput != '' && $this->sublineasinput != '') {
                $buscarUN = DB::select('SELECT DISTINCT id_unidadnegocio,id_linea,id_sublinea,id_calibre,id_operacion FROM `area_trabajo_operativo` WHERE id_unidadnegocio ='.$unidadNegocioinput2.' && id_linea = '.$this->lineas.' && id_sublinea ='.$this->sublineasinput.' && id_calibre ='.$this->calibresinput);
            }
            
            foreach ($buscarUN as $bun) {
                $this->unidadNegocio = DB::table('unidad_de_negocio')->distinct('id,nombre_unidadNegocio')->where('id', '=', $bun->id_unidadnegocio)->get();
                $this->lineas = DB::table('lineas')->distinct('id,nombre_lineas')->where('id','=',$bun->id_linea)->get();
                $this->unidadNegocioLineas[] = $this->unidadNegocio[0]->nombre_unidadNegocio.' '.$this->lineas[0]->nombre_linea;
                
                $this->sublineas[] = DB::table('sublineas')->where('id','=',$bun->id_sublinea)->get()->toArray();
                
                $this->operaciones[] = DB::table('operaciones')->where('id','=',$bun->id_operacion)->get();
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

            $this->sublineas = array_unique($this->sublineas, SORT_REGULAR );
            $this->sublineas = array_values($this->sublineas);
            
        }
    }
    /* Seleccion automatico de los paquetes por operaciones */
    public function updatedoperacionesinput()
    {
        if ($this->operacionesinput != '') {
            $this->reset([ 'paqueteId','Selecionprendas1','Selecionprendas2','Selecionprendas3','Selecionprendas4',
                'Selecionprendas5','Selecionprendas6','Selecionprendas7','Selecionprendas8','Selecionprendas9',
                'Selecionprendas10','Selecionprendas11','Selecionprendas12','Selecionprendas13','Selecionprendas14',
                'Selecionprendas15','Selecionprendas16','Selecionprendas17','Selecionprendas18','Selecionprendas19',
                'Selecionprendas20','Selecionprendas21','Selecionprendas22'
            ]);
            
            $this->seleccionPersonal = true;
            $this->desabilitarSelect2 = true;
            $this->seleccionPersonalInput = NULL;
            $this->seleccionPaqueteInput = NULL;

            if ($this->unidadNegocioinput != '3 Torre de Plomo' || 
            $this->sublineasinput != '8' || $this->unidadNegocioinput != '4 Mezclas Químicas' || $this->operacionesinput != '9' ||
            $this->sublineasinput !='2' || $this->sublineasinput !='3' || $this->sublineasinput !='5' || $this->operacionesinput != '10' ||
            $this->unidadNegocioinput != '4 Fuego Anular' && $this->operacionesinput != '10' ||
            $this->operacionesinput != '40' || $this->operacionesinput != '28' || 
            $this->operacionesinput != '67' || 
            $this->sublineasinput != '8' || 
            $this->operacionesinput != '12' || $this->operacionesinput != '23' || $this->operacionesinput != '39' || $this->operacionesinput != '95' || $this->operacionesinput != '96' ||
            $this->operacionesinput != '27' || $this->operacionesinput == '46' || $this->operacionesinput != '70') {
                $this->paqueteEleccion = Uniformes_paquete::where('id',3)->get();
                
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }
           
            if($this->unidadNegocioinput == '3 Torre de Plomo'){
                $this->paqueteEleccion = Uniformes_paquete::where('id',2)->get();
                
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }

            if ($this->sublineasinput == '8' || $this->unidadNegocioinput == '4 Mezclas Químicas' || $this->operacionesinput == '9') {
                $this->paqueteEleccion = Uniformes_paquete::where('id',4)->get();
                
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }
            
            if ($this->unidadNegocioinput == '1 Fuego Central (Rifle)' || $this->unidadNegocioinput == '1 Fuego Central (Pistola)' || $this->unidadNegocioinput == '3 Fuego Central (Comunes/Misc)') {
                if ($this->sublineasinput =='2' || $this->sublineasinput =='3' || $this->sublineasinput =='5') {
                    if ($this->operacionesinput == '10' ) {
                        $this->paqueteEleccion = Uniformes_paquete::where('id',5)->get();
                
                        $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                        $idPaquete = $this->paqueteEleccion[0]->id;
                        $this->paqueteEleccion = $nombrePaquete;
                        $this->paqueteId = $idPaquete;
                    }
                }
            }

            if ($this->unidadNegocioinput == '4 Fuego Anular' && $this->operacionesinput == '10') {
                $this->paqueteEleccion = Uniformes_paquete::where('id',6)->get();
                
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }

            if ($this->operacionesinput == '40' || $this->operacionesinput == '28') {
                $this->paqueteEleccion = Uniformes_paquete::where('id',8)->get();
                
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }

            if ($this->operacionesinput == '67') {
                $this->paqueteEleccion = Uniformes_paquete::where('id',9)->get();
                
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }

            if ($this->sublineasinput == '8') {
                $this->paqueteEleccion = Uniformes_paquete::where('id',12)->get();
                
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }

            if ($this->operacionesinput == '12' || $this->operacionesinput == '23' || $this->operacionesinput == '39' || $this->operacionesinput == '95' || $this->operacionesinput == '96') {
                $this->paqueteEleccion = Uniformes_paquete::where('id',13)->get();
                
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }

            if ($this->operacionesinput == '27' || $this->operacionesinput == '46' || $this->operacionesinput == '70' ) {
                $this->paqueteEleccion = Uniformes_paquete::where('id',15)->get();
                
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }

            $this->tallaMethod();

        }else{
            $this->seleccionPersonal = false;
            $this->desabilitarSelect2 = false;
            $this->paqueteId = NULL;
        }
    }
    /* Seleccion automatico de los paquetes fuera de las operaciones */
    public function updatedseleccionPersonalInput()
    {
        if ($this->seleccionPersonalInput != '') {
            $this->reset([ 'paqueteId','Selecionprendas1','Selecionprendas2','Selecionprendas3','Selecionprendas4',
                'Selecionprendas5','Selecionprendas6','Selecionprendas7','Selecionprendas8','Selecionprendas9',
                'Selecionprendas10','Selecionprendas11','Selecionprendas12','Selecionprendas13','Selecionprendas14',
                'Selecionprendas15','Selecionprendas16','Selecionprendas17','Selecionprendas18','Selecionprendas19',
                'Selecionprendas20','Selecionprendas21','Selecionprendas22'
            ]);

            $this->seleccionPaqueteInput = NULL;
            $this->seleccionPersonal = true;
            $this->desabilitarSelect = true;
            
            if ($this->seleccionPersonalInput == 1) {
                $this->paqueteEleccion = Uniformes_paquete::where('id',4)->get();
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }

            if($this->seleccionPersonalInput == 2){
                $this->paqueteEleccion = Uniformes_paquete::where('id',7)->get();
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }

            if($this->seleccionPersonalInput == 3){
                $this->paqueteEleccion = Uniformes_paquete::where('id',10)->get();
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }

            if($this->seleccionPersonalInput == 4){
                $this->paqueteEleccion = Uniformes_paquete::where('id',11)->get();
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }

            if($this->seleccionPersonalInput == 5){
                $this->paqueteEleccion = Uniformes_paquete::where('id',14)->get();
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }

            if($this->seleccionPersonalInput == 6){
                $this->paqueteEleccion = Uniformes_paquete::where('id',16)->get();
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }

            if($this->seleccionPersonalInput == 7){
                $this->paqueteEleccion = Uniformes_paquete::where('id',3)->get();
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }
            
            $this->tallaMethod();
        }else{
            $this->seleccionPersonal = false;
            $this->desabilitarSelect = false;
            $this->tallas = [];
            $this->paqueteId = NULL;
        }
    }

    /* Seleccion de paquete Manual */
    public function updatedseleccionPaqueteInput()
    {
        if ($this->seleccionPaqueteInput !='') {
            $this->reset([ 'paqueteId','Selecionprendas1','Selecionprendas2','Selecionprendas3','Selecionprendas4',
                'Selecionprendas5','Selecionprendas6','Selecionprendas7','Selecionprendas8','Selecionprendas9',
                'Selecionprendas10','Selecionprendas11','Selecionprendas12','Selecionprendas13','Selecionprendas14',
                'Selecionprendas15','Selecionprendas16','Selecionprendas17','Selecionprendas18','Selecionprendas19',
                'Selecionprendas20','Selecionprendas21','Selecionprendas22'
            ]);

            if($this->seleccionPaqueteInput == 2){
                $this->paqueteEleccion = Uniformes_paquete::where('id',2)->get();
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }
            if($this->seleccionPaqueteInput == 3){
                $this->paqueteEleccion = Uniformes_paquete::where('id',3)->get();
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }
            if($this->seleccionPaqueteInput == 4){
                $this->paqueteEleccion = Uniformes_paquete::where('id',4)->get();
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }
            if($this->seleccionPaqueteInput == 5){
                $this->paqueteEleccion = Uniformes_paquete::where('id',5)->get();
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }
            if($this->seleccionPaqueteInput == 6){
                $this->paqueteEleccion = Uniformes_paquete::where('id',6)->get();
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }
            if($this->seleccionPaqueteInput == 7){
                $this->paqueteEleccion = Uniformes_paquete::where('id',7)->get();
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }
            if($this->seleccionPaqueteInput == 8){
                $this->paqueteEleccion = Uniformes_paquete::where('id',8)->get();
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }
            if($this->seleccionPaqueteInput == 9){
                $this->paqueteEleccion = Uniformes_paquete::where('id',9)->get();
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }
            if($this->seleccionPaqueteInput == 10){
                $this->paqueteEleccion = Uniformes_paquete::where('id',10)->get();
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }
            if($this->seleccionPaqueteInput == 11){
                $this->paqueteEleccion = Uniformes_paquete::where('id',11)->get();
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }
            if($this->seleccionPaqueteInput == 12){
                $this->paqueteEleccion = Uniformes_paquete::where('id',12)->get();
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }
            if($this->seleccionPaqueteInput == 13){
                $this->paqueteEleccion = Uniformes_paquete::where('id',13)->get();
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }
            if($this->seleccionPaqueteInput == 14){
                $this->paqueteEleccion = Uniformes_paquete::where('id',14)->get();
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }
            if($this->seleccionPaqueteInput == 15){
                $this->paqueteEleccion = Uniformes_paquete::where('id',15)->get();
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }
            if($this->seleccionPaqueteInput == 16){
                $this->paqueteEleccion = Uniformes_paquete::where('id',16)->get();
                $nombrePaquete = $this->paqueteEleccion[0]->nombre_paquete;
                $idPaquete = $this->paqueteEleccion[0]->id;
                $this->paqueteEleccion = $nombrePaquete;
                $this->paqueteId = $idPaquete;
            }

            $this->tallaMethod();
        }else{
            $this->tallas = [];
            $this->paqueteId = NULL;
        }
    }

    /* funcion para ejecutar en el render y permitir modificar las variables */
    public function todosSelect()
    {
        $this->unidadNegocio = DB::table('unidad_de_negocio')->get();
        
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
    
        $this->sublineas = DB::table('sublineas')->get();
        $this->calibres = DB::table('calibres')->get();
        $this->operaciones = DB::table('operaciones')->get();
  
        if($this->unidadNegocioinput != ''){
            $this->updatedunidadNegocioinput();
        }
        
        if($this->sublineasinput != ''){
            $this->updatedsublineasinput();
        }
        
        if ($this->calibresinput != '') {
            $this->updatedcalibresinput();
        }

        $this->areaExtras= [
            ['id'=>1,'extra'=>'Materialistas'],
            ['id'=>2,'extra'=>'Mantenimiento General'],
            ['id'=>3,'extra'=>'Herramientas Especial'],
            ['id'=>4,'extra'=>'Control Ambiental'],
            ['id'=>5,'extra'=>'Paileria'],
            ['id'=>6,'extra'=>'Sindicato'],
            ['id'=>7,'extra'=>'Almacen']
        ];
    
        $this->paquetes = Uniformes_paquete::all();

        $this->tallas;
        $this->paqueteId;
    } 

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
        $this->confirm('¿Deseas terminar el registro?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  'Si',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'registro',
            'onCancelled' => 'cancelled'
        ]);
    }

    /* Funcion para detectar vacios en los inputs obtenidos */
    public function vaciosBuscar()
    {
        $unidadNegocioinput2 = NULL;
        
        if($this->unidadNegocioinput == ''){
            $unidadNegocioinput2 = NULL;
            $this->lineas = NULL;
        }elseif ($this->unidadNegocioinput == '1 Fuego Central (Rifle)') {
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
        }elseif($this->unidadNegocioinput == '4 Componentes / Casa 10') {
            $unidadNegocioinput2 = 4;
            $this->lineas = 6;
        }  

        $arrayArea = [
            $this->seleccionPersonalInput,
            $unidadNegocioinput2,
            $this->lineas,
            $this->sublineasinput,
            $this->calibresinput,
            $this->operacionesinput,
        ];

        $arrayObtn = [
            /* $this->seleccionPaqueteInput,
            $this->paqueteId, */
            $this->Selecionprendas1,
            $this->Selecionprendas2,
            $this->Selecionprendas3,
            $this->Selecionprendas4,
            $this->Selecionprendas5,
            $this->Selecionprendas6,
            $this->Selecionprendas7,
            $this->Selecionprendas8,
            $this->Selecionprendas9,
            $this->Selecionprendas10,
            $this->Selecionprendas11,
            $this->Selecionprendas12,
            $this->Selecionprendas13,
            $this->Selecionprendas14,
            $this->Selecionprendas15,
            $this->Selecionprendas16,
            $this->Selecionprendas17,
            $this->Selecionprendas18,
            $this->Selecionprendas19,
            $this->Selecionprendas20,
            $this->Selecionprendas21,
            $this->Selecionprendas22
        ]; 

        return array($arrayArea,$arrayObtn);
    }

    public function registro(){
    
        DB::transaction(function(){

            $funObtn = $this->vaciosBuscar();

            $arrayArea2 = $funObtn[0];
            $arrayObtn2 = $funObtn[1];

            $res = null;
            $res2 = null;
            $areaInsertar = null;

            /* Evitar registrar doble */
            $evitarDobleUniformes = DB::table('colaborador_uniforme_paquete')->where('colaborador_no_colaborador',$this->colaboradorBusca)->get();
            $evitarDobleTrabajo = DB::table('colaborador_trabajooperativo')->where('no_colaborador',$this->colaboradorBusca)->get();

            if (count($evitarDobleTrabajo) > 0 && count($evitarDobleUniformes) > 0) {
                $this->flash('error', 'Ya se encuentra registrado el colaborador: '.$this->colaboradorBusca, [
                    'position' =>  'center',
                    'timer' =>  3500,
                    'toast' =>  true,
                    'text' =>  '',
                    'confirmButtonText' =>  'Ok',
                    'cancelButtonText' =>  'Cerrar',
                    'showCancelButton' =>  true,
                    'showConfirmButton' =>  false,
                ]);
                return redirect()->to('/uniformes/');
            }else{

                if ($arrayArea2[0] == null) {

                    /* Insertar unidades de negocio */
                
                    /* Insertar id del area_trabajo_operativo e insertar en la tabla de uniformes*/
                    
                    $filtrarVaciosPrendas = array_filter($arrayObtn2);
                    $acomodarFiltroVacios = array_values($filtrarVaciosPrendas);
                    /* unset($acomodarFiltroVacios[0]);
                    $acomodarFiltroVacios = array_values($acomodarFiltroVacios); */
                    
                    $areaTrabajo = DB::table('area_trabajo_operativo')->where('id_unidadnegocio',$arrayArea2[1])
                    ->where('id_linea',$arrayArea2[2])->where('id_sublinea',$arrayArea2[3])
                    ->where('id_calibre',$arrayArea2[4])->where('id_operacion',$arrayArea2[5])->limit(1)->get();
                    
                    for ($i=0; $i < count($acomodarFiltroVacios) ; $i++) { 
                            
                        $res = DB::table('colaborador_uniforme_paquete')->insert([
                            'colaborador_no_colaborador'=> $this->colaboradorBusca,
                            'uniformes_paquete_id'=>$this->paqueteId,
                            'uniformes_talla_id'=>$acomodarFiltroVacios[$i]
                        ]);
                        
                    }

                    $res2 = DB::table('colaborador_trabajooperativo')->insert([
                        'no_colaborador' =>$this->colaboradorBusca,
                        'id_area_trabajo_operativo'=> $areaTrabajo[0]->id,
                    ]);

                } else {
                    /* Insertar areasExtras */
                    
                    $filtrarVaciosPrendas = array_filter($arrayObtn2);
                    
                    $acomodarFiltroVacios = array_values($filtrarVaciosPrendas);
                    
                    /* unset($acomodarFiltroVacios[0]);
                    $acomodarFiltroVacios = array_values($acomodarFiltroVacios); */
                    
                    for ($i=0; $i < count($acomodarFiltroVacios) ; $i++) { 
                            
                        $res = DB::table('colaborador_uniforme_paquete')->insert([
                            'colaborador_no_colaborador'=> $this->colaboradorBusca,
                            'uniformes_paquete_id'=>$this->paqueteId,
                            'uniformes_talla_id'=>$acomodarFiltroVacios[$i]
                        ]);
                            
                    }
    
                    foreach ($this->areaExtras as $aE) {
                        if ( $this->seleccionPersonalInput ==$aE['id'] ) {
                            $areaInsertar = $aE['extra'];
                        }
                    }
                    
                    $res2 = DB::table('colaborador_trabajooperativo')->insert([
                        'no_colaborador' =>$this->colaboradorBusca,
                        'areaExterna'=> $areaInsertar,
                    ]);
    
                }

            } 

            if ($res == true && $res2 == true) {

                $this->flash('success', 'Se ha insertado correctamente', [
                    'position' =>  'top-end',
                    'timer' =>  3500,
                    'toast' =>  true,
                    'text' =>  '',
                    'confirmButtonText' =>  'Ok',
                    'cancelButtonText' =>  'Cerrar',
                    'showCancelButton' =>  false,
                    'showConfirmButton' =>  true,
                ]);
                return redirect()->to('/uniformes/');
            }

        });

    }

    public function abrirModal()
    {
        $this->tallasValidacion = $this->vaciosBuscar();
        $this->tallasValidacion = array_filter($this->tallasValidacion[1]);
        $this->tallasValidacion = array_values($this->tallasValidacion);

        if (count($this->tallasValidacion) == 1){
            $this->alert('info', 'Debes termiar de registrar las tallas', [
                'position' =>  'center', 
                'timer' =>  3000,  
                'toast' =>  true, 
                'text' =>  '', 
                'confirmButtonText' =>  'Ok', 
                'cancelButtonText' =>  'Cancel', 
                'showCancelButton' =>  true, 
                'showConfirmButton' =>  false, 
          ]);
        }elseif(count($this->tallasValidacion) == count($this->tallasValidacion)){
            $this->modalAbrir = true;
        }

    }

    public function cerrarModal(){
        $this->modalAbrir = false;
    }


    /* Mostrar y ocultar modal Excel */
    public function modalExcel()
    {
        $this->exportarModal = !$this->exportarModal;
        $this->reset(['exportarUniformes','lista']);
    }

    /* Exportar paquete */
    public function excelDescargar()
    {
        $this->reset(['lista','paqueteEleccion']);

        $fecha = Carbon::now();
        if ($this->exportarUniformes == "" || $this->exportarUniformes == null || $this->exportarUniformes == 0) {
            $this->lista = DB::select('SELECT cup.colaborador_no_colaborador,cr.nombre_1,cr.nombre_2,cr.ap_paterno,cr.ap_materno,up.nombre_paquete,upa.prenda,ut.talla FROM colaborador_uniforme_paquete AS cup
            JOIN colaborador cr ON cr.no_colaborador = cup.colaborador_no_colaborador
            JOIN uniformes_paquete up ON up.id = cup.uniformes_paquete_id
            JOIN uniformes_talla ut ON ut.id = cup.uniformes_talla_id
            JOIN uniformes_prenda upa ON upa.id = ut.uniformes_prenda_id ORDER BY cup.colaborador_no_colaborador');
            $this->lista = collect($this->lista);
            
            return Excel::download(new UniformesExport($this->lista), 'Uniformes-TodosLosPaquetes(' . $fecha . ').xlsx');
        } else {
            $this->lista = DB::select('SELECT cup.colaborador_no_colaborador,cr.nombre_1,cr.nombre_2,cr.ap_paterno,cr.ap_materno,up.nombre_paquete,upa.prenda,ut.talla FROM colaborador_uniforme_paquete AS cup
            JOIN colaborador cr ON cr.no_colaborador = cup.colaborador_no_colaborador
            JOIN uniformes_paquete up ON up.id = cup.uniformes_paquete_id
            JOIN uniformes_talla ut ON ut.id = cup.uniformes_talla_id
            JOIN uniformes_prenda upa ON upa.id = ut.uniformes_prenda_id
            WHERE cup.uniformes_paquete_id ='.$this->exportarUniformes.' ORDER BY cup.colaborador_no_colaborador LIMIT 4');
            $this->lista = collect($this->lista);

            foreach ($this->paquetes as $ps) {
                if ($this->exportarUniformes ==  $ps->id) {
                    $this->paqueteEleccion = $ps->nombre_paquete;
                }
            }

            /* return Excel::download(new UniformesExport($this->lista), 'Uniformes-'.$this->paqueteEleccion.'(' . $fecha . ').xlsx'); */
        }
        
    }


}