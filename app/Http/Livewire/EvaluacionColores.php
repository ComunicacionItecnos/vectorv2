<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Livewire\Component;

class EvaluacionColores extends Component
{
    public $fecha;

    public $totalSteps = 29;
    public $currentStep = 28 /* 1 */;

    public $inicio = /* true */ false;
    public $instruccion = false;

    public $question1   = [0=>'Rápido',1=>'Entusiasta',2=>'Lógico',3=>'Apacible'];
    public $marcadorQuestion1_0 = [], $marcadorQuestion1_1 = [], $marcadorQuestion1_2 = [], $marcadorQuestion1_3 = [];
    public $request1 = [];

    public $question2   = [0=>'Receptivo',1=>'Decidido',2=>'Bondadoso',3=>'Cauteloso'];
    public $marcadorQuestion2_0 = [], $marcadorQuestion2_1 = [], $marcadorQuestion2_2 = [], $marcadorQuestion2_3 = [];
    public $request2 = [];

    public $question3   = [0=>'Tranquilo',1=>'Franco',2=>'Preciso',3=>'Amigable'];
    public $marcadorQuestion3_0 = [], $marcadorQuestion3_1 = [], $marcadorQuestion3_2 = [], $marcadorQuestion3_3 = [];
    public $request3 = [];

    public $question4   = [0=>'Decisivo',1=>'Elocuente',2=>'Controlado',3=>'Tolerante'];
    public $marcadorQuestion4_0 = [], $marcadorQuestion4_1 = [], $marcadorQuestion4_2 = [], $marcadorQuestion4_3 = [];
    public $request4 = [];

    public $question5   = [0=>'Minucioso',1=>'Moderado',2=>'Atrevido',3=>'Comunicativo'];
    public $marcadorQuestion5_0 = [], $marcadorQuestion5_1 = [], $marcadorQuestion5_2 = [], $marcadorQuestion5_3 = [];
    public $request5 = [];

    public $question6   = [0=>'Investigador',1=>'Ameno',2=>'Ingenioso',3=>'Acepta riesgos'];
    public $marcadorQuestion6_0 = [], $marcadorQuestion6_1 = [], $marcadorQuestion6_2 = [], $marcadorQuestion6_3 = [];
    public $request6 = [];

    public $question7   = [0=>'Expresivo',1=>'Dominante',2=>'Cuidadoso',3=>'Sensible'];
    public $marcadorQuestion7_0 = [], $marcadorQuestion7_1 = [], $marcadorQuestion7_2 = [], $marcadorQuestion7_3 = [];
    public $request7 = [];

    public $question8   = [0=>'Introvertido',1=>'Extrovertido',2=>'Precavido',3=>'Impasible'];
    public $marcadorQuestion8_0 = [], $marcadorQuestion8_1 = [], $marcadorQuestion8_2 = [], $marcadorQuestion8_3 = [];
    public $request8 = [];

    public $question9   = [0=>'Valeroso',1=>'Insistente',2=>'Discreto',3=>'Encantador'];
    public $marcadorQuestion9_0 = [], $marcadorQuestion9_1 = [], $marcadorQuestion9_2 = [], $marcadorQuestion9_3 = [];
    public $request9 = [];

    public $question10  = [0=>'Perfeccionista',1=>'Anima a los demás',2=>'Valeroso',3=>'Pacifico'];
    public $marcadorQuestion10_0 = [], $marcadorQuestion10_1 = [], $marcadorQuestion10_2 = [], $marcadorQuestion10_3 = [];
    public $request10 = [];

    public $question11  = [0=>'Osado',1=>'Reservado',2=>'Atento',3=>'Alegre'];
    public $marcadorQuestion11_0 = [], $marcadorQuestion11_1 = [], $marcadorQuestion11_2 = [], $marcadorQuestion11_3 = [];
    public $request11 = [];

    public $question12  = [0=>'Gentil',1=>'Estimulante',2=>'Independiente',3=>'Perceptivo'];
    public $marcadorQuestion12_0 = [], $marcadorQuestion12_1 = [], $marcadorQuestion12_2 = [], $marcadorQuestion12_3 = [];
    public $request12 = [];

    public $question13  = [0=>'Considerado',1=>'Sagaz',2=>'Contento',3=>'Competitivo'];
    public $marcadorQuestion13_0 = [], $marcadorQuestion13_1 = [], $marcadorQuestion13_2 = [], $marcadorQuestion13_3 = [];
    public $request13 = [];

    public $question14  = [0=>'Meticuloso',1=>'Alentador',2=>'Obediente',3=>'Ideas firmes'];
    public $marcadorQuestion14_0 = [], $marcadorQuestion14_1 = [], $marcadorQuestion14_2 = [], $marcadorQuestion14_3 = [];
    public $request14 = [];

    public $question15  = [0=>'Popular',1=>'Calmado',2=>'Tenaz',3=>'Reflexivo'];
    public $marcadorQuestion15_0 = [], $marcadorQuestion15_1 = [], $marcadorQuestion15_2 = [], $marcadorQuestion15_3 = [];
    public $request15 = [];

