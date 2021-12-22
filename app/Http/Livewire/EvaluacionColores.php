<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Livewire\Component;

class EvaluacionColores extends Component
{
    public $fecha;

    public $totalSteps = 29;
    public $currentStep = 1;

    public $inicio = /* true */ false;
    public $instruccion = false;

    public $question1   = [0=>'Rápido',1=>'Entusiasta',2=>'Lógico',3=>'Apacible'];
    public $marcadorQuestion1_0 = [], $marcadorQuestion1_1 = [], $marcadorQuestion1_2 = [], $marcadorQuestion1_3 = [];

    public $question2   = [0=>'Receptivo',1=>'Decidido',2=>'Bondadoso',3=>'Cauteloso'];
    public $marcadorQuestion2_0 = [], $marcadorQuestion2_1 = [], $marcadorQuestion2_2 = [], $marcadorQuestion2_3 = [];

    public $question3   = [0=>'Tranquilo',1=>'Franco',2=>'Preciso',3=>'Amigable'];
    public $marcadorQuestion3_0 = [], $marcadorQuestion3_1 = [], $marcadorQuestion3_2 = [], $marcadorQuestion3_3 = [];

    public $question4   = [0=>'Decisivo',1=>'Eloquente',2=>'Controlado',3=>'Tolerante'];
    public $marcadorQuestion4_0 = [], $marcadorQuestion4_1 = [], $marcadorQuestion4_2 = [], $marcadorQuestion4_3 = [];

    public $question5   = [0=>'Minucioso',1=>'Moderado',2=>'Atrevido',3=>'Comunicativo'];
    public $marcadorQuestion5_0 = [], $marcadorQuestion5_1 = [], $marcadorQuestion5_2 = [], $marcadorQuestion5_3 = [];

    public $question6   = [0=>'Investigador',1=>'Ameno',2=>'Ingenioso',3=>'Acepta riesgos'];
    public $marcadorQuestion6_0 = [], $marcadorQuestion6_1 = [], $marcadorQuestion6_2 = [], $marcadorQuestion6_3 = [];

    public $question7   = [0=>'Expresivo',1=>'Dominante',2=>'Cuidadoso',3=>'Sensible'];
    public $marcadorQuestion7_0 = [], $marcadorQuestion7_1 = [], $marcadorQuestion7_2 = [], $marcadorQuestion7_3 = [];

    public $question8   = [0=>'Introvertido',1=>'Extrovertido',2=>'Precavido',3=>'Impasible'];
    public $marcadorQuestion8_0 = [], $marcadorQuestion8_1 = [], $marcadorQuestion8_2 = [], $marcadorQuestion8_3 = [];

    public $question9   = [0=>'Valeroso',1=>'Insistente',2=>'Discreto',3=>'Encantador'];
    public $marcadorQuestion9_0 = [], $marcadorQuestion9_1 = [], $marcadorQuestion9_2 = [], $marcadorQuestion9_3 = [];

    public $question10  = [0=>'Perfeccionista',1=>'Anima a los demás',2=>'Valeroso',3=>'Pacifico'];
    public $marcadorQuestion10_0 = [], $marcadorQuestion10_1 = [], $marcadorQuestion10_2 = [], $marcadorQuestion10_3 = [];

    public $question11  = [0=>'Osado',1=>'Reservado',2=>'Atento',3=>'Alegre'];
    public $marcadorQuestion11_0 = [], $marcadorQuestion11_1 = [], $marcadorQuestion11_2 = [], $marcadorQuestion11_3 = [];

    public $question12  = [0=>'Gentil',1=>'Estimulante',2=>'Independiente',3=>'Perceptivo'];
    public $marcadorQuestion12_0 = [], $marcadorQuestion12_1 = [], $marcadorQuestion12_2 = [], $marcadorQuestion12_3 = [];

