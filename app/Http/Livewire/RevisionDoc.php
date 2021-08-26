<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Nuevo_ingreso;
use Illuminate\Support\Facades\DB;

class RevisionDoc extends Component
{
    use WithPagination;

    /* Variables */
    public $search, $perPage = '1';
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public $nuevoIngreso;
    
    public $curp;
    public $curpDoc;
    public $nombre1;
    public $nombre2;
    public $ap_paterno;
    public $ap_materno;
    public $fecha_nacimiento;
    public $actaNacimiento;
    public $escolaridad_id;
    public $escolaridad;
    public $constanciaEstudios;
    public $especialidadEstudios;
    public $genero;
    public $estado_civil_id;
    public $estado_civil;
    public $actaMatrimonio;
    public $rfc;
    public $rfcDocumento;
    public $no_seguro_social;
    public $altaImssDoc;
    public $calle;
    public $colonia;
    public $municipio;
    public $estado;
    public $pais;
    public $nacionalidad;
    public $codigo_postal;
    public $comprobanteDomicilio;
    public $paternidad;
    public $actasHijo;
    public $cartasRecomendacion;
    public $cartillaMilitar;
    public $cartaNoPenales;
    public $credencialIFE;
    public $buroCredito;
    public $foto;
    public $correo;
    public $tel_fijo;
    public $tel_movil;
    public $cvOsolicitudEmpleo;
    public $tallaPantalon;
    public $tallaPlayera;
    public $tallaZapatos;
    public $numExt;
    public $numInt;

    public $mostrarCandidato = false;
    public $mostrarTodos = true;

    public $candidatoDoc;

    public $curpValue = true;
    public $observacionCurp;

    public $actaNacValue = true;
    public $observacionActaNac;

    public $dirValue = true;
    public $observacionDir;

    public $curpDocValue = true;
    public $observacionCurpDoc;

    public $rfcValue = true;
    public $observacionrfc;

    public $imssValue = true;
    public $observacionimss;

    public $escolaridadValue = true;
    public $observacionescolaridad;

    public $obsExtValue = false;
    public $observacionobsExt;


