<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Nuevo_ingreso;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class ActualizarNuevoIngreso extends Component
{
    use WithFileUploads;

    public $nuevo_Ingreso_Doc;
    public $revisionDoc;

    public $curp;
    public $actaNac;
    public $rfc;
    public $imss;
    public $credencialIFE;
    public $domicilio;
    public $Estudios;

    public $status;
    public $r_obscredencial;
    public $r_obsactaNac;
    public $r_obsDir;
    public $r_obscurp;
    public $r_obsrfc;
    public $r_obsimss;
    public $r_obsEstudios;

    public $a_obscredencial;
    public $a_obsactaNac;
    public $a_obsDir;
    public $a_obscurp;
    public $a_obsrfc;
    public $a_obsimss;
    public $a_obsEstudios;

    public $actaMatrimonio;
    public $actaHijos;
    public $carillaMilitar;
    public $cartaRecomendacion;
    public $cartaNoPenales;
    public $buroCredito;

    public $totalSteps = 3;
    public $currentStep = 1;

    protected $listeners = [
        'registro',
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

    public function mount($id_ni)
    {
        $this->nuevo_Ingreso_Doc = Nuevo_ingreso::select('curp')->findOrFail($id_ni);  
        $this->revisionDoc =  DB::table('v_nuevo_ingresos')->where('curp',$this->nuevo_Ingreso_Doc->curp)->get();
        $this->status = $this->revisionDoc[0]->status;

        if ($this->status == 1 || $this->status == 3) {
            
        }else{
            return abort(404);
        }
        

        $this->r_obscredencial = $this->revisionDoc[0]->R_obscredencial;
        $this->r_obsactaNac = $this->revisionDoc[0]->R_obsfecNac;
        $this->r_obsDir = $this->revisionDoc[0]->R_obsdomicilio;
        $this->r_obscurp = $this->revisionDoc[0]->R_obscurp;
        $this->r_obsrfc = $this->revisionDoc[0]->R_obsrfc;
        $this->r_obsimss = $this->revisionDoc[0]->R_obsimss;
        $this->r_obsEstudios = $this->revisionDoc[0]->R_obsNivelEstudios;

        $this->a_obscredencial = $this->revisionDoc[0]->A_obscredencial;
        $this->a_obsactaNac = $this->revisionDoc[0]->A_obsfecNac;
        $this->a_obsDir = $this->revisionDoc[0]->A_obsdomicilio;
        $this->a_obscurp = $this->revisionDoc[0]->A_obscurp;
        $this->a_obsrfc = $this->revisionDoc[0]->A_obsrfc;
        $this->a_obsimss = $this->revisionDoc[0]->A_obsimss;
        $this->a_obsEstudios = $this->revisionDoc[0]->A_obsNivelEstudios;
        
        /* $test = strpos ( $this->r_obscredencial ,'foto');
        $test2 = strpos ( $this->a_obscredencial ,'foto');
        if ($test == false || $test == false) {
            $this->fotoMostrar = false;
        } else {
            $this->fotoMostrar = true;
        }
         */

        $this->currentStep = 1;
    }

    public function render()
    {
        return view('livewire.actualizar-nuevo-ingreso')->layout('layouts.guest');
    }

    public function increaseStep()
    {
        $this->resetErrorBag();
        $this->validateData();

        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }

    public function validateData()
    {
        if ($this->currentStep === 2) {
            if ($this->r_obscurp != Null  || $this->a_obscurp != Null) {
                $this->validate(
                    ['curp' =>'required|mimes:pdf|max:5120'],
                    ['curp.required'=>'Debes seleccionar un archivo',
                    'curp.mimes'=>'Debe ser un archivo con formato: pdf']
                );
            }

            if ($this->r_obsactaNac != Null  || $this->a_obsactaNac != Null) {
                $this->validate(
                    ['actaNac' =>'required|mimes:pdf|max:5120'],
                    ['actaNac.required'=>'Debes seleccionar un archivo',
                    'actaNac.mimes'=>'Debe ser un archivo con formato: pdf']
                );
            }

            if ($this->r_obsrfc != Null  || $this->a_obsrfc != Null) {
                $this->validate(
                    ['rfc' =>'required|mimes:pdf|max:5120'],
                    ['rfc.required'=>'Debes seleccionar un archivo',
                    'rfc.mimes'=>'Debe ser un archivo con formato: pdf']
                );
            }

            if ($this->r_obsimss != Null  || $this->a_obsimss != Null) {
                $this->validate(
                    ['imss' =>'required|mimes:pdf|max:5120'],
                    ['imss.required'=>'Debes seleccionar un archivo',
                    'imss.mimes'=>'Debe ser un archivo con formato: pdf']
                );
            }

            if ($this->r_obscredencial != Null  || $this->a_obscredencial != Null) {
                $this->validate(
                    ['credencialIFE' =>'required|mimes:pdf|max:5120'],
                    ['credencialIFE.required'=>'Debes seleccionar un archivo',
                    'credencialIFE.mimes'=>'Debe ser un archivo con formato: pdf']
                );
            }

            if ($this->r_obsDir != Null  || $this->a_obsDir != Null) {
                $this->validate(
                    ['domicilio' =>'required|mimes:pdf|max:5120'],
                    ['domicilio.required'=>'Debes seleccionar un archivo',
                    'domicilio.mimes'=>'Debe ser un archivo con formato: pdf']
                );
            }

            if ($this->r_obsEstudios != Null  || $this->a_obsEstudios != Null) {
                $this->validate(
                    ['Estudios' =>'required|mimes:pdf|max:5120'],
                    ['Estudios.required'=>'Debes seleccionar un archivo',
                    'Estudios.mimes'=>'Debe ser un archivo con formato: pdf']
                );
            }
           
        }
        
    }

}