    public $question13  = [0=>'Considerado',1=>'Sagaz',2=>'Contento',3=>'Competitivo'];
    public $marcadorQuestion13_0 = [], $marcadorQuestion13_1 = [], $marcadorQuestion13_2 = [], $marcadorQuestion13_3 = [];

    public $question14  = [0=>'Meticuloso',1=>'Alentador',2=>'Obediente',3=>'Ideas firmes'];
    public $marcadorQuestion14_0 = [], $marcadorQuestion14_1 = [], $marcadorQuestion14_2 = [], $marcadorQuestion14_3 = [];

    public $question15  = [0=>'Popular',1=>'Calmado',2=>'Tenaz',3=>'Reflexio'];
    public $marcadorQuestion15_0 = [], $marcadorQuestion15_1 = [], $marcadorQuestion15_2 = [], $marcadorQuestion15_3 = [];

    public $question16  = [0=>'Audaz',1=>'Leal',2=>'Promotor',3=>'Analítico'];
    public $marcadorQuestion16_0 = [], $marcadorQuestion16_1 = [], $marcadorQuestion16_2 = [], $marcadorQuestion16_3 = [];

    public $question17  = [0=>'Autosuficiente',1=>'Paciente',2=>'Certero',3=>'Sociable'];
    public $marcadorQuestion17_0 = [], $marcadorQuestion17_1 = [], $marcadorQuestion17_2 = [], $marcadorQuestion17_3 = [];

    public $question18  = [0=>'Adaptable',1=>'Vivaz',2=>'Resuelto',3=>'Prevenido'];
    public $marcadorQuestion18_0 = [], $marcadorQuestion18_1 = [], $marcadorQuestion18_2 = [], $marcadorQuestion18_3 = [];

    public $question19  = [0=>'Discerniente',1=>'Impetuoso',2=>'Agresivo',3=>'Amistoso'];
    public $marcadorQuestion19_0 = [], $marcadorQuestion19_1 = [], $marcadorQuestion19_2 = [], $marcadorQuestion19_3 = [];

    public $question20  = [0=>'Compasivo',1=>'De trato fácil',2=>'Habla directo',3=>'Cauto'];
    public $marcadorQuestion20_0 = [], $marcadorQuestion20_1 = [], $marcadorQuestion20_2 = [], $marcadorQuestion20_3 = [];

    public $question21  = [0=>'Persistente',1=>'Generoso',2=>'Evaluador',3=>'Animado'];
    public $marcadorQuestion21_0 = [], $marcadorQuestion21_1 = [], $marcadorQuestion21_2 = [], $marcadorQuestion21_3 = [];

    public $question22  = [0=>'Impulsivo',1=>'Energico',2=>'Tranquilo',3=>'Cuida los detalles'];
    public $marcadorQuestion22_0 = [], $marcadorQuestion22_1 = [], $marcadorQuestion22_2 = [], $marcadorQuestion22_3 = [];

    public $question23  = [0=>'Sitemático',1=>'Tolerante',2=>'Sociable',3=>'Viguroso'];
    public $marcadorQuestion23_0 = [], $marcadorQuestion23_1 = [], $marcadorQuestion23_2 = [], $marcadorQuestion23_3 = [];

    public $question24  = [0=>'Cautivador',1=>'Exigente',2=>'Contento',3=>'Apegado a las normas'];
    public $marcadorQuestion24_0 = [], $marcadorQuestion24_1 = [], $marcadorQuestion24_2 = [], $marcadorQuestion24_3 = [];

    public $question25  = [0=>'Le agrada descutir',1=>'Comedido',2=>'Metódico',3=>'Desenvuelto'];
    public $marcadorQuestion25_0 = [], $marcadorQuestion25_1 = [], $marcadorQuestion25_2 = [], $marcadorQuestion25_3 = [];

    public $question26  = [0=>'Ecuánime',1=>'Jovial',2=>'Directo',3=>'Preciso'];
    public $marcadorQuestion26_0 = [], $marcadorQuestion26_1 = [], $marcadorQuestion26_2 = [], $marcadorQuestion26_3 = [];

