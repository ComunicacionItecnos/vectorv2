<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\NotificaRecordatorio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class recordatorios extends Command
{

    protected $signature = 'enviar:recordatorio';

    protected $description = 'Recordatorios';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $carbon = new \Carbon\Carbon();

       $carbon = new \Carbon\Carbon();
       
        $recordatorios = DB::table('recordatorios')
            ->select('recordatorios.id','recordatorios.colaborador_no_colaborador','recordatorios.descripcionRecordatorio','recordatorios.fechaVencimiento','recordatorios.frecuencia','recordatorios.fechaFrecuencia','recordatorios.estado_recordatorio',
                    'recordatorios.updated_at','colaborador.nombre_1','colaborador.correo')
            ->join('colaborador','recordatorios.colaborador_no_colaborador','=','colaborador.no_colaborador')
            ->where('recordatorios.estado_recordatorio','=','1')
            ->get();    
        
        foreach ($recordatorios as $recordatorio) {
            
            $fechaFrecuencia = $carbon::parse($recordatorio->fechaFrecuencia);
           
            // $carbon::create(2021, 7, 31) -> funcion para asignar fecha manual

            $this->compararVencimiento($recordatorio,$recordatorio->id,$carbon::now(),$recordatorio->fechaVencimiento,$carbon = new \Carbon\Carbon(),$recordatorio->frecuencia,$fechaFrecuencia);
        }

    }

    public function compararVencimiento($recordatorio,$id,$fechaActual,$fechaVencimiento,$carbon,$frecuencia,$fechaFrecuencia){
        $carbon = $carbon;
        $fechaActual = $carbon::parse($fechaActual)->format('Y-m-d');
        $fechaVencimiento = $carbon::parse($fechaVencimiento)->format('Y-m-d');
        
        if ($fechaActual == $fechaVencimiento) {
            // enviar correo indicando la finalizacion del recordatorio.
            DB::table('recordatorios')->select('recordatorios.id,recordatorios.estado_recordatorio')
                ->where('id','=',$id)->update(['estado_recordatorio'=>0]);
            Mail::to($recordatorio->correo)->send(new NotificaRecordatorio(
                $recordatorio
            ));
        }else{
            // ejecutar la segunda funcion para sumar los dias dependiendo la frecuencia del recordatorio.
            $this->frecunciaRecordatorio($recordatorio,$id,$fechaActual,$frecuencia,$fechaFrecuencia,$carbon);
        }
        
    }

    public function frecunciaRecordatorio($recordatorio,$id,$fechaActual,$frecuencia,$fechaFrecuencia,$carbon){
        $carbon = $carbon;
        $fechaActual = $carbon::parse($fechaActual);

        if ( $fechaFrecuencia == $fechaActual ) {

            if ($frecuencia == 0 ) {
                $fechaFrecuencia= $fechaFrecuencia->addDay(1);
                $fechaFrecuencia = $carbon::parse($fechaFrecuencia)->format('Y-m-d');
                
                DB::table('recordatorios')->where('id','=',$id)->update(['fechaFrecuencia'=>$fechaFrecuencia]);
                 // Enviar correo del recordatorio
                Mail::to($recordatorio->correo)->send(new NotificaRecordatorio(
                    $recordatorio
                ));
            }
            
            if($frecuencia == 1){
                $fechaFrecuencia= $fechaFrecuencia->addWeek(1);
                $fechaFrecuencia = $carbon::parse($fechaFrecuencia)->format('Y-m-d');
    
                DB::table('recordatorios')->where('id','=',$id)->update(['fechaFrecuencia'=>$fechaFrecuencia]);
                // Enviar correo del recordatorio
                Mail::to($recordatorio->correo)->send(new NotificaRecordatorio(
                    $recordatorio
                ));
            }
            
            if($frecuencia == 2){
                $fechaFrecuencia= $fechaFrecuencia->addMonth(1);
                $fechaFrecuencia = $carbon::parse($fechaFrecuencia)->format('Y-m-d');
    
                DB::table('recordatorios')->where('id','=',$id)->update(['fechaFrecuencia'=>$fechaFrecuencia]);
                // Enviar correo del recordatorio
                Mail::to($recordatorio->correo)->send(new NotificaRecordatorio(
                    $recordatorio
                ));
            }
            
            if($frecuencia == 3){
                $fechaFrecuencia= $fechaFrecuencia->addYear(1);
                $fechaFrecuencia = $carbon::parse($fechaFrecuencia)->format('Y-m-d');
    
                DB::table('recordatorios')->where('id','=',$id)->update(['fechaFrecuencia'=>$fechaFrecuencia]);
                // Enviar correo del recordatorio
                Mail::to($recordatorio->correo)->send(new NotificaRecordatorio(
                    $recordatorio
                ));
            }
           
        }else{
            
        }

    }

}