    public function mount(){
        $this->candidatoDoc = [];
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {

        return view('livewire.revision-doc',['nuevosIngresos'=>Nuevo_ingreso::where('nombre_1','LIKE',"%{$this->search}%")
                                        ->orWhere('curp', 'LIKE', "%{$this->search}%")
                                        ->orWhere('rfc', 'LIKE', "%{$this->search}%")
                                        ->orWhere('no_seguro_social', 'LIKE', "%{$this->search}%")
                                        ->paginate($this->perPage),
        ]);
    }

    
    public function candidato($id){
        if ($id == null || $id == '') {
           $this->candidatoDoc = Nuevo_ingreso::where('id','=',$id)->get();
        } else {
            dd('Ejecutando funcion');
        }
    }

    public function showInfo($id){
        if ($this->mostrarCandidato == false) {
            $this->mostrarCandidato = true;
            $this->mostrarTodos = false;
            $this->candidatoDoc = DB::table('v_nuevo_ingresos')->where('id',$id)->get();

            $this->curp = $this->candidatoDoc[0]->curp;
            $this->curpDoc = $this->candidatoDoc[0]->curpDoc;
            $this->nombre1 = $this->candidatoDoc[0]->nombre_1;
            $this->nombre2 = $this->candidatoDoc[0]->nombre_2;
            $this->ap_paterno = $this->candidatoDoc[0]->ap_paterno;
            $this->ap_materno = $this->candidatoDoc[0]->ap_materno;
            $this->fecha_nacimiento = $this->candidatoDoc[0]->fecha_nacimiento;
            $this->actaNacimiento = $this->candidatoDoc[0]->actaNacimiento;
            $this->escolaridad_id = $this->candidatoDoc[0]->escolaridad_id;
            $this->escolaridad = $this->candidatoDoc[0]->escolaridad;
            $this->constanciaEstudios = $this->candidatoDoc[0]->constanciaEstudios;
            $this->especialidadEstudios = $this->candidatoDoc[0]->especialidadEstudios;
            $this->genero = $this->candidatoDoc[0]->genero;
            $this->estado_civil_id = $this->candidatoDoc[0]->estado_civil_id;
            $this->estado_civil = $this->candidatoDoc[0]->estado_civil;
            $this->actaMatrimonio = $this->candidatoDoc[0]->actaMatrimonio;
            $this->rfc = $this->candidatoDoc[0]->rfc;
            $this->rfcDocumento = $this->candidatoDoc[0]->rfcDocumento;
            $this->no_seguro_social = $this->candidatoDoc[0]->no_seguro_social;
            $this->altaImssDoc = $this->candidatoDoc[0]->altaImssDoc;
            $this->calle = $this->candidatoDoc[0]->calle;
            $this->colonia = $this->candidatoDoc[0]->colonia;
            $this->municipio = $this->candidatoDoc[0]->municipio;
            $this->estado = $this->candidatoDoc[0]->estado;
            $this->pais = $this->candidatoDoc[0]->pais;
            $this->nacionalidad = $this->candidatoDoc[0]->nacionalidad;
            $this->codigo_postal = $this->candidatoDoc[0]->codigo_postal;
            $this->comprobanteDomicilio = $this->candidatoDoc[0]->comprobanteDomicilio;
            $this->paternidad = $this->candidatoDoc[0]->paternidad;
            $this->actasHijo = $this->candidatoDoc[0]->actasHijo;
            $this->cartasRecomendacion = $this->candidatoDoc[0]->cartasRecomendacion;
            $this->cartillaMilitar = $this->candidatoDoc[0]->cartillaMilitar;
            $this->cartaNoPenales = $this->candidatoDoc[0]->cartaNoPenales;
            $this->credencialIFE = $this->candidatoDoc[0]->credencialIFE;
            $this->buroCredito = $this->candidatoDoc[0]->buroCredito;
            $this->foto = $this->candidatoDoc[0]->foto;
            $this->correo = $this->candidatoDoc[0]->correo;
            $this->tel_fijo = $this->candidatoDoc[0]->tel_fijo;
            $this->tel_movil = $this->candidatoDoc[0]->tel_movil;
            $this->cvOsolicitudEmpleo = $this->candidatoDoc[0]->cvOsolicitudEmpleo;
            $this->tallaPantalon = $this->candidatoDoc[0]->tallaPantalon;
            $this->tallaPlayera = $this->candidatoDoc[0]->tallaPlayera;
            $this->tallaZapatos = $this->candidatoDoc[0]->tallaZapatos;
            $this->numExt = $this->candidatoDoc[0]->numExt;
            $this->numInt = $this->candidatoDoc[0]->numInt;
        }
    }

    public function showMore(){
        ($this->mostrarTodos) ? : $this->mostrarTodos = false;
        if ($this->mostrarTodos == false) {
            $this->mostrarTodos = true;
            $this->mostrarCandidato = false;
            $this->candidatoDoc = [];
        }   
    }

    public function curpToogle()
    {
        ($this->curpValue) ? $this->observacionCurp = '' : $this->curpValue = false ;
    }

    public function actaNacToogle(){
        ($this->actaNacValue) ? $this->observacionActaNac = '' : $this->actaNacValue;
    }

    public function direccionToggle()
    {
        ($this->dirValue) ? $this->observacionDir = '': $this->dirValue;
    }

    public function curpDocToogle()
    {
        ($this->curpDocValue) ? $this->observacionCurpDoc = '': $this->curpDocValue;
    }

    public function rfcToogle()
    {
        ($this->rfcValue) ? $this->observacionrfc = '': $this->rfcValue;
    }

    public function imssToogle()
    {
        ($this->imssValue) ? $this->observacionimss = '': $this->imssValue;
    }

    public function escolaridadToogle()
    {
        ($this->escolaridadValue) ? $this->observacionescolaridad = '': $this->escolaridadValue;
    }

    public function obsExToogle()
    {
        ($this->obsExtValue) ? $this->observacionobsExt = '': $this->obsExtValue;
    }


}
