<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class EvaluacionDesempeno extends Component
{
    public $colaborador;
    public $foto,$nombre,$puesto;
    public $fotoRandom;

    public $evaluacionValor,$climaValor,$resFinanciero,$resDesempeno,$valor270,$nineBox;

    public $box1,$box2,$box3,$box4,$box5,$box6,$box7,$box8,$box9;

    public function mount($no_colaborador)
    {
        /* Limpia el cache */
        clearstatcache();

        $this->colaborador = DB::table('infocolaborador')->where('no_colaborador',$no_colaborador)->get();
    
       /*  $this->foto = $this->colaborador[0]->foto; */

        $this->nombre = $this->colaborador[0]->nombre;
        $this->puesto = 'Director';



        $numformFernando = [
            /* Autoevaluacion *//* 0=>'877' */
            /* ResultadoFinacier */ 0=>83,
            /* Evaluacion */ 8=>'446',
            1=>'874',
            2=>'884',
            3=>'885',
            4=>'886',
            5=>'887',
            6=>'888',
            7=>'889',
            
            /* Clima - valor */9=>80,
            10=>'447'
        ];

        $check = 'lUgZ/C2axY8B7bJHHkVwKGmaJJ9JJm3otAosfRhoCeg';
        

        /* Director */
        $this->climaValor = $this->calcularDirector('clima',$numformFernando[9],$this->puesto);
        $this->resFinanciero = $this->calcularDirector('resultadoFinanciero',$numformFernando[0],$this->puesto);

        $EvaluacionObtn = $this->apiObtn($check,$numformFernando[8]);
        $EvaluacionValor = $this->obtnData($EvaluacionObtn);
        

        $EvaluacionObtn = $this->apiObtn($check,$numformFernando[8]);
        $EvaluacionValor = $this->obtnData($EvaluacionObtn);

        $Evaluacion270_1 = $this->apiObtn($check,$numformFernando[1]);
        $EvaluacionValor270_1 = $this->obtnData($Evaluacion270_1);

        $Evaluacion270_2 = $this->apiObtn($check,$numformFernando[2]);
        $EvaluacionValor270_2 = $this->obtnData($Evaluacion270_2);

        $Evaluacion270_3 = $this->apiObtn($check,$numformFernando[3]);
        $EvaluacionValor270_3 = $this->obtnData($Evaluacion270_3);

        $Evaluacion270_4 = $this->apiObtn($check,$numformFernando[4]);
        $EvaluacionValor270_4 = $this->obtnData($Evaluacion270_4);

        $Evaluacion270_5 = $this->apiObtn($check,$numformFernando[5]);
        $EvaluacionValor270_5 = $this->obtnData($Evaluacion270_5);

        $Evaluacion270_6 = $this->apiObtn($check,$numformFernando[6]);
        $EvaluacionValor270_6 = $this->obtnData($Evaluacion270_6);

        $Evaluacion270_7 = $this->apiObtn($check,$numformFernando[7]);
        $EvaluacionValor270_7 = $this->obtnData($Evaluacion270_7);

        $evaluacion_270 = [
            $EvaluacionValor270_1,$EvaluacionValor270_2,
            $EvaluacionValor270_3,$EvaluacionValor270_4,
            $EvaluacionValor270_5,$EvaluacionValor270_6,$EvaluacionValor270_7
        ];

        $this->evaluacionValor = $this->calcularDirector('evaluacion',$EvaluacionValor,$this->puesto);
        $this->valor270 = $this->calcularDirector('270',$evaluacion_270,$this->puesto);

        $total = [$this->climaValor, $this->resFinanciero, $this->evaluacionValor, $this->valor270];
        $this->resDesempeno = $this->calcularDirector('total',$total,$this->puesto);

        $this->nineBoxUbicar($this->resDesempeno);
    }

    public function render()
    {
        return view('livewire.evaluacion-desempeno')->layout('layouts.guest');
    }


    /* Obtener datos del MagicForm desde la API de Factor */
    public function apiObtn($check,$valor)
    {
        /* Consumir una api */
        $res = Http::get('https://factoraguila.com/restapi/index.php',[
            'check'=>$check,
            'formid'=>$valor
        ]);

        $res = $res->body();
        $res = $this->encrypt_decrypt($res);
        
        return json_decode($res);
    }   

    /* Desencriptar información obtenida de la API */
    public function encrypt_decrypt($string) {
        $output = false;
     
        $encrypt_method = "AES-128-ECB";
        $key = '2=XG&%ac~Nu2H[9';
     
        $output = openssl_decrypt($string, $encrypt_method, $key);
     
        return $output;
    }

    /* Filtra datos por array, subtrae el ultimo array y retorna el valor  
    de la encuenesta en un float*/
    public function filtrarValor($filtrar)
    {
        /* Filtrar los arreglos */
        $filtered = Arr::where($filtrar,function($value){
            return is_array($value);
        });
        /* Obtener el ultimo valor del arreglo */
        $ultimo = last($filtered);
        return $this->formatonumero($ultimo['value']);
    }

    /* Accede a la key data del jsn obtenido de la API */
    public function obtnData($datos)
    {
        /* Obtener la claificación del formulario */
        $res = json_decode($datos[0]->data, true);
    
        return $this->filtrarValor($res);
    }

    
    /* Calcula el porcentaje de todas las calificaciones obtenidas del formulario*/
    public function calcularDirector($tipo,$valor,$puesto)
    {

        if($puesto == 'Director'){

            if ( $tipo == '270' && is_array($valor)) {
            
                $total270 = array_sum($valor);
                return $this->formatonumero($total270 / 7*0.10);
    
            }elseif($tipo == 'total' && is_array($valor)){
                return array_sum($valor);
            }else{
                if ($tipo == 'clima') {
                    return $this->formatonumero($valor * 0.10);
                }elseif($tipo == 'resultadoFinanciero'){
                    return $this->formatonumero($valor * 0.20);
                }elseif($tipo == 'evaluacion'){
                    return $this->formatonumero($valor * 0.60);
                }
            }

        }elseif($puesto == 'Gerente'){

            if ( $tipo == '270' && is_array($valor)) {
            
                $total270 = array_sum($valor);
                return $this->formatonumero($total270 / 3*0.10);
    
            }elseif($tipo == 'total' && is_array($valor)){
                return array_sum($valor);
            }else{
                if ($tipo == 'clima') {
                    return $this->formatonumero($valor * 0.10);
                }elseif($tipo == 'autoevaluacion'){
                    return $this->formatonumero($valor * 0.20);
                }elseif($tipo == 'evaluacion'){
                    return $this->formatonumero($valor * 0.60);
                }
            }

        }else{
            /* Administrativo */
            if ($tipo == 'clima') {
                return $this->formatonumero($valor * 0.20);
            }elseif($tipo == 'autoevaluacion'){
                return $this->formatonumero($valor * 0.05);
            }elseif($tipo == 'evaluacion'){
                return $this->formatonumero($valor * 0.75);
            }else{
                /* Total */
                return array_sum($valor);
            }

        }

    }


    /* Pasa el valor obtenido a un float de con dos digitos(12.00) */
    public function formatonumero($cantidad){
        return (float)number_format($cantidad,2);
        
    }

    public function nineBoxUbicar($resultado){
        
        $this->reset([ 'box1','box2','box3','box4','box5','box6','box7','box8','box9' ]);

        $caraFeliz = '<svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd"
            d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z"
            clip-rule="evenodd" />
        </svg>';

        $caraTriste = '<svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-7.536 5.879a1 1 0 001.415 0 3 3 0 014.242 0 1 1 0 001.415-1.415 5 5 0 00-7.072 0 1 1 0 000 1.415z" clip-rule="evenodd" />
      </svg>';

        $cara = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="mx-auto h-12 w-12" fill="currentColor"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-4-8v2h8v-2H8zm0-3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm8 0a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/></svg>';

        if ( ($resultado >= 80) && ($resultado<= 82.5) ) {
            return $this->box1 = $cara; 
        }elseif( ($resultado >= 92.6) && ($resultado<= 94.5) ){
            return $this->box2 = $caraFeliz; 
        }elseif( ($resultado >= 95) && ($resultado<= 100) ){
            return $this->box3 = $caraFeliz; 
        }elseif( ($resultado >= 70) && ($resultado<= 74.9) ){
            return $this->box4 = $caraTriste; 
        }elseif( ($resultado >= 82.6) && ($resultado<= 84.9) ){
            return $this->box5 = $cara; 
        }elseif( ($resultado >= 90) && ($resultado<= 92.5) ){
            return $this->box6 = $caraFeliz; 
        }elseif( $resultado < 69 ) {
            return $this->box7 = $caraTriste; 
        }elseif( ($resultado >= 75) && ($resultado<= 79) ){
            return $this->box8 = $caraTriste; 
        }elseif( ($resultado >= 85) && ($resultado<= 89.9) ){
            return $this->box9 = $cara; 
        }

        
    }

}