    public $question16  = [0=>'Audaz',1=>'Leal',2=>'Promotor',3=>'Analítico'];
    public $marcadorQuestion16_0 = [], $marcadorQuestion16_1 = [], $marcadorQuestion16_2 = [], $marcadorQuestion16_3 = [];
    public $request16 = [];

    public $question17  = [0=>'Autosuficiente',1=>'Paciente',2=>'Certero',3=>'Sociable'];
    public $marcadorQuestion17_0 = [], $marcadorQuestion17_1 = [], $marcadorQuestion17_2 = [], $marcadorQuestion17_3 = [];
    public $request17 = [];

    public $question18  = [0=>'Adaptable',1=>'Vivaz',2=>'Resuelto',3=>'Prevenido'];
    public $marcadorQuestion18_0 = [], $marcadorQuestion18_1 = [], $marcadorQuestion18_2 = [], $marcadorQuestion18_3 = [];
    public $request18 = [];

    public $question19  = [0=>'Discerniente',1=>'Impetuoso',2=>'Agresivo',3=>'Amistoso'];
    public $marcadorQuestion19_0 = [], $marcadorQuestion19_1 = [], $marcadorQuestion19_2 = [], $marcadorQuestion19_3 = [];
    public $request19 = [];

    public $question20  = [0=>'Compasivo',1=>'De trato fácil',2=>'Habla directo',3=>'Cauto'];
    public $marcadorQuestion20_0 = [], $marcadorQuestion20_1 = [], $marcadorQuestion20_2 = [], $marcadorQuestion20_3 = [];
    public $request20 = [];

    public $question21  = [0=>'Persistente',1=>'Generoso',2=>'Evaluador',3=>'Animado'];
    public $marcadorQuestion21_0 = [], $marcadorQuestion21_1 = [], $marcadorQuestion21_2 = [], $marcadorQuestion21_3 = [];
    public $request21 = [];

    public $question22  = [0=>'Impulsivo',1=>'Energico',2=>'Tranquilo',3=>'Cuida los detalles'];
    public $marcadorQuestion22_0 = [], $marcadorQuestion22_1 = [], $marcadorQuestion22_2 = [], $marcadorQuestion22_3 = [];
    public $request22 = [];

    public $question23  = [0=>'Sistemático',1=>'Tolerante',2=>'Sociable',3=>'Vigoroso'];
    public $marcadorQuestion23_0 = [], $marcadorQuestion23_1 = [], $marcadorQuestion23_2 = [], $marcadorQuestion23_3 = [];
    public $request23 = [];

    public $question24  = [0=>'Cautivador',1=>'Exigente',2=>'Contento',3=>'Apegado a las normas'];
    public $marcadorQuestion24_0 = [], $marcadorQuestion24_1 = [], $marcadorQuestion24_2 = [], $marcadorQuestion24_3 = [];
    public $request24 = [];

    public $question25  = [0=>'Le agrada discutir',1=>'Comedido',2=>'Metódico',3=>'Desenvuelto'];
    public $marcadorQuestion25_0 = [], $marcadorQuestion25_1 = [], $marcadorQuestion25_2 = [], $marcadorQuestion25_3 = [];
    public $request25 = [];

    public $question26  = [0=>'Ecuánime',1=>'Jovial',2=>'Directo',3=>'Preciso'];
    public $marcadorQuestion26_0 = [], $marcadorQuestion26_1 = [], $marcadorQuestion26_2 = [], $marcadorQuestion26_3 = [];
    public $request26 = [];

    public $question27  = [0=>'Cuidadoso',1=>'Amable',2=>'Inquieto',3=>'Elocuente'];
    public $marcadorQuestion27_0 = [], $marcadorQuestion27_1 = [], $marcadorQuestion27_2 = [], $marcadorQuestion27_3 = [];
    public $request27 = [];

    public $question28  = [0=>'Prudente',1=>'Pionero',2=>'Espontaneo',3=>'Colaborador'];
    public $marcadorQuestion28_0 = [], $marcadorQuestion28_1 = [], $marcadorQuestion28_2 = [], $marcadorQuestion28_3 = [];
    public $request28 = [];

    public $mostrarModal = false;
    public $titulomsj ='', $msj = '' ,$color ,$bgIcono ,$iconomsj ,$btnTexto;


    public $inicioCount, $finalCount,$Contador;

    public $dominante_rojo = [];
    public $influyente_amarillo = [];
    public $Estable_verde = [];
    public $concienzudo_azul = [];
    public $resultados = [];
    public $resultados2 = [];
    public $resultados3 = [];

    public $perfil,$descripcion;