    public $question27  = [0=>'Cuidadoso',1=>'Amable',2=>'Inquieto',3=>'Eloquente'];
    public $marcadorQuestion27_0 = [], $marcadorQuestion27_1 = [], $marcadorQuestion27_2 = [], $marcadorQuestion27_3 = [];

    public $question28  = [0=>'Prudente',1=>'Pionero',2=>'Espontaneo',3=>'Colaborador'];
    public $marcadorQuestion28_0 = [], $marcadorQuestion28_1 = [], $marcadorQuestion28_2 = [], $marcadorQuestion28_3 = [];


    public $mostrarModal = false;
    public $titulomsj ='', $msj = '' ,$color ,$bgIcono ,$iconomsj ,$btnTexto;


    public $inicioCount, $finalCount,$Contador;


    public function mount()
    {
        $this->fecha = Carbon::now();
        $this->fecha = $this->fecha->format('d-m-y');
    
        $this->currentStep = 29;   
    }

    public function render()
    {
        return view('livewire.evaluacion-colores')->layout('layouts.guest');
    }

    public function cuentaAtras(){
        $this->inicioCount = now();

        if ($this->inicioCount->diffInSeconds($this->finalCount,false) <= 0) {
            $this->Contador = 'Sin tiempo';
            $this->mostrarModal = true;
            $this->titulomsj = 'Sin timepo';
            $this->bgIcono = 'bg-red-100';
            $this->iconomsj = '<svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>';
            $this->msj = 'Se acabado el tiempo ';
            $this->color = "bg-red-600 text-white hover:bg-red-700 focus:ring-red-500";
            $this->btnTexto = 'Cerrar';
            
        }else{
            $this->Contador = $this->finalCount->diffForHumans($this->inicioCount,[
                'options' =>Carbon::JUST_NOW,
                'syntax' => CarbonInterface::DIFF_ABSOLUTE,
                'parts' => 3,
                'short' => true
            ]);
        }

    }


