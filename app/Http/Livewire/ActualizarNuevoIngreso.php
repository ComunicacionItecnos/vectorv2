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
    public $idNi;
    public $curpString;

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

    public $paternidad;
    public $actaHijos;
    public $cartillaMilitar;
    public $cartaRecomendacion;
    public $cartaNoPenales;
    public $buroCredito;

    public $actaHijos_update;
    public $cartillaMilitar_update;
    public $cartaRecomendacion_update;
    public $cartaNoPenales_update;
    public $buroCredito_update;

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
        $this->revisionDoc =  DB::table('v_nuevo_ingresos')->where('curp', $this->nuevo_Ingreso_Doc->curp)->get();
        $this->status = $this->revisionDoc[0]->status;
        $this->idNi = $id_ni;
        if ($this->status == 1 || $this->status == 3) {
        } else {
            return abort(404);
        }

        $this->curpString = $this->revisionDoc[0]->curp;

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

        $this->paternidad = $this->revisionDoc[0]->paternidad;
        $this->actaHijos = $this->revisionDoc[0]->actasHijo;
        $this->cartillaMilitar = $this->revisionDoc[0]->cartillaMilitar;
        $this->cartaRecomendacion = $this->revisionDoc[0]->cartasRecomendacion;
        $this->cartaNoPenales = $this->revisionDoc[0]->cartaNoPenales;
        $this->buroCredito = $this->revisionDoc[0]->buroCredito;

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
        if ($this->currentStep == 2) {
            if ($this->r_obscurp != Null  || $this->a_obscurp != Null) {
                $this->validate(
                    ['curp' => 'required|mimes:pdf|max:5120'],
                    [
                        'curp.required' => 'Debes seleccionar un archivo',
                        'curp.mimes' => 'Debe ser un archivo con formato: pdf'
                    ]
                );
            }

            if ($this->r_obsactaNac != Null  || $this->a_obsactaNac != Null) {
                $this->validate(
                    ['actaNac' => 'required|mimes:pdf|max:5120'],
                    [
                        'actaNac.required' => 'Debes seleccionar un archivo',
                        'actaNac.mimes' => 'Debe ser un archivo con formato: pdf'
                    ]
                );
            }

            if ($this->r_obsrfc != Null  || $this->a_obsrfc != Null) {
                $this->validate(
                    ['rfc' => 'required|mimes:pdf|max:5120'],
                    [
                        'rfc.required' => 'Debes seleccionar un archivo',
                        'rfc.mimes' => 'Debe ser un archivo con formato: pdf'
                    ]
                );
            }

            if ($this->r_obsimss != Null  || $this->a_obsimss != Null) {
                $this->validate(
                    ['imss' => 'required|mimes:pdf|max:5120'],
                    [
                        'imss.required' => 'Debes seleccionar un archivo',
                        'imss.mimes' => 'Debe ser un archivo con formato: pdf'
                    ]
                );
            }

            if ($this->r_obscredencial != Null  || $this->a_obscredencial != Null) {
                $this->validate(
                    ['credencialIFE' => 'required|mimes:pdf|max:5120'],
                    [
                        'credencialIFE.required' => 'Debes seleccionar un archivo',
                        'credencialIFE.mimes' => 'Debe ser un archivo con formato: pdf'
                    ]
                );
            }

            if ($this->r_obsDir != Null  || $this->a_obsDir != Null) {
                $this->validate(
                    ['domicilio' => 'required|mimes:pdf|max:5120'],
                    [
                        'domicilio.required' => 'Debes seleccionar un archivo',
                        'domicilio.mimes' => 'Debe ser un archivo con formato: pdf'
                    ]
                );
            }

            if ($this->r_obsEstudios != Null  || $this->a_obsEstudios != Null) {
                $this->validate(
                    ['Estudios' => 'required|mimes:pdf|max:5120'],
                    [
                        'Estudios.required' => 'Debes seleccionar un archivo',
                        'Estudios.mimes' => 'Debe ser un archivo con formato: pdf'
                    ]
                );
            }
        } elseif ($this->currentStep == 3) {
            $this->validate(
                [
                    'actaHijos_update' => 'mimes:pdf|max:5120',
                    'cartillaMilitar_update' => 'mimes:pdf|max:5120',
                    'cartaRecomendacion_update' => 'mimes:pdf|max:5120',
                    'cartaNoPenales_update' => 'mimes:pdf|max:5120',
                    'buroCredito_update' => 'mimes:pdf|max:5120'
                ],
                [
                    'actaHijos_update.mimes' => 'Debe ser un archivo con formato: pdf',
                    'cartillaMilitar_update.mimes' => 'Debe ser un archivo con formato: pdf',
                    'cartaRecomendacion_update.mimes' => 'Debe ser un archivo con formato: pdf',
                    'cartaNoPenales_update.mimes' => 'Debe ser un archivo con formato: pdf',
                    'buroCredito_update.mimes' => 'Debe ser un archivo con formato: pdf'
                ]
            );
        }
    }

    public function registro()
    {
        if ($this->r_obscurp != null || $this->a_obscurp != null) {
            $this->curp = $this->curp->storeAs('public/nuevoIngreso/' . $this->curpString, '01.-CURP.pdf');
        } else {
            $this->curp = $this->revisionDoc[0]->curpDoc;
        }

        if ($this->r_obsactaNac != null || $this->a_obsactaNac != null) {
            $this->actaNac = $this->actaNac->storeAs('public/nuevoIngreso/' . $this->curpString, '02.-actaDeNacimiento.pdf');
        } else {
            $this->actaNac = $this->revisionDoc[0]['actaNacimiento'];
        }

        if ($this->r_obsrfc != null || $this->a_obsrfc != null) {
            $this->rfc = $this->rfc->storeAs('public/nuevoIngreso/' . $this->curpString, '05.-RFC.pdf');
        } else {
            $this->rfc = $this->revisionDoc[0]['rfcDocumento'];
        }

        if ($this->r_obsimss != null || $this->a_obsimss != null) {
            $this->imss = $this->imss->storeAs('public/nuevoIngreso/' . $this->curpString, '06.-altaDelImss.pdf');
        } else {
            $this->imss = $this->revisionDoc[0]['altaImssDoc'];
        }

        if ($this->r_obscredencial != null || $this->a_obscredencial != null) {
            $this->credencialIFE = $this->credencialIFE->storeAs('public/nuevoIngreso/' . $this->curpString, '12.-credencialIFE.pdf');
        } else {
            $this->credencialIFE = $this->revisionDoc[0]['credencialIFE'];
        }

        if ($this->r_obsDir != null || $this->a_obsDir != null) {
            $this->domicilio = $this->domicilio->storeAs('public/nuevoIngreso/' . $this->curpString, '07.-comprobanteDeDomicilio.pdf');
        } else {
            $this->domicilio = $this->revisionDoc[0]['comprobanteDomicilio'];
        }

        if ($this->r_obsEstudios != null || $this->a_obsEstudios != null) {
            $this->Estudios = $this->Estudios->storeAs('public/nuevoIngreso/' . $this->curpString, '03.-constanciaDeEstudios.pdf');
        } else {
            $this->Estudios = $this->revisionDoc[0]['constanciaEstudios'];
        }

        if ($this->actaHijos_update == []) {
            $rutaActaHijo = $this->revisionDoc[0]['actasHijo'];
            if ($rutaActaHijo == "null") {
                $rutaActaHijo = null;
            }
        } else {
            for ($i = 0; $i < count($this->actaHijos_update); $i++) {
                $rutaActasHijos2 = $this->actaHijos_update[$i]->storeAs('public/nuevoIngreso/' . $this->curpString . '/08.-actasHijos', 'actaDeHijo' . $i . '.pdf');
                $rutaActaHijo[] = $rutaActasHijos2;
            }
        }

        if ($this->cartillaMilitar_update != '') {
            $this->cartillaMilitar_update = $this->cartillaMilitar_update->storeAs('public/nuevoIngreso/' . $this->curpString, '10.-cartillaMilitar.pdf');
        } else {
            $this->cartillaMilitar_update = $this->revisionDoc[0]['cartillaMilitar'];
        }

        if ($this->cartaRecomendacion_update == []) {
            $rutaRecomendacion = $this->revisionDoc[0]['cartasRecomendacion'];
            if ($rutaRecomendacion == "null") {
                $rutaRecomendacion = null;
            }
        } else {
            for ($i = 0; $i < count($this->cartaRecomendacion_update); $i++) {
                $rutaRecomendacion2 = $this->cartaRecomendacion_update[$i]->storeAs('public/nuevoIngreso/' . $this->curpString . '/09.-cartasRecomendacion', 'cartaDeRecomendacion' . $i . '.pdf');
                $rutaRecomendacion[] = $rutaRecomendacion2;
            }
        }

        if ($this->cartaNoPenales_update != '') {
            $this->cartaNoPenales_update = $this->cartaNoPenales_update->storeAs('public/nuevoIngreso/' . $this->curpString, '11.-cartaDeAntecedentesNoPenales.pdf');
        } else {
            $this->cartaNoPenales_update = $this->revisionDoc[0]['cartaNoPenales'];
        }

        if ($this->buroCredito_update != '') {
            $this->buroCredito_update = $this->buroCredito_update->storeAs('public/nuevoIngreso/' . $this->curpString, '13.-buroDeCredito.pdf');
        } else {
            $this->buroCredito_update = $this->revisionDoc[0]['buroCredito'];
        }

        $this->actaHijos_update = json_encode($rutaActaHijo);
        $this->cartaRecomendacion_update = json_encode($rutaRecomendacion);

        $actualizar = Nuevo_ingreso::where('curp', $this->curpString)->update([
            'curpDocumento' => $this->curp,
            'actaNacimiento' => $this->actaNac,
            'constanciaEstudios' => $this->Estudios,
            'rfcDocumento' => $this->rfc,
            'altaImssDoc' => $this->imss,
            'comprobanteDomicilio' => $this->domicilio,
            'actasHijo' => $this->actaHijos_update,
            'cartasRecomendacion' => $this->cartaRecomendacion_update,
            'cartillaMilitar' => $this->cartillaMilitar_update,
            'cartaNoPenales' => $this->cartaNoPenales_update,
            'credencialIFE' => $this->credencialIFE,
            'buroCredito' => $this->buroCredito_update
        ]);

        if ($actualizar) {
            $this->flash('success', 'Se ha guardado correctamente', [
                'position' =>  'top-end',
                'timer' =>  3500,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
            return redirect()->to('/actualizar/nuevo-ingreso/' . $this->idNi);
        }
    }
}
