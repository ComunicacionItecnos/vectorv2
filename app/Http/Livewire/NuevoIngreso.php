<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\Genero;
use App\Models\Estados;
use Livewire\Component;
use App\Models\Municipio;
use App\Models\Estado_civil;
use App\Models\Nacionalidad;
use App\Models\Nuevo_ingreso;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

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
    public $no_seguro_social;
    public $altaImssDoc;
    public $domicilio;
    public $numeroExterior;
    public $numeroInterior;
    public $colonia;
    public $municipio_id;
    public $municipio;
    public $estado;
    public $estado_id;
    public $pais_id;
    public $pais;
    public $nacionalidad;
    public $nacionalidad_id;
    public $codigo_postal;
    public $comprobranteDomicilio;
    public $paternidad_id;
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
    public $tallazapatos;

    /* Contacto emergencia desde la tabla */
    public $nombreEmergencia1;
    public $parentescoEmergencia1;
    public $telEmergencia1;
    public $domicilioEmergencia1;

    public $nombreEmergencia2;
    public $parentescoEmergencia2;
    public $telEmergencia2;
    public $domicilioEmergencia2;

    public $curpValida;

    public $totalSteps = 11;
    public $currentStep = 1;

    /* Abrir modal */
    public $modalAbrir = false;

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

    public function mount()
    {
        $this->estado_civil = Estado_civil::all();
        $this->nacionalidad = Nacionalidad::where('nacionalidad','!=','NULL')->orderBy('pais','ASC')->get();
        $this->pais = Nacionalidad::where('id','144')->get();
        $this->genero = Genero::all();
        $this->estado_id = Estados::where('pais','144')->get();
        $this->municipio_id = Municipio::where('estado_id',$this->estado)->get();
        $this->currentStep = 1;
        $this->curpValida = '';
    }

    public function updated(){
        /* Input files resetar a null cuando cambien a vacios u otra opcion que no sea valida */
        $this->actaMatrimonio = ($this->estado_civil_id != 2) ? $this->actaMatrimonio = '' : $this->actaMatrimonio;
        $this->actasHijo = ($this->paternidad_id != 1) ? $this->actasHijo = [] :  $this->actasHijo;

        $this->municipio_id = Municipio::where('estado_id',$this->estado)->get();
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
            session()->flash('message', 'Este CURP ya se encuentra registrado');
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
                ['curp' =>'required|regex:/^([a-zA-Z0-9]+)$/|min:18|max:18'],
                [
                    'curp.required'=>'Este campo no puede permanecer vacío',
                    'curp.regex'=>'Solo puede contener letras y números',
                    'curp.min'=>'Debe contener mínimo 18 caracteres',
                    'curp.max'=>'Debe contener maximo 18 caracteres'
                ]
            );
        }elseif($this->currentStep === 3){

            if (empty($this->nombre_2)) {
                $this->validate(
                    [
                        'nombre_1'=>'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
                        'ap_paterno'=>'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
                        'ap_materno'=>'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
                        'fecha_nacimiento'=>'required|date',
                        'genero_id'=>'required',
                        'nacionalidad_id'=>'required'

                    ],
                    [
                        'nombre_1.required'=>'Este campo no puede permanecer vacío',
                        'nombre_1.regex'=>'Solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ',
    
                        'ap_paterno.required'=>'Este campo no puede permanecer vacío',
                        'ap_paterno.regex'=>'Solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ',
                        
                        'ap_materno.required'=>'Este campo no puede permanecer vacío',
                        'ap_materno.regex'=>'Solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ',
                        
                        'fecha_nacimiento.required'=>'Este campo no puede permanecer vacío',
                        'genero_id.required'=>'Esta opción no puede permanecer vacía',
                        'nacionalidad_id.required'=>'Esta opción no puede permanecer vacía'
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
                        'nacionalidad_id'=>'required'
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
                        'nacionalidad_id.required'=>'Esta opción no puede permanecer vacía'
                    ],
    
                );
            }
            
        }elseif($this->currentStep === 4){
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
        }elseif($this->currentStep === 5){
            $this->validate(
                [
                    'rfc'=>'required|regex:/^([a-zA-Z0-9]+)$/|min:12|max:13|unique:nuevo_ingresos,rfc',
                    'rfcDoc'=>'required|mimes:pdf|max:5120',
                    'no_seguro_social'=>'required|regex:/^([0-9]+)$/|min:11|max:11|unique:nuevo_ingresos,no_seguro_social',
                    'altaImssDoc'=>'required|mimes:pdf|max:5120',
                    'credencialIFE'=>'required|mimes:pdf|max:5120'
                ],
                [
                    'rfc.required'=>'Este campo no puede permanecer vacío',
                    'rfc.regex'=>'Solo puede contener letras y numeros',
                    'rfc.min'=>'Debe contener mínimo 13 caracteres',
                    'rfc.max'=>'Debe contener maximo 13 caracteres',
                    'rfc.unique'=>'Este RFC ya se encuentra registrado',

                    'rfcDoc.required'=>'Debes seleccionar un archivo',
                    'rfDoc.mimes'=>'Debe ser un archivo con formato: pdf',
                    
                    'no_seguro_social.required'=>'Este campo no puede permanecer vacío',
                    'no_seguro_social.regex'=>'Solo puede contener números',
                    'no_seguro_social.min'=>'Debe contener mínimo 11 caracteres',
                    'no_seguro_social.max'=>'Debe contener maximo 11 caracteres',
                    'no_seguro_social.unique'=>'El número de seguro social ya se encuentra registrado',

                    'altaImssDoc.required'=>'Debes seleccionar un archivo',
                    'altaImssDoc.mimes'=>'Debe ser un archivo con formato: pdf',

                    'credencialIFE.required'=>'Debes seleccionar un archivo',
                    'credencialIFE.mimes'=>'Debe ser un archivo con formato: pdf'
                ],
            );
            
        }elseif($this->currentStep === 6){
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
        }elseif($this->currentStep === 7){

            $this->validate(
                [
                    'domicilio'=>'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
                    'colonia'=>'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
                    'municipio'=>'required',
                    'codigo_postal'=>'required|regex:/^([0-9]+)$/|min:5|max:5',
                    'pais'=>'required',
                    'estado'=>'required',
                    'comprobranteDomicilio'=>'required|mimes:pdf|max:5120',
                ],
                [
                    'domicilio.required'=>'Este campo no puede permanecer vacío',
                    'domicilio.regex'=>'Solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ',
    
                    'colonia.required'=>'Este campo no puede permanecer vacío',
                    'colonia.regex'=>'Solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ',

                    'municipio.required'=>'Este campo no puede permanecer vacío',

                    'codigo_postal.required'=>'Este campo no puede permanecer vacío',
                    'codigo_postal.regex'=>'Solo puede contener números',
                    'codigo_postal.min'=>'Debe contener mínimo 5 números',
                    'codigo_postal.max'=>'Debe contener maximo 5 números',

                    'pais.required'=>'Este cmapo no puede permanecer vacio',
                    'estado.required'=>'Este campo no puede permanecer vacío',
                    
                    'comprobranteDomicilio.required'=>'Debes seleccionar un archivo',
                    'comprobranteDomicilio.mimes'=>'Debe ser un archivo con formato: pdf'
                ],
                
            );
        }elseif($this->currentStep === 8){
            $this->validate(
                [
                    'tel_fijo'=>'required|regex:/^([0-9]+)$/|min:10|max:10',
                    'tel_movil'=>'required|regex:/^([0-9]+)$/|min:10|max:10',
                    'correo'=>'required|regex:/\S+@\S+\.\S+/',
                ],
                [
                    'tel_fijo.required'=>'Este campo no puede permanecer vacío',
                    'tel_fijo.regex'=>'Solo puede contener números',
                    'tel_fijo.min'=>'Debe contener mínimo 10 números',
                    'tel_fijo.max'=>'Debe contener maximo 10 números',
                    
                    'tel_movil.required'=>'Este campo no puede permanecer vacío',
                    'tel_movil.regex'=>'Solo puede contener números',
                    'tel_movil.min'=>'Debe contener mínimo 10 números',
                    'tel_movil.max'=>'Debe contener maximo 10 números',

                    'correo.required'=>'Este campo no puede permanecer vacío',
                    'correo.regex'=>'No es un email valido',
                ],
                
            );
        }elseif($this->currentStep === 9){
            $this->validate(
                [
                    'nombreEmergencia1'=>'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
                    'parentescoEmergencia1'=>'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
                    'telEmergencia1'=>'required|regex:/^([0-9]+)$/|min:10|max:10|different:tel_movil',
                    'domicilioEmergencia1'=>'required',

                    'nombreEmergencia2'=>'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
                    'parentescoEmergencia2'=>'required|regex:/^([a-zA-ZùÙüÜäàáëèéïìíöòóüùúÄÀÁËÈÉÏÌÍÖÒÓÜÚñÑ\s]+)$/',
                    'telEmergencia2'=>'required|regex:/^([0-9]+)$/|min:10|max:10|different:telEmergencia1',
                    'domicilioEmergencia2'=>'required',
                ],
                [
                    'nombreEmergencia1.required'=>'Este campo no puede permanecer vacío',
                    'nombreEmergencia1.regex'=>'Solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ',
                    
                    'parentescoEmergencia1.required'=>'Este campo no puede permanecer vacío',
                    'parentescoEmergencia1.regex'=>'Solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ',

                    'telEmergencia1.required'=>'Este campo no puede permanecer vacío',
                    'telEmergencia1.regex'=>'Solo puede contener números',
                    'telEmergencia1.min'=>'Debe contener minimo 10 números',
                    'telEmergencia1.max'=>'Debe contener maximo 10 números',
                    'telEmergencia1.different'=>'Debe ser diferente al número de telefono dado en datos de contacto',

                    'domicilioEmergencia1.required'=>'Este campo no puede permanecer vacío',

                    'nombreEmergencia2.required'=>'Este campo no puede permanecer vacío',
                    'nombreEmergencia2.regex'=>'Solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ',
                    
                    'parentescoEmergencia2.required'=>'Este campo no puede permanecer vacío',
                    'parentescoEmergencia2.regex'=>'Solo puede contener letras mayúsculas y minúsculas con o sin tilde/diéresis así como la letra ñ',

                    'telEmergencia2.required'=>'Este campo no puede permanecer vacío',
                    'telEmergencia2.regex'=>'Solo puede contener números',
                    'telEmergencia2.min'=>'Debe contener minimo 10 números',
                    'telEmergencia2.max'=>'Debe contener maximo 10 números',
                    'telEmergencia2.different'=>'Debe ser diferente número de telefono dado en contacto de emergencia 1',

                    'domicilioEmergencia2.required'=>'Este campo no puede permanecer vacío',
                ],
            );
        }elseif($this->currentStep === 10){

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

        if($this->currentStep === 11){
            $this->validate(
                [
                    'cvOsolicitudEmpleo'=>'required|mimes:pdf|max:5120',
                    // 'cartasRecomendacion'=>'required|array|min:1',
                    // 'cartaNoPenales'=>'required|mimes:pdf|max:5120',
                    // 'buroCredito'=>'required|mimes:pdf|max:5120',
                    'foto'=>'required|mimes:jpg,pjge,png|max:5120',
                ],
                [
                    'cvOsolicitudEmpleo.required'=>'Debes seleccionar un archivo',
                    'cvOsolicitudEmpleo.mimes'=>'Debe ser un archivo con formato: pdf',

                    // 'cartasRecomendacion.required'=>'Debes seleccionar uno ó más archivos',

                    // 'cartaNoPenales.required'=>'Debes seleccionar un archivo',
                    // 'cartaNoPenales.mimes'=>'Debe ser un archivo con formato: pdf',

                    // 'buroCredito.required'=>'Debes seleccionar un archivo',
                    // 'buroCredito.mimes'=>'Debe ser un archivo con formato: pdf',

                    'foto.required'=>'Debes seleccionar una imagen',
                    'foto.mimes'=>'Debe ser un archivo con formato: png, jpg o jpge'
                ],
            );
        }

        try {

            DB::transaction(function () {
                /* Archivos */
                $this->curp = strtoupper( $this->curp );
                    
                /* Asignando las carpetas donde se guardaran los docuemntos del registro */
                $this->curpDoc = $this->curpDoc->storeAs('public/nuevoIngreso/'.$this->curp,'01.-CURP.pdf');
                $this->actaNacimiento = $this->actaNacimiento->storeAs('public/nuevoIngreso/'.$this->curp,'02.-actaDeNacimiento.pdf');
                $this->constanciaEstudios = $this->constanciaEstudios->storeAs('public/nuevoIngreso/'.$this->curp,'03.-constanciaDeEstudios.pdf');

                if (empty( $this->actaMatrimonio) ) {
                        $this->actaMatrimonio = NULL;            
                }else{
                        $this->actaMatrimonio = $this->actaMatrimonio->storeAs('public/nuevoIngreso/'.$this->curp,'04.-actaDeMatrimonio.pdf');
                }

                $this->rfcDoc = $this->rfcDoc->storeAs('public/nuevoIngreso/'.$this->curp,'05.-RFC.pdf');
                $this->altaImssDoc = $this->altaImssDoc->storeAs('public/nuevoIngreso/'.$this->curp,'06.-altaDelImss.pdf');
                $this->comprobranteDomicilio = $this->comprobranteDomicilio->storeAs('public/nuevoIngreso/'.$this->curp,'07.-comprobanteDeDomicilio.pdf');

                if ($this->actasHijo == []) {
                        $rutaActaHijo = NULL;
                }else{
                        for ($i=0; $i < count($this->actasHijo) ; $i++) { 
                            $rutaActasHijos2 = $this->actasHijo[$i]->storeAs('public/nuevoIngreso/'.$this->curp.'/08.-actasHijos','actaDeHijo'.$i.'.pdf');
                            /* $rutaActaHijo = array(); */
                            $rutaActaHijo[] = $rutaActasHijos2;
                        }
                }
                    
                if ($this->cartasRecomendacion == []) {
                        $rutaRecomendacion = NULL;
                }else{
                        for ($i=0; $i < count($this->cartasRecomendacion) ; $i++) { 
                            $rutaRecomendacion2 = $this->cartasRecomendacion[$i]->storeAs('public/nuevoIngreso/'.$this->curp.'/09.-cartasRecomendacion','cartaDeRecomendacion'.$i.'.pdf');
                            /* $rutaRecomendacion = array(); */
                            $rutaRecomendacion[] = $rutaRecomendacion2; 
                        }
                }

                if ($this->cartillaMilitar != '') {
                        $this->cartillaMilitar = $this->cartillaMilitar->storeAs('public/nuevoIngreso/'.$this->curp,'10.-cartillaMilitar.pdf');
                } else {
                        $this->cartillaMilitar = NULL;
                }
                    
                if ($this->cartaNoPenales != '') {
                        $this->cartaNoPenales = $this->cartaNoPenales->storeAs('public/nuevoIngreso/'.$this->curp,'11.-cartaDeAntecedentesNoPenales.pdf');
                }else{
                        $this->cartaNoPenales = NULL;
                }
                    
                $this->credencialIFE = $this->credencialIFE->storeAs('public/nuevoIngreso/'.$this->curp,'12.-credencialIFE.pdf');
                    
                if ($this->buroCredito != '') {
                        $this->buroCredito = $this->buroCredito->storeAs('public/nuevoIngreso/'.$this->curp,'13.-buroDeCredito.pdf');
                } else {
                        $this->buroCredito = NULL;
                }

                $this->foto = $this->foto->storeAs('public/nuevoIngreso/'.$this->curp,'14.-foto.'.$this->foto->extension());
                $this->cvOsolicitudEmpleo = $this->cvOsolicitudEmpleo->storeAs('public/nuevoIngreso/'.$this->curp,'15.-cvOsolicitudDeEmpleo.pdf');
                    
                /* Insercion */
                $nuevo_ingreso = Nuevo_ingreso::create([
                        'curp'=>$this->curp,
                        'curpDocumento'=>$this->curpDoc,
                        'nombre_1'=> ucwords(strtolower($this->nombre_1)),
                        'nombre_2'=>ucwords(strtolower($this->nombre_2)),
                        'ap_paterno'=>ucwords(strtolower($this->ap_paterno)),
                        'ap_materno'=>ucwords(strtolower($this->ap_materno)),
                        'fecha_nacimiento'=>$this->fecha_nacimiento,
                        'actaNacimiento'=>$this->actaNacimiento,
                        'escolaridad_id'=>$this->escolaridad_id,
                        'constanciaEstudios'=>$this->constanciaEstudios,
                        'especialidadEstudios'=>ucwords(strtolower($this->especialidadEstudios)),
                        'genero_id'=>$this->genero_id,
                        'estado_civil_id'=>$this->estado_civil_id,
                        'actaMatrimonio'=>$this->actaMatrimonio,
                        'rfc'=>strtoupper($this->rfc),
                        'rfcDocumento'=>$this->rfcDoc,
                        'no_seguro_social'=>$this->no_seguro_social,
                        'altaImssDoc'=>$this->altaImssDoc,
                        'calle'=>ucwords(strtolower($this->domicilio)),
                        'colonia'=>ucwords(strtolower($this->colonia)),
                        'municipio_id'=>$this->municipio,
                        'estado_id'=>$this->estado,
                        'pais'=>$this->pais[0]->id,
                        'nacionalidad_id'=>$this->nacionalidad_id,
                        'codigo_postal'=>$this->codigo_postal,
                        'comprobanteDomicilio'=>$this->comprobranteDomicilio,
                        'paternidad_id'=>$this->paternidad_id,
                        'actasHijo'=> ($rutaActaHijo == NULL) ? NULL : json_encode($rutaActaHijo),
                        'cartasRecomendacion'=> ($rutaRecomendacion == NULL) ? NULL :json_encode($rutaRecomendacion),
                        'cartillaMilitar'=>$this->cartillaMilitar,
                        'cartaNoPenales'=>$this->cartaNoPenales,
                        'credencialIFE'=>$this->credencialIFE,
                        'buroCredito'=>$this->buroCredito,
                        'foto'=>$this->foto,       
                        'correo'=>$this->correo,
                        'tel_fijo'=>$this->tel_fijo,
                        'tel_movil'=>$this->tel_movil,
                        'cvOsolicitudEmpleo'=>$this->cvOsolicitudEmpleo,
                        'tallaPantalon'=>$this->tallaPantalon,
                        'tallaPlayera'=>$this->tallaPlayera,
                        'TallaZapatos'=>$this->tallazapatos,
                        'numExt'=>$this->numeroExterior,
                        'numInt'=>$this->numeroInterior
                ]);
        
                DB::table('contactos_emergencia_nuevos')->insert([
                        [
                            'id_nuevoIngreso'=>$nuevo_ingreso->id,
                            'nombre'=>ucwords(strtolower($this->nombreEmergencia1)),
                            'parentesco'=>ucwords(strtolower($this->parentescoEmergencia1)),
                            'telefono'=>$this->telEmergencia1,
                            'domicilio'=>ucwords(strtolower($this->domicilioEmergencia1))
                        ],
                        [
                            'id_nuevoIngreso'=>$nuevo_ingreso->id,
                            'nombre'=>ucwords(strtolower($this->nombreEmergencia2)),
                            'parentesco'=>ucwords(strtolower($this->parentescoEmergencia2)),
                            'telefono'=>$this->telEmergencia2,
                            'domicilio'=>ucwords(strtolower($this->domicilioEmergencia2))
                        ],
                ]);

                if($this->cartaNoPenales == NULL){
                    DB::table('revision_docs')->insert([
                        'nuevo_ingreso_id'=>$nuevo_ingreso->id,
                        'areaRd'=>5,
                        'R_obscartaNoPenales' =>'Falta este documento',
                        'status'=>1
                    ]);
                }else{
                    DB::table('revision_docs')->insert([
                        'nuevo_ingreso_id'=>$nuevo_ingreso->id
                    ]);
                }
                

            });

            $this->flash('success', 'Tu información se ha registrado con éxito', [
                    'position' =>  'top-end',
                    'timer' =>  3500,
                    'toast' =>  true,
                    'text' =>  '',
                    'confirmButtonText' =>  'Ok',
                    'cancelButtonText' =>  'Cancel',
                    'showCancelButton' =>  false,
                    'showConfirmButton' =>  false,
            ]);
            return redirect()->to('/nuevo-ingreso');
        }catch (Exception $ex) {
            $this->alert('error', 'Ha ocurrido un error:'.$ex, [
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
        
    }

    public function abrirModal()
    {
        $this->modalAbrir = true;
    }

    public function cerrarModal(){
        $this->modalAbrir = false;
    }

}
