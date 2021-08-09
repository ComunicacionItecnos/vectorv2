<?php

namespace App\Http\Livewire;

use App\Models\Escolaridad;
use App\Models\Estado_civil;
use App\Models\Genero;
use App\Models\Nacionalidad;
use App\Models\Nuevo_ingreso;
use Livewire\Component;
use Livewire\WithFileUploads;

class NuevoIngreso extends Component
{
    use WithFileUploads;

    public $curp;
    public $curpDoc;
    public $nombre_1;
    public $nombre_2;
    public $ap_paterno;
    public $ap_materno;
    public $fecha_nacimiento;
    public $actaNacimiento;

    public $escolaridad;
    public $escolaridad_id;
    public $constanciaEstudios;
    public $especialidadEstudios;
    
    public $genero;
    public $genero_id;
    
    public $estado_civil;
    public $estado_civil_id;
    public $actaMatrimonio;
    public $rfc;
    public $rfcDoc;
    public $no_social_social;
    public $altaImssDoc;
    public $domicilio;
    
    public $numeroExterior;
    public $numeroInterior;
    
    public $colonia;
    public $municipio;
    public $estado;
    
    public $nacionalidad;
    public $nacionalidad_id;
    
    public $codigo_postal;
    public $comprobranteDomicilio;
    public $paternidad_id;
    public $actasHijo = [];
    public $cartasRecomendacion = [];
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
    public $tallazapatos;

    public $curpValida;
    public $totalSteps = 9;
    public $currentStep = 1;

    public function mount()
    {
        // $this->escolaridad = Escolaridad::all();
        $this->estado_civil = Estado_civil::all();
        $this->nacionalidad = Nacionalidad::orderBy('pais','ASC')->get();
        $this->genero = Genero::all();
        $this->currentStep = 1;
        $this->curpValida = '';
    }

    public function render()
    {
        return view('livewire.nuevo-ingreso')->layout('layouts.guest');
    }

    public function comprobarCurp()
    {
        /* Buscar curp para seguir con el proceso */
        $curpvalidar = Nuevo_ingreso::where('curp', $this->curp)->get();
        
       
        if ( sizeof($curpvalidar) === 0 ) {
            $this->currentStep++;
            $this->curpValida = false;
        }else{
            session()->flash('message', 'La CURP ya se encuentra registrada');
            return redirect()->to('/nuevo-ingreso');
        }
    }

    public function increaseStep()
    {
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep()
    {
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }

    public function validateData()
    {
        if ($this->currentStep === 1) {
            
        }elseif($this->currentStep === 2){
            
        }elseif($this->currentStep === 3){
            
        }elseif($this->currentStep === 4){

        }elseif($this->currentStep === 5){

        }elseif($this->currentStep === 6){

        }elseif($this->currentStep === 7){

        }elseif($this->currentStep === 8){

        }
        
    }

    public function registro()
    {
        dd(
            
            'Curp:',$this->curp,
            'nombre 1',$this->nombre_1,
            'nombre 2',$this->nombre_2,
            'ap_paterno',$this->ap_paterno,
            'ap_materno',$this->ap_materno,
            'fecha nacimiento',$this->fecha_nacimiento,
            'genero',$this->genero_id,
            'estado civil',$this->estado_civil_id,
            'acta de matrimonio',$this->actaMatrimonio,
            'paternidad',$this->paternidad_id,
            'actas hijos',$this->actasHijo,
            'curp doc',$this->curpDoc,
            'acta nacimiento',$this->actaNacimiento,
            'rfc',$this->rfc,
            'rfc doc',$this->rfcDoc,
            'num social',$this->no_social_social,
            'alta imss doc',$this->altaImssDoc,
            'IFE',$this->credencialIFE,
            'Cartilla militar',$this->cartillaMilitar,
            'talla de pantalon',$this->tallaPantalon,
            'talla de playera',$this->tallaPlayera,
            'talla de zapatos',$this->tallazapatos,
            'calle',$this->domicilio,
            'num ext',$this->numeroExterior,
            'num int',$this->numeroInterior,
            'colonia',$this->colonia,
            'municipio',$this->municipio,
            'estado',$this->estado,
            'nacionalidad',$this->nacionalidad_id,
            'codigo postal',$this->codigo_postal,
            'comprobante domicilio',$this->comprobranteDomicilio,
            'tel fijo',$this->tel_fijo,
            'tel movil',$this->tel_movil,
            'correo',$this->correo,
            'nivel estudios',$this->escolaridad_id,
            'constancia estudios',$this->constanciaEstudios,
            'especialidad estudios',$this->especialidadEstudios,
            'cv o solicitud empleo',$this->cvOsolicitudEmpleo,
            'cartas recomendacion',$this->cartasRecomendacion,
            'carta no penales',$this->cartaNoPenales,
            'buro credito',$this->buroCredito,
            'foto',$this->foto
        );
    }

}
