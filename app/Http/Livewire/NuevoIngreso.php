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
            $this->resetErrorBag();
            $this->validateData();

            $this->currentStep++;
            $this->curpValida = false;
        }else{
            session()->flash('message', 'La CURP ya se encuentra registrada');
            return redirect()->to('/nuevo-ingreso');
        }
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
        if ($this->currentStep === 1) {
            $this->validate(
                ['curp' =>'required|regex:/^([a-zA-Z0-9]+)$/'],
                ['curp.required'=>'La CURP no puede permanecer vacia','curp.regex'=>'Solo puede contener letras y numeros']
            );
        }elseif($this->currentStep === 2){

            if (empty($this->nombre_2)) {
                $this->validate(
                    [
                        'nombre_1'=>'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
                        'ap_paterno'=>'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
                        'ap_materno'=>'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
                        'fecha_nacimiento'=>'required|date',
                        'genero_id'=>'required',
                    ],
                    [
                        'nombre_1.required'=>'Este campo no puede permanecer vacío',
                        'nombre_1.regex'=>'Solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ',
    
                        'ap_paterno.required'=>'Este campo no puede permanecer vacío',
                        'ap_paterno.regex'=>'Solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ',
                        
                        'ap_materno.required'=>'Este campo no puede permanecer vacío',
                        'ap_materno.regex'=>'Solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ',
                        
                        'fecha_nacimiento.required'=>'Este campo no puede permanecer vacío',
                        'genero_id'=>'Esta opción no puede permanecer vacía',
                    ],
    
                );
            } else {
                $this->validate(
                    [
                        'nombre_1'=>'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
                        'nombre_2'=>'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
                        'ap_paterno'=>'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
                        'ap_materno'=>'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
                        'fecha_nacimiento'=>'required|date',
                        'genero_id'=>'required',
                    ],
                    [
                        'nombre_1.required'=>'Este campo no puede permanecer vacío',
                        'nombre_1.regex'=>'Solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ',

                        'nombre_2.regex'=>'Solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ',
    
                        'ap_paterno.required'=>'Este campo no puede permanecer vacío',
                        'ap_paterno.regex'=>'Solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ',
                        
                        'ap_materno.required'=>'Este campo no puede permanecer vacío',
                        'ap_materno.regex'=>'Solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ',
                        
                        'fecha_nacimiento.required'=>'Este campo no puede permanecer vacío',
                        'genero_id'=>'Esta opción no puede permanecer vacía',
                    ],
    
                );
            }
            
        }elseif($this->currentStep === 3){
            $this->validate(
                [
                    'estado_civil_id'=>'required',
                    'paternidad_id'=>'required',
                    'curpDoc'=>'required|mimes:pdf|max:5120',
                    'actaNacimiento'=>'required|mimes:pdf|max:5120'
                ],
                [
                    'estado_civil_id.required'=>'Esta opción no puede permanecer vacía',
                    'paternidad_id.required'=>'Esta opción no puede permanecer vacía',
                    'curpDoc.required'=>'Debes seleccionar un archivo',
                    'curpDoc.mimes'=>'Debe ser un archivo con formato: pdf',
                    'actaNacimiento.required'=>'Debes seleccionar un archivo',
                    'actaNacimiento.mimes'=>'Debe ser un archivo con formato: pdf',
                ],
                
            );
        }elseif($this->currentStep === 4){
            $this->validate(
                [
                    'rfc'=>'required|regex:/^([a-zA-Z0-9]+)$/',
                    'rfcDoc'=>'required|mimes:pdf|max:5120',
                    'no_social_social'=>'required|regex:/^([0-9]+)$/',
                    'altaImssDoc'=>'required|mimes:pdf|max:5120',
                    'credencialIFE'=>'required|mimes:pdf|max:5120',
                    'cartillaMilitar'=>'required|mimes:pdf|max:5120'
                ],
                [
                    'rfc.required'=>'Este campo no puede permanecer vacío',
                    'rfc.regex'=>'Solo puede contener letras y numeros',

                    'rfcDoc.required'=>'Debes seleccionar un archivo',
                    'rfDoc.mimes'=>'Debe ser un archivo con formato: pdf',
                    
                    'no_social_social.required'=>'Este campo no puede permanecer vacío',
                    'altaImssDoc.required'=>'Debes seleccionar un archivo',
                    'altaImssDoc.mimes'=>'Debe ser un archivo con formato: pdf',

                    'credencialIFE.required'=>'Debes seleccionar un archivo',
                    'altaImssDoc.mimes'=>'Debe ser un archivo con formato: pdf',

                    'cartillaMilitar.required'=>'Debes seleccionar un archivo',
                    'cartillaMilitar.mimes'=>'Debe ser un archivo con formato: pdf'
                ],
            );
        }elseif($this->currentStep === 5){
            $this->validate(
                [
                    'tallaPantalon'=>'required',
                    'tallaPlayera'=>'required',
                    'tallazapatos'=>'required',
                ],
                [
                    'tallaPantalon.required'=>'Esta opción no puede permanecer vacía',
                    'tallaPlayera.required'=>'Esta opción no puede permanecer vacía',
                    'tallazapatos.required'=>'Esta opción no puede permanecer vacía',
                ],
                
            );
        }elseif($this->currentStep === 6){

            $this->validate(
                [
                    'domicilio'=>'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
                    'colonia'=>'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
                    'municipio'=>'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
                    'codigo_postal'=>'required|regex:/^([0-9]+)$/',
                    'estado'=>'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
                    'nacionalidad_id'=>'required',
                    'comprobranteDomicilio'=>'required|mimes:pdf|max:5120',
                ],
                [
                    'domicilio.required'=>'Este campo no puede permanecer vacío',
                    'domicilio.regex'=>'Solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ',
    
                    'colonia.required'=>'Este campo no puede permanecer vacío',
                    'colonia.regex'=>'Solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ',

                    'municipio.required'=>'Este campo no puede permanecer vacío',
                    'municipio.regex'=>'Solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ',

                    'codigo_postal.required'=>'Este campo no puede permanecer vacío',
                    'codigo_postal.regex'=>'Solo puede contener números',

                    'estado.required'=>'Este campo no puede permanecer vacío',
                    'estado.regex'=>'Solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ',
                    
                    'nacionalidad_id.required'=>'Esta opción no puede permanecer vacía',

                    'comprobranteDomicilio.required'=>'Debes seleccionar un archivo',
                    'comprobranteDomicilio.mimes'=>'Debe ser un archivo con formato: pdf'
                ],
                
            );
        }elseif($this->currentStep === 7){
            $this->validate(
                [
                    'tel_fijo'=>'required|regex:/^([0-9]+)$/',
                    'tel_movil'=>'required|regex:/^([0-9]+)$/',
                    'correo'=>'required|regex:/\S+@\S+\.\S+/',
                ],
                [
                    'tel_fijo.required'=>'Este campo no puede permanecer vacío',
                    'tel_fijo.regex'=>'Solo puede contener números',
                    
                    'tel_movil.required'=>'Este campo no puede permanecer vacío',
                    'tel_movil.regex'=>'Solo puede contener números',

                    'correo.required'=>'Este campo no puede permanecer vacío',
                    'correo.regex'=>'No es un email valido',
                ],
                
            );
        }elseif($this->currentStep === 8){

            if ($this->escolaridad_id >=5) {
                $this->validate(
                    [
                        'escolaridad_id'=>'required',
                        'constanciaEstudios'=>'required|mimes:pdf|max:5120',
                        'especialidadEstudios'=>'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
                    ],
                    [
                        'escolaridad_id.required'=>'Esta opción no puede permanecer vacía',

                        'constanciaEstudios.required'=>'Debes seleccionar un archivo',
                        'constanciaEstudios.mimes'=>'Debe ser un archivo con formato: pdf',
                        
                        'especialidadEstudios.required'=>'Este campo no puede permanecer vacío',
                        'especialidadEstudios.regex'=>'Solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ'
                    ],
                );
            } else {
                $this->validate(
                    [
                        'escolaridad_id'=>'required',
                        'constanciaEstudios'=>'required|mimes:pdf|max:5120'
                    ],
                    [
                        'escolaridad_id.required'=>'Esta opción no puede permanecer vacía',

                        'constanciaEstudios.required'=>'Debes seleccionar un archivo',
                        'constanciaEstudios.mimes'=>'Debe ser un archivo con formato: pdf'
                    ],
                    
                );
            }
            
        }
        
    }

    public function registro()
    {
        $this->resetErrorBag();

        if($this->currentStep === 9){
            $this->validate(
                [
                    'cvOsolicitudEmpleo'=>'required|mimes:pdf|max:5120',
                    'cartasRecomendacion'=>'required|array|min:1',
                    'cartaNoPenales'=>'required|mimes:pdf|max:5120',
                    'buroCredito'=>'required|mimes:pdf|max:5120',
                    'foto'=>'required|mimes:jpg,pjge,png|max:5120',
                ],
                [
                    'cvOsolicitudEmpleo.required'=>'Debes seleccionar un archivo',
                    'cvOsolicitudEmpleo.mimes'=>'Debe ser un archivo con formato: pdf',

                    'cartasRecomendacion.required'=>'Debes seleccionar uno ó más archivos',

                    'cartaNoPenales.required'=>'Debes seleccionar un archivo',
                    'cartaNoPenales.mimes'=>'Debe ser un archivo con formato: pdf',

                    'buroCredito.required'=>'Debes seleccionar un archivo',
                    'buroCredito.mimes'=>'Debe ser un archivo con formato: pdf',

                    'foto.required'=>'Debes seleccionar una imagen',
                    'foto.mimes'=>'Debe ser un archivo con formato: png,jpg o jpge'
                ],
            );
        }


        /* Cambiando nombre y rutas al guardar la información */

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
