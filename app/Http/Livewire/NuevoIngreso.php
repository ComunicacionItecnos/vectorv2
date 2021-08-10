<?php

namespace App\Http\Livewire;

use App\Models\Estado_civil;
use App\Models\Estados;
use App\Models\Genero;
use App\Models\Municipio;
use App\Models\Nacionalidad;
use App\Models\Nuevo_ingreso;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

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
    public $no_social_social;
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

    public $curpValida;
    public $totalSteps = 10;
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
        $this->estado = $this->estado;
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
            if ($this->genero_id == 1) {
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
                        'credencialIFE.mimes'=>'Debe ser un archivo con formato: pdf',
    
                        'cartillaMilitar.required'=>'Debes seleccionar un archivo',
                        'cartillaMilitar.mimes'=>'Debe ser un archivo con formato: pdf'
                    ],
                );
            }else{
                $this->validate(
                    [
                        'rfc'=>'required|regex:/^([a-zA-Z0-9]+)$/',
                        'rfcDoc'=>'required|mimes:pdf|max:5120',
                        'no_social_social'=>'required|regex:/^([0-9]+)$/',
                        'altaImssDoc'=>'required|mimes:pdf|max:5120',
                        'credencialIFE'=>'required|mimes:pdf|max:5120'
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
                        'credencialIFE.mimes'=>'Debe ser un archivo con formato: pdf'
                    ],
                );
            }
            
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
                    'codigo_postal'=>'required|regex:/^([0-9]+)$/',
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
                    'pais.required'=>'Este cmapo no puede permanecer vacio',
                    'estado.required'=>'Este campo no puede permanecer vacío',
                    
                    'comprobranteDomicilio.required'=>'Debes seleccionar un archivo',
                    'comprobranteDomicilio.mimes'=>'Debe ser un archivo con formato: pdf'
                ],
                
            );
        }elseif($this->currentStep === 8){
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
        }elseif($this->currentStep === 9){

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

        if($this->currentStep === 10){
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

        /* Asignando las carpetas donde se guardaran los docuemntos del registro */
        $this->curpDoc = $this->curpDoc->storeAs('public/nuevoIngreso/'.$this->curp,'1.-CURP.pdf');
        
        $this->actaNacimiento = $this->actaNacimiento->storeAs('public/nuevoIngreso/'.$this->curp,'2.-actaDeNacimiento.pdf');
        $this->constanciaEstudios = $this->constanciaEstudios->storeAs('public/nuevoIngreso/'.$this->curp,'3.-constanciaDeEstudios.pdf');

        if (empty( $this->actaMatrimonio) ) {
            $this->actaMatrimonio = null;            
        }else{
            $this->actaMatrimonio = $this->actaMatrimonio->storeAs('public/nuevoIngreso/'.$this->curp,'4.-actaDeMatrimonio.pdf');
        }

        $this->rfcDoc = $this->rfcDoc->storeAs('public/nuevoIngreso/'.$this->curp,'5.-RFC.pdf');
        $this->altaImssDoc = $this->altaImssDoc->storeAs('public/nuevoIngreso/'.$this->curp,'6.-altaDelImss.pdf');
        $this->comprobranteDomicilio = $this->comprobranteDomicilio->storeAs('public/nuevoIngreso/'.$this->curp,'7.-comprobanteDeDomicilio.pdf');

        if ($this->actasHijo == []) {
            $rutaActaHijo = null;
        }else{
            for ($i=0; $i < count($this->actasHijo) ; $i++) { 
                $rutaActasHijos2 = $this->actasHijo[$i]->storeAs('public/nuevoIngreso/'.$this->curp.'/8.-actasHijos','actaDeHijo'.$i.'.pdf');
                $rutaActaHijo[] = $rutaActasHijos2;
            }
        }
        
        if ($this->cartasRecomendacion == '') {
            $rutaRecomendacion = null;
        }else{
            for ($i=0; $i < count($this->cartasRecomendacion) ; $i++) { 
                $rutaRecomendacion2 = $this->cartasRecomendacion[$i]->storeAs('public/nuevoIngreso/'.$this->curp.'/9.-cartasRecomendacion','cartaDeRecomendacion'.$i.'.pdf');
                $rutaRecomendacion[] = $rutaRecomendacion2; 
            }
        }
        $this->cartillaMilitar = $this->cartillaMilitar->storeAs('public/nuevoIngreso/'.$this->curp,'10.-cartillaMilitar.pdf');
        $this->cartaNoPenales = $this->cartaNoPenales->storeAs('public/nuevoIngreso/'.$this->curp,'11.-cartaDeAntecedentesNoPenales.pdf');
        $this->credencialIFE = $this->credencialIFE->storeAs('public/nuevoIngreso/'.$this->curp,'12.-credencialIFE.pdf');
        $this->buroCredito = $this->buroCredito->storeAs('public/nuevoIngreso/'.$this->curp,'13.-buroDeCredito.pdf');
        $this->foto = $this->foto->storeAs('public/nuevoIngreso/'.$this->curp,'14.-foto.'.$this->foto->extension());
        $this->cvOsolicitudEmpleo = $this->cvOsolicitudEmpleo->storeAs('public/nuevoIngreso/'.$this->curp,'15.-cvOsolicitudDeEmpleo.pdf');


        Nuevo_ingreso::create([
            'curp'=>strtoupper($this->curp),
            'curpDocumento'=>$this->curpDoc,
            'nombre_1'=>$this->nombre_1,
            'nombre_2'=>$this->nombre_2,
            'ap_paterno'=>$this->ap_paterno,
            'ap_materno'=>$this->ap_materno,
            'fecha_nacimiento'=>$this->fecha_nacimiento,
            'actaNacimiento'=>$this->actaNacimiento,
            'escolaridad_id'=>$this->escolaridad_id,
            'constanciaEstudios'=>$this->constanciaEstudios,
            'especialidadEstudios'=>$this->especialidadEstudios,
            'genero_id'=>$this->genero_id,
            'estado_civil_id'=>$this->estado_civil_id,
            'actaMatrimonio'=>$this->actaMatrimonio,
            'rfc'=>strtoupper($this->rfc),
            'rfcDocumento'=>$this->rfcDoc,
            'no_seguro_social'=>$this->no_social_social,
            'altaImssDoc'=>$this->altaImssDoc,
            'calle'=>$this->domicilio,
            'colonia'=>$this->colonia,
            'municipio_id'=>$this->municipio,
            'estado_id'=>$this->estado,
            'pais'=>$this->pais[0]->id,
            'nacionalidad_id'=>$this->nacionalidad_id,
            'codigo_postal'=>$this->codigo_postal,
            'comprobanteDomicilio'=>$this->comprobranteDomicilio,
            'paternidad_id'=>$this->paternidad_id,
            'actasHijo'=>json_encode($rutaActaHijo),
            'cartasRecomendacion'=> json_encode($rutaRecomendacion),
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
            'numInt'=>$this->numeroInterior,
        ]);

        $this->flash('success', 'El colaborador se ha actualizado con éxito', [
            'position' =>  'top-end',
            'timer' =>  3500,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
        ]);
        return redirect()->to('/nuevo-ingreso/');

    }

    public function abrirModal()
    {
        $this->modalAbrir = true;
    }

    public function cerrarModal(){
        $this->modalAbrir = false;
    }

}