    public function increaseStep()
    {
        if($this->currentStep == 1) {
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion1_0,$this->marcadorQuestion1_1, $this->marcadorQuestion1_2, $this->marcadorQuestion1_3] ));
        }elseif($this->currentStep == 2){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion2_0,$this->marcadorQuestion2_1, $this->marcadorQuestion2_2, $this->marcadorQuestion2_3] ));
        }elseif($this->currentStep == 3){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion3_0,$this->marcadorQuestion3_1, $this->marcadorQuestion3_2, $this->marcadorQuestion3_3] ));
        }elseif($this->currentStep == 4){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion4_0,$this->marcadorQuestion4_1, $this->marcadorQuestion4_2, $this->marcadorQuestion4_3] ));
        }elseif($this->currentStep == 5){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion5_0,$this->marcadorQuestion5_1, $this->marcadorQuestion5_2, $this->marcadorQuestion5_3] ));
        }elseif($this->currentStep == 6){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion6_0,$this->marcadorQuestion6_1, $this->marcadorQuestion6_2, $this->marcadorQuestion6_3] ));
        }elseif($this->currentStep == 7){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion7_0,$this->marcadorQuestion7_1, $this->marcadorQuestion7_2, $this->marcadorQuestion7_3] ));
        }elseif($this->currentStep == 8){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion8_0,$this->marcadorQuestion8_1, $this->marcadorQuestion8_2, $this->marcadorQuestion8_3] ));
        }elseif($this->currentStep == 9){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion9_0,$this->marcadorQuestion9_1, $this->marcadorQuestion9_2, $this->marcadorQuestion9_3] ));
        }elseif($this->currentStep == 10){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion10_0,$this->marcadorQuestion10_1, $this->marcadorQuestion10_2, $this->marcadorQuestion10_3] ));
        }elseif($this->currentStep == 11){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion11_0,$this->marcadorQuestion11_1, $this->marcadorQuestion11_2, $this->marcadorQuestion11_3] ));
        }elseif($this->currentStep == 12){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion12_0,$this->marcadorQuestion12_1, $this->marcadorQuestion12_2, $this->marcadorQuestion12_3] ));
        }elseif($this->currentStep == 13){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion13_0,$this->marcadorQuestion13_1, $this->marcadorQuestion13_2, $this->marcadorQuestion13_3] ));
        }elseif($this->currentStep == 14){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion14_0,$this->marcadorQuestion14_1, $this->marcadorQuestion14_2, $this->marcadorQuestion14_3] ));
        }elseif($this->currentStep == 15){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion15_0,$this->marcadorQuestion15_1, $this->marcadorQuestion15_2, $this->marcadorQuestion15_3] ));
        }elseif($this->currentStep == 16){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion16_0,$this->marcadorQuestion16_1, $this->marcadorQuestion16_2, $this->marcadorQuestion16_3] ));
        }elseif($this->currentStep == 17){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion17_0,$this->marcadorQuestion17_1, $this->marcadorQuestion17_2, $this->marcadorQuestion17_3] ));
        }elseif($this->currentStep == 18){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion18_0,$this->marcadorQuestion18_1, $this->marcadorQuestion18_2, $this->marcadorQuestion18_3] ));
        }elseif($this->currentStep == 19){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion19_0,$this->marcadorQuestion19_1, $this->marcadorQuestion19_2, $this->marcadorQuestion19_3] ));
        }elseif($this->currentStep == 20){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion20_0,$this->marcadorQuestion20_1, $this->marcadorQuestion20_2, $this->marcadorQuestion20_3] ));
        }elseif($this->currentStep == 21){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion21_0,$this->marcadorQuestion21_1, $this->marcadorQuestion21_2, $this->marcadorQuestion21_3] ));
        }elseif($this->currentStep == 22){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion22_0,$this->marcadorQuestion22_1, $this->marcadorQuestion22_2, $this->marcadorQuestion22_3] ));
        }elseif($this->currentStep == 23){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion23_0,$this->marcadorQuestion23_1, $this->marcadorQuestion23_2, $this->marcadorQuestion23_3] ));
        }elseif($this->currentStep == 24){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion24_0,$this->marcadorQuestion24_1, $this->marcadorQuestion24_2, $this->marcadorQuestion24_3] ));
        }elseif($this->currentStep == 25){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion25_0,$this->marcadorQuestion25_1, $this->marcadorQuestion25_2, $this->marcadorQuestion25_3] ));
        }elseif($this->currentStep == 26){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion26_0,$this->marcadorQuestion26_1, $this->marcadorQuestion26_2, $this->marcadorQuestion26_3] ));
        }elseif($this->currentStep == 27){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion27_0,$this->marcadorQuestion27_1, $this->marcadorQuestion27_2, $this->marcadorQuestion27_3] ));
        }elseif($this->currentStep == 28){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion28_0,$this->marcadorQuestion28_1, $this->marcadorQuestion28_2, $this->marcadorQuestion28_3] ));
        }elseif($this->currentStep == 29){

        }

        /* dd(
            'Item 1', [$this->marcadorQuestion1_0,$this->marcadorQuestion1_1, $this->marcadorQuestion1_2, $this->marcadorQuestion1_3],
            'Item 2', [$this->marcadorQuestion2_0,$this->marcadorQuestion2_1, $this->marcadorQuestion2_2, $this->marcadorQuestion2_3],
            'Item 3', [$this->marcadorQuestion3_0,$this->marcadorQuestion3_1, $this->marcadorQuestion3_2, $this->marcadorQuestion3_3],
            'Item 4', [$this->marcadorQuestion4_0,$this->marcadorQuestion4_1, $this->marcadorQuestion4_2, $this->marcadorQuestion4_3],
            'Item 5', [$this->marcadorQuestion5_0,$this->marcadorQuestion5_1, $this->marcadorQuestion5_2, $this->marcadorQuestion5_3],
           
            'Item 6', [$this->marcadorQuestion6_0,$this->marcadorQuestion6_1, $this->marcadorQuestion6_2, $this->marcadorQuestion6_3],
            
            'Item 7',[$this->marcadorQuestion7_0,$this->marcadorQuestion7_1, $this->marcadorQuestion7_2, $this->marcadorQuestion7_3],
            
            'Item 8',[$this->marcadorQuestion8_0,$this->marcadorQuestion8_1, $this->marcadorQuestion8_2, $this->marcadorQuestion8_3],
            
            'Item 9',[$this->marcadorQuestion9_0,$this->marcadorQuestion9_1, $this->marcadorQuestion9_2, $this->marcadorQuestion9_3],
            
            'Item 10',[$this->marcadorQuestion10_0,$this->marcadorQuestion10_1, $this->marcadorQuestion10_2, $this->marcadorQuestion10_3],
            
            'Item 11',[$this->marcadorQuestion11_0,$this->marcadorQuestion11_1, $this->marcadorQuestion11_2, $this->marcadorQuestion11_3],
            
            'Item 12',[$this->marcadorQuestion12_0,$this->marcadorQuestion12_1, $this->marcadorQuestion12_2, $this->marcadorQuestion12_3],
            
            'Item 13',[$this->marcadorQuestion13_0,$this->marcadorQuestion13_1, $this->marcadorQuestion13_2, $this->marcadorQuestion13_3],
            
            'Item 14',[$this->marcadorQuestion14_0,$this->marcadorQuestion14_1, $this->marcadorQuestion14_2, $this->marcadorQuestion14_3],
            
            'Item 15',[$this->marcadorQuestion15_0,$this->marcadorQuestion15_1, $this->marcadorQuestion15_2, $this->marcadorQuestion15_3],
            
            'Item 16',[$this->marcadorQuestion16_0,$this->marcadorQuestion16_1, $this->marcadorQuestion16_2, $this->marcadorQuestion16_3],
            
            'Item 17',[$this->marcadorQuestion17_0,$this->marcadorQuestion17_1, $this->marcadorQuestion17_2, $this->marcadorQuestion17_3],
            
            'Item 18',[$this->marcadorQuestion18_0,$this->marcadorQuestion18_1, $this->marcadorQuestion18_2, $this->marcadorQuestion18_3],
            
            'Item 19',[$this->marcadorQuestion19_0,$this->marcadorQuestion19_1, $this->marcadorQuestion19_2, $this->marcadorQuestion19_3],
            
            'Item 20',[$this->marcadorQuestion20_0,$this->marcadorQuestion20_1, $this->marcadorQuestion20_2, $this->marcadorQuestion20_3], 
            
            'Item 21',[$this->marcadorQuestion21_0,$this->marcadorQuestion21_1, $this->marcadorQuestion21_2, $this->marcadorQuestion21_3],
            
            'Item 22',[$this->marcadorQuestion22_0,$this->marcadorQuestion22_1, $this->marcadorQuestion22_2, $this->marcadorQuestion22_3],
            
            'Item 23',[$this->marcadorQuestion23_0,$this->marcadorQuestion23_1, $this->marcadorQuestion23_2, $this->marcadorQuestion23_3],
            
            'Item 24',[$this->marcadorQuestion24_0,$this->marcadorQuestion24_1, $this->marcadorQuestion24_2, $this->marcadorQuestion24_3],
            
            'Item 25',[$this->marcadorQuestion25_0,$this->marcadorQuestion25_1, $this->marcadorQuestion25_2, $this->marcadorQuestion25_3],
            
            'Item 26',[$this->marcadorQuestion26_0,$this->marcadorQuestion26_1, $this->marcadorQuestion26_2, $this->marcadorQuestion26_3],
            
            'Item 27',[$this->marcadorQuestion27_0,$this->marcadorQuestion27_1, $this->marcadorQuestion27_2, $this->marcadorQuestion27_3],
            
            'Item 28',[$this->marcadorQuestion28_0,$this->marcadorQuestion28_1, $this->marcadorQuestion28_2, $this->marcadorQuestion28_3],
        ); */

    }

    public function ocultarInicio(){
        $this->inicio = false;
        $this->instruccion = true;
    }

    public function ocultarInstuccion(){
        $this->instruccion = false;

        $this->finalCount = now();
        $this->finalCount->addMinute(10)->addSecond(2);
    }

    public function noMasDeDos($valor)
    {
        /* return $valor; */
        $contadorMas = 0;
        $contadorMenos = 0;
        $contarNull = 0;

        if($this->inicioCount->diffInSeconds($this->finalCount, false)  <= 0)
        {
            $this->mostrarModal = true;
            $this->titulomsj = 'Sin timepo';
            $this->bgIcono = 'bg-red-100';
            $this->iconomsj = '<svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>';
            $this->msj = 'Se acabado el tiempo ';
            $this->color = "bg-red-600 text-white hover:bg-red-700 focus:ring-red-500";
            $this->btnTexto = 'Cerrar';
            
        }else{

            foreach ($valor as $key) {
                
                if ( count($key) == 0 ) {
                    $contarNull++;
                }elseif( count($key) == 2 ){
                    $this->mostrarModal = true;
                    $this->titulomsj = 'Error';
                    $this->bgIcono = 'bg-red-100';
                    $this->iconomsj = '<svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>';
                    $this->msj = 'No es permitido seleccionar más y menos a la vez';
                    $this->color = "bg-red-600 text-white hover:bg-red-700 focus:ring-red-500";
                    $this->btnTexto = 'Cerrar';
                    break;
                    return false;
                }elseif( count($key) == 1 ){
                    if($key[0] == 1){
                        $contadorMas++;
                    }elseif($key[0] == 0){
                        $contadorMenos++;
                    }
                }

            }

            if($contarNull > 2){
                $this->mostrarModal = true;
                $this->titulomsj = 'Error';
                $this->bgIcono = 'bg-red-100';
                $this->iconomsj = '<svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>';
                $this->msj = 'No has seleccionado ninguna de las opciones ó solo seleccionaste una sola opcion.';
                $this->color = "bg-red-600 text-white hover:bg-red-700 focus:ring-red-500";
                $this->btnTexto = 'Cerrar';
            }elseif( $contadorMas >= 2 || $contadorMenos >= 2 ){
                $this->mostrarModal = true;
                $this->titulomsj = 'Error';
                $this->bgIcono = 'bg-red-100';
                $this->iconomsj = '<svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>';
                $this->msj = 'No es permitido seleccionar más de dos opciones iguales ó seleccionar más y menos a la vez';
                $this->color = "bg-red-600 text-white hover:bg-red-700 focus:ring-red-500";
                $this->btnTexto = 'Cerrar';
            }elseif($contadorMas == 1 && $contadorMenos == 1) {
                return true;
            }

            /* return 'nulos:'.$contarNull.' contarMas:'.$contadorMas.' contarMenos:'.$contadorMenos.'    MENSAJE: '.$msj; */

        }

    }

    public function ocultarModal(){
        $this->mostrarModal = false;
        $this->reset(['titulomsj','iconomsj','msj','color','btnTexto']);
    }

    public function validarItem($valor){
        if($valor){
            $this->currentStep++;
            if ($this->currentStep > $this->totalSteps) {
                $this->currentStep = $this->totalSteps;
            }
        }
    }

    public function resultadosGenerar()
    {
        
    }

}