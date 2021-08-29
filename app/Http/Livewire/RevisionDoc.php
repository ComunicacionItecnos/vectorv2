<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class RevisionDoc extends Component
{
    use WithPagination;

    /* Variables */
    public $search, $perPage = '8';
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    protected $listeners = [
        'registro',
        'cancelled',
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
    
    public $areard;
    public $r_obscredencial;
    public $r_obsfecNac;
    public $r_obscurp;
    public $r_obsrfc;
    public $r_obsimss;
    public $r_obsdomicilio;
    public $r_obsNivelEstudios;
    public $r_obsExtra;

    public $a_obscredencial;
    public $a_obsfecNac;
    public $a_obscurp;
    public $a_obsrfc;
    public $a_obsimss;
    public $a_obsdomicilio;
    public $a_obsNivelEstudios;
    public $a_obsExtra;
    public $status;
    public $r_userId;
    public $a_userId;

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

    public $userLogin;
    public $userName;


    public function mount(){
        $this->candidatoDoc = [];
        // $this->userLogin = auth()->user()->role_id;
        $this->userLogin = 5;
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.revision-doc',['nuevosIngresos'=>DB::table('v_nuevo_ingresos')
                                        ->where('nombre_1','LIKE',"%{$this->search}%")
                                        ->orWhere('curp', 'LIKE', "%{$this->search}%")
                                        ->orWhere('rfc', 'LIKE', "%{$this->search}%")
                                        ->orWhere('no_seguro_social', 'LIKE', "%{$this->search}%")
                                        ->paginate($this->perPage),
        ]);
    }

    public function showInfo($id){
        if ($this->mostrarCandidato == false) {
            $this->mostrarCandidato = true;
            $this->mostrarTodos = false;

            $this->candidatoDoc = DB::table('v_nuevo_ingresos')->where('id',$id)->get();

            if ($this->candidatoDoc[0]->R_userId == NULL) {
                $this->r_userId = Null;
            } else {
                $this->r_userId = User::where('id',$this->candidatoDoc[0]->R_userId)->first();
                $this->r_userId = $this->r_userId->name;
            }
            
            if ($this->candidatoDoc[0]->A_userId == NULL) {
                $this->a_userId = Null;
            } else {
                $this->a_userId = User::where('id',$this->candidatoDoc[0]->A_userId)->first();
                $this->a_userId = $this->a_userId->name;
            }            

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

            $this->areard = $this->candidatoDoc[0]->areaRd;
            $this->r_obscredencial = $this->candidatoDoc[0]->R_obscredencial;
            $this->r_obsfecNac = $this->candidatoDoc[0]->R_obsfecNac;
            $this->r_obscurp = $this->candidatoDoc[0]->R_obscurp;
            $this->r_obsrfc = $this->candidatoDoc[0]->R_obsrfc;
            $this->r_obsimss = $this->candidatoDoc[0]->R_obsimss;
            $this->r_obsdomicilio = $this->candidatoDoc[0]->R_obsdomicilio;
            $this->r_obsNivelEstudios = $this->candidatoDoc[0]->R_obsNivelEstudios;
            $this->r_obsExtra = $this->candidatoDoc[0]->R_obsExtra;
            $this->a_obscredencial = $this->candidatoDoc[0]->A_obscredencial;
            $this->a_obsfecNac = $this->candidatoDoc[0]->A_obsfecNac;
            $this->a_obscurp = $this->candidatoDoc[0]->A_obscurp;
            $this->a_obsrfc = $this->candidatoDoc[0]->A_obsrfc;
            $this->a_obsimss = $this->candidatoDoc[0]->A_obsimss;
            $this->a_obsdomicilio = $this->candidatoDoc[0]->A_obsdomicilio;
            $this->a_obsNivelEstudios = $this->candidatoDoc[0]->A_obsNivelEstudios;
            $this->a_obsExtra = $this->candidatoDoc[0]->A_obsExtra;
            $this->status = $this->candidatoDoc[0]->status;
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

    public function registro(){
        
        dd('dentro de registro');
    }

}
