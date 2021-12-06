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

    public $evaluacionValor,$climaValor,$autoevaluacionValor,$resFinanciero,$resDesempeno,$valor270,$nineBox;

    public $box1,$box2,$box3,$box4,$box5,$box6,$box7,$box8,$box9;

    public function mount($no_colaborador)
    {
        /* Limpia el cache */
        clearstatcache();

        $this->colaborador = DB::table('infocolaborador')->where('no_colaborador',$no_colaborador)->get();
    
       /* $this->foto = $this->colaborador[0]->foto; */

        $this->nombre = $this->colaborador[0]->nombre;
        $this->puesto = 'Director'/* 'Gerente' *//* 'Administrativo' */;

        if ($this->puesto == 'Director') {

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
            $this->climaValor = $this->calcularPorcentaje('clima',$numformFernando[9],$this->puesto);
            $this->resFinanciero = $this->calcularPorcentaje('resultadoFinanciero',$numformFernando[0],$this->puesto);
    
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
    
            $this->evaluacionValor = $this->calcularPorcentaje('evaluacion',$EvaluacionValor,$this->puesto);
            $this->valor270 = $this->calcularPorcentaje('270',$evaluacion_270,$this->puesto);
    
            $total = [$this->climaValor, $this->resFinanciero, $this->evaluacionValor, $this->valor270];
            $this->resDesempeno = $this->calcularPorcentaje('total',$total,$this->puesto);
    
            $this->nineBoxUbicar($this->resDesempeno);
            
        }elseif($this->puesto == 'Gerente'){

            $numformJusto = [
                /* Autoevaluacion */ 0=>78,
                /* Evaluacion */ 1=>90,
                /* Clima */2 =>86, 
                /* 270 */3=>70.50,
                /* 270 */4=>90,
                /* 270 */5=>65.8,

            ];
    
            $check = 'lUgZ/C2axY8B7bJHHkVwKGmaJJ9JJm3otAosfRhoCeg';
            
    
            /* Gerente */
            $this->climaValor = $this->calcularPorcentaje('clima',$numformJusto[2],$this->puesto);
            $this->autoevaluacionValor = $this->calcularPorcentaje('autoevaluacion',$numformJusto[0],$this->puesto);
    
            $this->evaluacionValor = $this->calcularPorcentaje('evaluacion',$numformJusto[1],$this->puesto);

            $EvaluacionValor270_1 = $numformJusto[3];
            $EvaluacionValor270_2 = $numformJusto[4];
            $EvaluacionValor270_3 = $numformJusto[5];

            /*  
            $EvaluacionObtn = $this->apiObtn($check,$numformJusto[1]);
            $EvaluacionValor = $this->obtnData($EvaluacionObtn); 
            
    
            $Evaluacion270_1 = $this->apiObtn($check,$numformFernando[1]);
            $EvaluacionValor270_1 = $this->obtnData($Evaluacion270_1);
    
            $Evaluacion270_2 = $this->apiObtn($check,$numformFernando[2]);
            $EvaluacionValor270_2 = $this->obtnData($Evaluacion270_2);
    
            $Evaluacion270_3 = $this->apiObtn($check,$numformFernando[3]);
            $EvaluacionValor270_3 = $this->obtnData($Evaluacion270_3);
            */
    
            
    
            $evaluacion_270 = [ $EvaluacionValor270_1,$EvaluacionValor270_2,$EvaluacionValor270_3 ];
    
           /*  $this->evaluacionValor = $this->calcularPorcentaje('evaluacion',$EvaluacionValor,$this->puesto); */
            $this->valor270 = $this->calcularPorcentaje('270',$evaluacion_270,$this->puesto);
    
            $total = [$this->climaValor, $this->autoevaluacionValor, $this->evaluacionValor, $this->valor270];
            $this->resDesempeno = $this->calcularPorcentaje('total',$total,$this->puesto);
    
            $this->nineBoxUbicar($this->resDesempeno);

        }else{

            $numformAndres = [
                /* Autoevaluacion */ 0=>80,
                /* Evaluacion */ 1=>70,
                /* Clima */2 =>85.20

            ];
    
            $check = 'lUgZ/C2axY8B7bJHHkVwKGmaJJ9JJm3otAosfRhoCeg';
            
    
            /* Gerente */
            $this->climaValor = $this->calcularPorcentaje('clima',$numformAndres[2],$this->puesto);
            $this->autoevaluacionValor = $this->calcularPorcentaje('autoevaluacion',$numformAndres[0],$this->puesto);
    
            $this->evaluacionValor = $this->calcularPorcentaje('evaluacion',$numformAndres[1],$this->puesto);


            /*  
            $EvaluacionObtn = $this->apiObtn($check,$numformJusto[1]);
            $EvaluacionValor = $this->obtnData($EvaluacionObtn); 
            */

    
           /*  $this->evaluacionValor = $this->calcularPorcentaje('evaluacion',$EvaluacionValor,$this->puesto); */
    
            $total = [$this->climaValor, $this->autoevaluacionValor, $this->evaluacionValor];
            $this->resDesempeno = $this->calcularPorcentaje('total',$total,$this->puesto);
    
            $this->nineBoxUbicar($this->resDesempeno);

        }

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
    public function calcularPorcentaje($tipo,$valor,$puesto)
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

        $iconoExcelente = '<img alt="profil" src="'.asset('images/nineBox/Excelente_Emoticon.png').'" class="mx-auto object-cover" style="width:76%;height:auto;" loading="lazy" />';

        $iconoBien = '<img alt="profil" src="'.asset('images/nineBox/Bien_Emoticon.png').'" class="mx-auto object-cover" style="width:76%;height:auto;" loading="lazy" />';

        $iconoRegular = '<img alt="profil" src="'.asset('images/nineBox/Regular_Emoticon.png').'" class="mx-auto object-cover overflow-hidden" style="width:76%;height:auto;" loading="lazy" />';

        $iconoMal = '<img alt="profil" src="'.asset('images/nineBox/Mal_Emoticon.png').'" class="mx-auto object-cover" style="width:76%;height:auto;" loading="lazy" />';

        /* Info del resultado */

        if ( ($resultado >= 80) && ($resultado<= 82.5) ) {
            return $this->box1 = $iconoRegular; 
        }elseif( ($resultado >= 92.6) && ($resultado<= 94.5) ){
            return $this->box2 = $iconoBien; 
        }elseif( ($resultado >= 95) && ($resultado<= 100) ){
            return $this->box3 = $iconoExcelente; 
        }elseif( ($resultado >= 70) && ($resultado<= 74.9) ){
            return $this->box4 = $iconoMal; 
        }elseif( ($resultado >= 82.6) && ($resultado<= 84.9) ){
            return $this->box5 = $iconoRegular; 
        }elseif( ($resultado >= 90) && ($resultado<= 92.5) ){
            return $this->box6 = $iconoBien; 
        }elseif( $resultado < 69 ) {
            return $this->box7 = $iconoMal; 
        }elseif( ($resultado >= 75) && ($resultado<= 79) ){
            return $this->box8 = $iconoMal; 
        }elseif( ($resultado >= 85) && ($resultado<= 89.9) ){
            return $this->box9 = $iconoRegular; 
        }

    }

}