    public function mount()
    {
        $this->fecha = Carbon::now();
        $this->fecha = $this->fecha->format('d-m-y');
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
            $this->titulomsj = 'Sin tiempo';
            $this->bgIcono = 'bg-red-100';
            $this->iconomsj = '<svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>';
            $this->msj = 'Se acabado el tiempo ';
            $this->color = "bg-red-600 text-white hover:bg-red-700 focus:ring-red-500";
            $this->btnTexto = 'Cerrar';
            
            $this->increaseStep($this->validarItem(29));
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
            $this->request1 = [$this->marcadorQuestion1_0,$this->marcadorQuestion1_1, $this->marcadorQuestion1_2, $this->marcadorQuestion1_3];
        }elseif($this->currentStep == 2){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion2_0,$this->marcadorQuestion2_1, $this->marcadorQuestion2_2, $this->marcadorQuestion2_3] ));
            $this->request2 = [$this->marcadorQuestion2_0,$this->marcadorQuestion2_1, $this->marcadorQuestion2_2, $this->marcadorQuestion2_3];
        }elseif($this->currentStep == 3){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion3_0,$this->marcadorQuestion3_1, $this->marcadorQuestion3_2, $this->marcadorQuestion3_3] ));
            $this->request3 = [$this->marcadorQuestion3_0,$this->marcadorQuestion3_1, $this->marcadorQuestion3_2, $this->marcadorQuestion3_3];
        }elseif($this->currentStep == 4){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion4_0,$this->marcadorQuestion4_1, $this->marcadorQuestion4_2, $this->marcadorQuestion4_3] ));
            $this->request4 = [$this->marcadorQuestion4_0,$this->marcadorQuestion4_1, $this->marcadorQuestion4_2, $this->marcadorQuestion4_3];
        }elseif($this->currentStep == 5){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion5_0,$this->marcadorQuestion5_1, $this->marcadorQuestion5_2, $this->marcadorQuestion5_3] ));
            $this->request5 = [$this->marcadorQuestion5_0,$this->marcadorQuestion5_1, $this->marcadorQuestion5_2, $this->marcadorQuestion5_3];
        }elseif($this->currentStep == 6){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion6_0,$this->marcadorQuestion6_1, $this->marcadorQuestion6_2, $this->marcadorQuestion6_3] ));
            $this->request6 = [$this->marcadorQuestion6_0,$this->marcadorQuestion6_1, $this->marcadorQuestion6_2, $this->marcadorQuestion6_3];
        }elseif($this->currentStep == 7){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion7_0,$this->marcadorQuestion7_1, $this->marcadorQuestion7_2, $this->marcadorQuestion7_3] ));
            $this->request7 = [$this->marcadorQuestion7_0,$this->marcadorQuestion7_1, $this->marcadorQuestion7_2, $this->marcadorQuestion7_3];
        }elseif($this->currentStep == 8){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion8_0,$this->marcadorQuestion8_1, $this->marcadorQuestion8_2, $this->marcadorQuestion8_3] ));
            $this->request8 = [$this->marcadorQuestion8_0,$this->marcadorQuestion8_1, $this->marcadorQuestion8_2, $this->marcadorQuestion8_3];
        }elseif($this->currentStep == 9){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion9_0,$this->marcadorQuestion9_1, $this->marcadorQuestion9_2, $this->marcadorQuestion9_3] ));
            $this->request9 = [$this->marcadorQuestion9_0,$this->marcadorQuestion9_1, $this->marcadorQuestion9_2, $this->marcadorQuestion9_3];
        }elseif($this->currentStep == 10){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion10_0,$this->marcadorQuestion10_1, $this->marcadorQuestion10_2, $this->marcadorQuestion10_3] ));
            $this->request10 = [$this->marcadorQuestion10_0,$this->marcadorQuestion10_1, $this->marcadorQuestion10_2, $this->marcadorQuestion10_3];
        }elseif($this->currentStep == 11){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion11_0,$this->marcadorQuestion11_1, $this->marcadorQuestion11_2, $this->marcadorQuestion11_3] ));
            $this->request11 = [$this->marcadorQuestion11_0,$this->marcadorQuestion11_1, $this->marcadorQuestion11_2, $this->marcadorQuestion11_3];
        }elseif($this->currentStep == 12){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion12_0,$this->marcadorQuestion12_1, $this->marcadorQuestion12_2, $this->marcadorQuestion12_3] ));
            $this->request12 = [$this->marcadorQuestion12_0,$this->marcadorQuestion12_1, $this->marcadorQuestion12_2, $this->marcadorQuestion12_3];
        }elseif($this->currentStep == 13){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion13_0,$this->marcadorQuestion13_1, $this->marcadorQuestion13_2, $this->marcadorQuestion13_3] ));
            $this->request13 = [$this->marcadorQuestion13_0,$this->marcadorQuestion13_1, $this->marcadorQuestion13_2, $this->marcadorQuestion13_3];
        }elseif($this->currentStep == 14){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion14_0,$this->marcadorQuestion14_1, $this->marcadorQuestion14_2, $this->marcadorQuestion14_3] ));
            $this->request14 = [$this->marcadorQuestion14_0,$this->marcadorQuestion14_1, $this->marcadorQuestion14_2, $this->marcadorQuestion14_3];
        }elseif($this->currentStep == 15){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion15_0,$this->marcadorQuestion15_1, $this->marcadorQuestion15_2, $this->marcadorQuestion15_3] ));
            $this->request15 = [$this->marcadorQuestion15_0,$this->marcadorQuestion15_1, $this->marcadorQuestion15_2, $this->marcadorQuestion15_3];
        }elseif($this->currentStep == 16){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion16_0,$this->marcadorQuestion16_1, $this->marcadorQuestion16_2, $this->marcadorQuestion16_3] ));
            $this->request16 = [$this->marcadorQuestion16_0,$this->marcadorQuestion16_1, $this->marcadorQuestion16_2, $this->marcadorQuestion16_3];
        }elseif($this->currentStep == 17){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion17_0,$this->marcadorQuestion17_1, $this->marcadorQuestion17_2, $this->marcadorQuestion17_3] ));
            $this->request17 = [$this->marcadorQuestion17_0,$this->marcadorQuestion17_1, $this->marcadorQuestion17_2, $this->marcadorQuestion17_3];
        }elseif($this->currentStep == 18){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion18_0,$this->marcadorQuestion18_1, $this->marcadorQuestion18_2, $this->marcadorQuestion18_3] ));
            $this->request18 = [$this->marcadorQuestion18_0,$this->marcadorQuestion18_1, $this->marcadorQuestion18_2, $this->marcadorQuestion18_3];
        }elseif($this->currentStep == 19){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion19_0,$this->marcadorQuestion19_1, $this->marcadorQuestion19_2, $this->marcadorQuestion19_3] ));
            $this->request19 = [$this->marcadorQuestion19_0,$this->marcadorQuestion19_1, $this->marcadorQuestion19_2, $this->marcadorQuestion19_3];
        }elseif($this->currentStep == 20){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion20_0,$this->marcadorQuestion20_1, $this->marcadorQuestion20_2, $this->marcadorQuestion20_3] ));
            $this->request20 = [$this->marcadorQuestion20_0,$this->marcadorQuestion20_1, $this->marcadorQuestion20_2, $this->marcadorQuestion20_3];
        }elseif($this->currentStep == 21){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion21_0,$this->marcadorQuestion21_1, $this->marcadorQuestion21_2, $this->marcadorQuestion21_3] ));
            $this->request21 = [$this->marcadorQuestion21_0,$this->marcadorQuestion21_1, $this->marcadorQuestion21_2, $this->marcadorQuestion21_3];
        }elseif($this->currentStep == 22){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion22_0,$this->marcadorQuestion22_1, $this->marcadorQuestion22_2, $this->marcadorQuestion22_3] ));
            $this->request22 = [$this->marcadorQuestion22_0,$this->marcadorQuestion22_1, $this->marcadorQuestion22_2, $this->marcadorQuestion22_3];
        }elseif($this->currentStep == 23){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion23_0,$this->marcadorQuestion23_1, $this->marcadorQuestion23_2, $this->marcadorQuestion23_3] ));
            $this->request23 = [$this->marcadorQuestion23_0,$this->marcadorQuestion23_1, $this->marcadorQuestion23_2, $this->marcadorQuestion23_3];
        }elseif($this->currentStep == 24){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion24_0,$this->marcadorQuestion24_1, $this->marcadorQuestion24_2, $this->marcadorQuestion24_3] ));
            $this->request24 = [$this->marcadorQuestion24_0,$this->marcadorQuestion24_1, $this->marcadorQuestion24_2, $this->marcadorQuestion24_3];
        }elseif($this->currentStep == 25){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion25_0,$this->marcadorQuestion25_1, $this->marcadorQuestion25_2, $this->marcadorQuestion25_3] ));
            $this->request25 = [$this->marcadorQuestion25_0,$this->marcadorQuestion25_1, $this->marcadorQuestion25_2, $this->marcadorQuestion25_3];
        }elseif($this->currentStep == 26){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion26_0,$this->marcadorQuestion26_1, $this->marcadorQuestion26_2, $this->marcadorQuestion26_3] ));
            $this->request26 = [$this->marcadorQuestion26_0,$this->marcadorQuestion26_1, $this->marcadorQuestion26_2, $this->marcadorQuestion26_3];
        }elseif($this->currentStep == 27){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion27_0,$this->marcadorQuestion27_1, $this->marcadorQuestion27_2, $this->marcadorQuestion27_3] ));
            $this->request27 = [$this->marcadorQuestion27_0,$this->marcadorQuestion27_1, $this->marcadorQuestion27_2, $this->marcadorQuestion27_3];
        }elseif($this->currentStep == 28){
            $this->validarItem($this->noMasDeDos( [$this->marcadorQuestion28_0,$this->marcadorQuestion28_1, $this->marcadorQuestion28_2, $this->marcadorQuestion28_3] ));
            $this->request28 = [$this->marcadorQuestion28_0,$this->marcadorQuestion28_1, $this->marcadorQuestion28_2, $this->marcadorQuestion28_3];

            if($this->currentStep == 29){
    
                
                $this->resultados = $this->resultadosGenerar(); 
                $this->resultados3 = $this->ordenarArray($this->resultados);
                $this->resultados2 = $this->metodosPerfil($this->resultados3);
                      
               
                $this->emit('resultadosFinal'); 

            }
        }elseif($this->currentStep == 29){

           /*  $this->resultados = $this->resultadosGenerar(); 
            $this->resultados3 = $this->ordenarArray($this->resultados);
            $this->resultados2 = $this->metodosPerfil($this->resultados3); */

            $this->resultados = ['rojo'=> 7,'amarillo'=>4,'verde'=>6,'azul'=>2 ];
            $this->resultados3 = $this->ordenarArray($this->resultados);
            $this->resultados2 = 'Escéptico';
            

            $this->emit('resultadosFinal');
            
        }
        
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
        $contadorMas = 0;
        $contadorMenos = 0;
        $contarNull = 0;

        if($this->inicioCount->diffInSeconds($this->finalCount, false)  <= 0)
        {

            $this->mostrarModal = true;
            $this->titulomsj = 'Sin tiempo';
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
                    if($key[0] == 2){
                        $contadorMas++;
                    }elseif($key[0] == 1){
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
        $this->dominante_rojo = [
            $this->buscarArrasVacios($this->request1 [0]),
            $this->buscarArrasVacios($this->request2 [1]),
            $this->buscarArrasVacios($this->request3 [1]),
            $this->buscarArrasVacios($this->request4 [0]),
            $this->buscarArrasVacios($this->request5 [2]),
            $this->buscarArrasVacios($this->request6 [3]),
            $this->buscarArrasVacios($this->request7 [1]),
            $this->buscarArrasVacios($this->request8 [3]),
            $this->buscarArrasVacios($this->request9 [1]),
            $this->buscarArrasVacios($this->request10[2]),
            $this->buscarArrasVacios($this->request11[0]),
            $this->buscarArrasVacios($this->request12[2]),
            $this->buscarArrasVacios($this->request13[3]),
            $this->buscarArrasVacios($this->request14[3]),
            $this->buscarArrasVacios($this->request15[2]),
            $this->buscarArrasVacios($this->request16[0]),
            $this->buscarArrasVacios($this->request17[0]),
            $this->buscarArrasVacios($this->request18[1]),
            $this->buscarArrasVacios($this->request19[2]),
            $this->buscarArrasVacios($this->request20[2]),
            $this->buscarArrasVacios($this->request21[0]),
            $this->buscarArrasVacios($this->request22[1]),
            $this->buscarArrasVacios($this->request23[3]),
            $this->buscarArrasVacios($this->request24[1]),
            $this->buscarArrasVacios($this->request25[0]),
            $this->buscarArrasVacios($this->request26[2]),
            $this->buscarArrasVacios($this->request27[2]),
            $this->buscarArrasVacios($this->request28[1])
        ];

        $this->influyente_amarillo = [
            $this->buscarArrasVacios($this->request1 [1]),
            $this->buscarArrasVacios($this->request2 [0]),
            $this->buscarArrasVacios($this->request3 [3]),
            $this->buscarArrasVacios($this->request4 [1]),
            $this->buscarArrasVacios($this->request5 [3]),
            $this->buscarArrasVacios($this->request6 [2]),
            $this->buscarArrasVacios($this->request7 [0]),
            $this->buscarArrasVacios($this->request8 [1]),
            $this->buscarArrasVacios($this->request9 [3]),
            $this->buscarArrasVacios($this->request10[1]),
            $this->buscarArrasVacios($this->request11[3]),
            $this->buscarArrasVacios($this->request12[1]),
            $this->buscarArrasVacios($this->request13[2]),
            $this->buscarArrasVacios($this->request14[1]),
            $this->buscarArrasVacios($this->request15[0]),
            $this->buscarArrasVacios($this->request16[2]),
            $this->buscarArrasVacios($this->request17[3]),
            $this->buscarArrasVacios($this->request18[2]),
            $this->buscarArrasVacios($this->request19[1]),
            $this->buscarArrasVacios($this->request20[1]),
            $this->buscarArrasVacios($this->request21[3]),
            $this->buscarArrasVacios($this->request22[0]),
            $this->buscarArrasVacios($this->request23[2]),
            $this->buscarArrasVacios($this->request24[0]),
            $this->buscarArrasVacios($this->request25[3]),
            $this->buscarArrasVacios($this->request26[1]),
            $this->buscarArrasVacios($this->request27[3]),
            $this->buscarArrasVacios($this->request28[3])
        ];

        $this->Estable_verde = [
            $this->buscarArrasVacios($this->request1 [3]),
            $this->buscarArrasVacios($this->request2 [2]),
            $this->buscarArrasVacios($this->request3 [0]),
            $this->buscarArrasVacios($this->request4 [3]),
            $this->buscarArrasVacios($this->request5 [1]),
            $this->buscarArrasVacios($this->request6 [1]),
            $this->buscarArrasVacios($this->request7 [3]),
            $this->buscarArrasVacios($this->request8 [0]),
            $this->buscarArrasVacios($this->request9 [0]),
            $this->buscarArrasVacios($this->request10[3]),
            $this->buscarArrasVacios($this->request11[2]),
            $this->buscarArrasVacios($this->request12[0]),
            $this->buscarArrasVacios($this->request13[0]),
            $this->buscarArrasVacios($this->request14[2]),
            $this->buscarArrasVacios($this->request15[1]),
            $this->buscarArrasVacios($this->request16[1]),
            $this->buscarArrasVacios($this->request17[1]),
            $this->buscarArrasVacios($this->request18[0]),
            $this->buscarArrasVacios($this->request19[3]),
            $this->buscarArrasVacios($this->request20[0]),
            $this->buscarArrasVacios($this->request21[1]),
            $this->buscarArrasVacios($this->request22[3]),
            $this->buscarArrasVacios($this->request23[1]),
            $this->buscarArrasVacios($this->request24[2]),
            $this->buscarArrasVacios($this->request25[1]),
            $this->buscarArrasVacios($this->request26[0]),
            $this->buscarArrasVacios($this->request27[1]),
            $this->buscarArrasVacios($this->request28[2])
        ];

        $this->concienzudo_azul = [
            $this->buscarArrasVacios($this->request1 [2]),
            $this->buscarArrasVacios($this->request2 [3]),
            $this->buscarArrasVacios($this->request3 [2]),
            $this->buscarArrasVacios($this->request4 [2]),
            $this->buscarArrasVacios($this->request5 [0]),
            $this->buscarArrasVacios($this->request6 [0]),
            $this->buscarArrasVacios($this->request7 [2]),
            $this->buscarArrasVacios($this->request8 [2]),
            $this->buscarArrasVacios($this->request9 [2]),
            $this->buscarArrasVacios($this->request10[0]),
            $this->buscarArrasVacios($this->request11[1]),
            $this->buscarArrasVacios($this->request12[3]),
            $this->buscarArrasVacios($this->request13[1]),
            $this->buscarArrasVacios($this->request14[0]),
            $this->buscarArrasVacios($this->request15[3]),
            $this->buscarArrasVacios($this->request16[3]),
            $this->buscarArrasVacios($this->request17[2]),
            $this->buscarArrasVacios($this->request18[3]),
            $this->buscarArrasVacios($this->request19[0]),
            $this->buscarArrasVacios($this->request20[3]),
            $this->buscarArrasVacios($this->request21[2]),
            $this->buscarArrasVacios($this->request22[2]),
            $this->buscarArrasVacios($this->request23[0]),
            $this->buscarArrasVacios($this->request24[3]),
            $this->buscarArrasVacios($this->request25[2]),
            $this->buscarArrasVacios($this->request26[3]),
            $this->buscarArrasVacios($this->request27[0]),
            $this->buscarArrasVacios($this->request28[0])
        ];

        $this->dominante_rojo = array_filter($this->dominante_rojo, null);
        $this->dominante_rojo = array_values($this->dominante_rojo);

        $this->influyente_amarillo = array_filter($this->influyente_amarillo, null);
        $this->influyente_amarillo = array_values($this->influyente_amarillo);

        $this->Estable_verde = array_filter($this->Estable_verde, null);
        $this->Estable_verde = array_values($this->Estable_verde);

        $this->concienzudo_azul = array_filter($this->concienzudo_azul, null);
        $this->concienzudo_azul = array_values($this->concienzudo_azul);

        $this->dominante_rojo = $this->calcularDisc($this->dominante_rojo);
        $this->influyente_amarillo  = $this->calcularDisc($this->influyente_amarillo);
        $this->Estable_verde = $this->calcularDisc($this->Estable_verde);
        $this->concienzudo_azul = $this->calcularDisc($this->concienzudo_azul);
        
        $this->dominante_rojo = $this->dominante_rojo[0]-$this->dominante_rojo[1];
        $this->influyente_amarillo = $this->influyente_amarillo[0]-$this->influyente_amarillo[1];
        $this->Estable_verde = $this->Estable_verde[0]-$this->Estable_verde[1]; 
        $this->concienzudo_azul = $this->concienzudo_azul[0]-$this->concienzudo_azul[1];

        return ['rojo'=>$this->segmento($this->dominante_rojo,'rojo'),
                'amarillo'=>$this->segmento($this->influyente_amarillo,'amarillo'),
                'verde'=>$this->segmento($this->Estable_verde,'verde'),
                'azul'=>$this->segmento($this->concienzudo_azul,'azul')];

    }

    public function buscarArrasVacios($arrayRespuesta)
    {
        if (count($arrayRespuesta) == 0) {
            return null;
        }else {
            return $arrayRespuesta[0];
        }
    }

    public function calcularDisc($valorDisc)
    {
        $contadorMas = 0;
        $contadorMenos = 0;
        for ($i=0; $i < count($valorDisc); $i++) { 
            
            if ($valorDisc[$i] == 2) {
                $contadorMas = $contadorMas +1;
            }elseif($valorDisc[$i] ==  1){
                $contadorMenos = $contadorMenos +1 ;
            }else {
            
            }
            
        }

        return [$contadorMas,$contadorMenos];

    }

    public function aksort(&$array,$valrev=false,$keyrev=false) {
        if ($valrev) { arsort($array); } else { asort($array); }
          $vals = array_count_values($array);
          $i = 0;
          foreach ($vals AS $val=>$num) {
              $first = array_splice($array,0,$i);
              $tmp = array_splice($array,0,$num);
              if ($keyrev) { krsort($tmp); } else { ksort($tmp); }
              $array = array_merge($first,$tmp,$array);
              unset($tmp);
              $i = $num;
          }
    }

    public function ordenarArray($arrayRespuesta)
    {
        $arryRetornar = [];

        $this->aksort($arrayRespuesta,true,true);

        foreach ($arrayRespuesta as $key => $value) {
            
            $arryRetornar[] = [$key,$value];
        }

        return $arryRetornar;
    }


    public function segmento($valor,$color)
    {

        if ($color == 'rojo') {

            if ($valor < 0) {

                $valor = abs($valor);

                if ( $valor >= 8 && $valor <= 28 ) {
                    return 1;
                }elseif( $valor >= 4 && $valor <= 7 ){
                    return 2;
                }elseif( $valor >= 1 && $valor <= 3 ){
                    return 3;
                }

            }else{

                if( $valor >= 0 && $valor <= 1 ){
                    return 4;
                }elseif( $valor >= 2 && $valor <= 4 ){
                    return 5;
                }elseif( $valor >= 5 && $valor <= 8 ){
                    return 6;
                }elseif( $valor >= 9 && $valor <= 28 ){
                    return 7;
                }

            }

        }elseif($color == 'amarillo'){

            if ($valor < 0) {

                $valor = abs($valor);

                if ( $valor >= 8 && $valor <= 28 ) {
                    return 1;
                }elseif( $valor >= 4 && $valor <= 7 ){
                    return 2;
                }elseif( $valor >= 2 && $valor <= 3 ){
                    return 3;
                }elseif($valor == 1){
                    return 4;
                }

            }else{

                if ( $valor == 0 ) {
                    return 4;
                }elseif( $valor == 1 ){
                    return 4;
                }elseif( $valor >= 2 && $valor <= 3 ){
                    return 5;
                }elseif( $valor >= 4 && $valor <= 6 ){
                    return 6;
                }elseif( $valor >= 7 && $valor <= 28){
                    return 7;
                }

            }

        }elseif($color == 'verde'){

            if ($valor < 0) {

                $valor = abs($valor);

                if ( $valor >= 11 && $valor <= 28 ) {
                    return 1;
                }elseif( $valor >= 7 && $valor <= 10 ){
                    return 2;
                }elseif( $valor >= 4 && $valor <= 6 ){
                    return 3;
                }elseif( $valor >= 1 && $valor <= 3 ){
                    return 4;
                }

            }else{

                if( $valor >= 0 && $valor <= 2 ){
                    return 5;
                }elseif( $valor >= 3 && $valor <= 7 ){
                    return 6;
                }elseif( $valor >= 8 && $valor <= 28 ){
                    return 7;
                }

            }

        }elseif($color == 'azul'){

            if ($valor < 0) {

                $valor = abs($valor);

                if ( $valor >= 6 && $valor <= 28 ) {
                    return 1;
                }elseif( $valor >= 3 && $valor <= 5 ){
                    return 2;
                }elseif( $valor >= 1 && $valor <= 2 ){
                    return 3;
                }

            }else{

                if( $valor >= 0 && $valor <= 2 ){
                    return 4;
                }elseif( $valor >= 3 && $valor <= 4 ){
                    return 5;
                }elseif( $valor >= 5 && $valor <= 8 ){
                    return 6;
                }elseif( $valor >= 9 && $valor <= 28 ){
                    return 7;
                }

            }

        }
        
    }

    public function metodosPerfil($valor)
    {
        /* return$valor; */
        if($valor[0][1] == $valor[1][1])
        {
            if ($valor[0][0] == 'rojo' && $valor[1][0] == 'amarillo') {
                if($valor[2][0] == 'verde' && $valor[3][1] == $valor[2][1]+1 ){
                    return 'Perseptivo';
                }else{
                    return 'Orientado a resultados';
                }
            }elseif($valor[0][0] == 'rojo' && $valor[1][0] == 'verde') {
                if ($valor[2][1] <= 4 && $valor[3][1] <= 4) {
                    return 'Agente';
                }
            }elseif($valor[0][0] == 'rojo' && $valor[1][0] == 'azul'){
                if ($valor[2][1] <= 4 && $valor[3][1] <= 4) {
                    return 'Creativo';
                }
            }elseif ($valor[0][0] == 'amarillo'&& $valor[1][0] == 'verde') {
                if ($valor[2][1] < 4 && $valor[3][1] < 4) {
                    return 'Consejero';
                }elseif($valor[2][1] <= 4 && $valor[3][1] <= 4){
                    return 'Agente';
                }
            }elseif ($valor[0][0] == 'amarillo'&& $valor[1][0] == 'azul') {
                if($valor[2][1] <=4 && $valor[3][1] <=4){
                    return 'Tasador';
                } 
            }elseif($valor[0][0] == 'azul' && $valor[1][0] == 'verde' ){
                if($valor[2][1] <=4 && $valor[3][1] <=4){
                    return 'Perfeccionista';
                } 
            }
        
        }elseif( ($valor[0][1] == $valor[1][1]) && ($valor[0][1] == $valor[2][1]) && ($valor[1][1] == $valor[2][1]) )
        {
            if ($valor[3][0] == 'rojo' && $valor[3][1] <= 4) {
                return 'Practicante';
            }elseif ($valor[3][0] == 'amarillo' && $valor[3][1] <= 4) {
                return 'Investigador';
            }elseif ($valor[3][0] == 'verde' && $valor[3][1] <= 4) {
                return 'Impaciente';
            }elseif ($valor[3][0] == 'azul' && $valor[3][1] <= 4) {
                return 'Independiente';
            }

        }else{
            
            if($valor[0][0] == 'rojo'){

                if($valor[0][1] > 4 && ($valor[1][1] <= $valor[0][1] && $valor[2][1] <= $valor[0][1] && $valor[3][1] <= $valor[0][1]) ){
                    return 'Desarrollador';
                }elseif($valor[1][0] == 'amarillo' && ($valor[2][1] <= $valor[0][1] && $valor[3][1] <= $valor[0][1]) ){

                    if ($valor[1][1] == $valor[0][1]-1) {
                        return 'Inspiracional';
                    }else{
                        return 'Orientado a resultados';
                    }
                    
                }elseif($valor[1][0] == 'azul' && ($valor[2][1] <= $valor[0][1] && $valor[3][1] <=$valor[0][1]) ){                    
                    return 'Creativo';
                }elseif($valor[1][0] == 'verde' && ($valor[2][1] <= $valor[0][1] && $valor[3][1] <=$valor[0][1]) ){
                    return 'Maratonero';
                }

            }elseif($valor[0][0] == 'amarillo'){

                if($valor[0][1] > 4 && ($valor[1][1] <= $valor[0][1] && $valor[2][1] <= $valor[0][1] && $valor[3][1] <= $valor[0][1]) ){
                    return 'Promotor';
                }elseif($valor[1][0] == 'verde' && ($valor[2][1] <= $valor[0][1] && $valor[3][1] <=$valor[0][1]) ){                    
                    return 'Consejero';
                }elseif($valor[1][0] == 'azul' && ($valor[2][1] <= $valor[0][1] && $valor[3][1] <=$valor[0][1]) ){
                    return 'Tasador';
                }elseif($valor[1][0] == 'rojo' && ($valor[2][1] <= $valor[0][1] && $valor[3][1] <= $valor[0][1]) ){
                    return 'Persuasivo';
                }

            }elseif($valor[0][0] == 'verde'){

                if($valor[0][1] > 4 && ($valor[1][1] <= $valor[0][1] && $valor[2][1] <= $valor[0][1] && $valor[3][1] <= $valor[0][1]) ){
                    return 'Especialista';
                }elseif($valor[1][0] == 'amarillo' && ($valor[2][1] <= $valor[0][1] && $valor[3][1] <= $valor[0][1]) ){
                    return 'Agente';
                }elseif($valor[1][0] == 'azul' && ($valor[2][1] <= $valor[0][1] && $valor[3][1] <=$valor[0][1]) ){                    
                    return 'Investigador';
                }elseif($valor[1][0] == 'rojo' && ($valor[2][1] <= $valor[0][1] && $valor[3][1] <=$valor[0][1]) ){
                    return 'Triunfador';
                }

            }elseif($valor[0][0] == 'azul'){

                if($valor[0][1] > 4 && ($valor[1][1] <= $valor[0][1] && $valor[2][1] <= $valor[0][1] && $valor[3][1] <= $valor[0][1]) ){
                    return 'Pensador Objetivo';
                }elseif($valor[1][0] == 'verde' && ($valor[2][1] <= $valor[0][1] && $valor[3][1] <=$valor[0][1]) ){                    
                    return 'Perfeccionista';
                }elseif($valor[1][0] == 'amarillo' && ($valor[2][1] <= $valor[0][1] && $valor[3][1] <= $valor[0][1]) ){
                    return 'Practicante';
                }elseif($valor[1][0] == 'rojo' && ($valor[2][1] <= $valor[0][1] && $valor[3][1] <= $valor[0][1])){
                    return 'Escéptico';
                }

            }

        }

    }

}