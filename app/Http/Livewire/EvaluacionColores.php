<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class EvaluacionColores extends Component
{
    public $fecha;

    public $totalSteps = 28;
    public $currentStep = 1;

    public $inicio = /* true */false;
    public $instruccion = false;

    public $question1   = [0=>'Rápido',1=>'Entusiasta',2=>'Lógico',3=>'Apacible'];
    public $marcadorQuestion1_0 = [], $marcadorQuestion1_1 = [], $marcadorQuestion1_2 = [], $marcadorQuestion1_3 = [];

    public $question2   = [0=>'Receptivo',1=>'Decidido',2=>'Bondadoso',3=>'Cauteloso'];
    public $question3   = [0=>'Tranquilo',1=>'Franco',2=>'Preciso',3=>'Amigable'];
    public $question4   = [0=>'Decisivo',1=>'Eloquente',2=>'Controlado',3=>'Tolerante'];
    public $question5   = [0=>'Minucioso',1=>'Moderado',2=>'Atrevido',3=>'Comunicativo'];
    public $question6   = [0=>'Investigador',1=>'Ameno',2=>'Ingenioso',3=>'Acepta riesgos'];
    public $question7   = [0=>'Expresivo',1=>'Dominante',2=>'Cuidadoso',3=>'Sensible'];
    public $question8   = [0=>'Introvertido',1=>'Extrovertido',2=>'Precavido',3=>'Impasible'];
    public $question9   = [0=>'Valeroso',1=>'Insistente',2=>'Discreto',3=>'Encantador'];
    public $question10  = [0=>'Perfeccionista',1=>'Anima a los demás',2=>'Valeroso',3=>'Pacifico'];
    public $question11  = [0=>'Osado',1=>'Reservado',2=>'Atento',3=>'Alegre'];
    public $question12  = [0=>'Gentil',1=>'Estimulante',2=>'Independiente',3=>'Perceptivo'];
    public $question13  = [0=>'Considerado',1=>'Sagaz',2=>'Contento',3=>'Competitivo'];
    public $question14  = [0=>'Meticuloso',1=>'Alentador',2=>'Obediente',3=>'Ideas firmes'];
    public $question15  = [0=>'Popular',1=>'Calmado',2=>'Tenaz',3=>'Reflexio'];
    public $question16  = [0=>'Audaz',1=>'Leal',2=>'Promotor',3=>'Analítico'];
    public $question17  = [0=>'Autosuficiente',1=>'Paciente',2=>'Certero',3=>'Sociable'];
    public $question18  = [0=>'Adaptable',1=>'Vivaz',2=>'Resuelto',3=>'Prevenido'];
    public $question19  = [0=>'Discerniente',1=>'Impetuoso',2=>'Agresivo',3=>'Amistoso'];
    public $question20  = [0=>'Compasivo',1=>'De trato fácil',2=>'Habla directo',3=>'Cauto'];
    public $question21  = [0=>'Persistente',1=>'Generoso',2=>'Evaluador',3=>'Animado'];
    public $question22  = [0=>'Impulsivo',1=>'Energico',2=>'Tranquilo',3=>'Cuida los detalles'];
    public $question23  = [0=>'Sitemático',1=>'Tolerante',2=>'Sociable',3=>'Viguroso'];
    public $question24  = [0=>'Cautivador',1=>'Exigente',2=>'Contento',3=>'Apegado a las normas'];
    public $question25  = [0=>'Le agrada descutir',1=>'Comedido',2=>'Metódico',3=>'Desenvuelto'];
    public $question26  = [0=>'Ecuánime',1=>'Jovial',2=>'Directo',3=>'Preciso'];
    public $question27  = [0=>'Cuidadoso',1=>'Amable',2=>'Inquieto',3=>'Eloquente'];
    public $question28  = [0=>'Prudente',1=>'Pionero',2=>'Espontaneo',3=>'Colaborador'];

    public function mount()
    {
        $this->fecha = Carbon::now();
        $this->fecha = $this->fecha->format('d-m-y');
    
        $this->currentStep = 1;
        /* dd( count($this->marcadorQuestion1), $this->marcadorQuestion1 ); */
    }

    public function render()
    {
        return view('livewire.evaluacion-colores')->layout('layouts.guest');
    }


    public function increaseStep()
    {

        dd( $this->noMasDeDos( [$this->marcadorQuestion1_0,$this->marcadorQuestion1_1, $this->marcadorQuestion1_2, $this->marcadorQuestion1_3] ) );

        /* $this->resetErrorBag(); */
        /* $this->validateData(); */
        
        /*$this->currentStep++;
    
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        } */
    }

    public function ocultarInicio(){
        $this->inicio = false;
        $this->instruccion = true;
    }

    public function ocultarInstuccion(){
        $this->instruccion = false;
    }

    public function noMasDeDos($valor)
    {
        /* return $valor; */
        $contadorMas = 0;
        $contadorMenos = 0;
        $contarNull = 0;

        $msj = '';

        for ($i=0; $i < count($valor) ; $i++) {

            /* if ( count($valor[$i]) == 1) {
                return ['if',$valor[$i] ];
            }else{
                return $valor[$i] = [];
            } */

            if($valor[$i] == 1){
                $contadorMas++;
            }elseif($valor[$i] == 0){
                $contadorMenos++;
            }elseif($valor[$i] == null || empty($valor[$i])){
                $contarNull++;
            }
        }

        if($contarNull > 2){
            $msj = 'No has seleccionado nada';
        }elseif($contadorMas > 2 || $contadorMenos > 2){
            $msj =  'Solo puedes escoger dos';
        }elseif( ($contadorMas == 1 || $contadorMas == 2) || ($contadorMenos == 1 || $contadorMenos == 2 )){
            $msj= 'correcto solo selccionaste 2';
        }

        return 'nulos:'.$contarNull.' contarMas:'.$contadorMas.' contarMenos:'.$contadorMenos.'    MENSAJE: '.$msj;

    }




}