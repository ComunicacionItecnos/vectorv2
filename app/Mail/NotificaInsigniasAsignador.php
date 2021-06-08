<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificaInsigniasAsignador extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $nombreAsignador;
    protected $correoAsignador;
    protected $nombrePremiado;
    protected $correoPremiado;
    protected $mensaje;
    protected $tipo_insignia;
    public $nombreInsignia;

    public function __construct($nombreAsignador, $correoAsignador, $nombrePremiado, $correoPremiado, $mensaje, $tipo_insignia)
    {
        $this->nombreAsignador = $nombreAsignador;
        $this->correoAsignador = $correoAsignador;
        $this->nombrePremiado = $nombrePremiado;
        $this->correoPremiado = $correoPremiado;
        $this->mensaje = $mensaje;
        $this->tipo_insignia = $tipo_insignia;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        if($this->tipo_insignia == 1){
            $this->nombreInsignia = 'Oro';
        }elseif($this->tipo_insignia == 2){
            $this->nombreInsignia = 'Plata';
        }elseif($this->tipo_insignia == 3){
            $this->nombreInsignia = 'Bronce';
        }

        return $this->from('comunicacion@factoraguila.com')->subject('Has asignado una insignia de ' . $this->nombreInsignia)->view('emails.notifica-insignia-asignador')->with([
            'nombreAsignador' => $this->nombreAsignador,
            'correoAsignador' => $this->correoAsignador,
            'nombrePremiado' => $this->nombrePremiado,
            'correoPremiado' => $this->correoPremiado,
            'mensaje' => $this->mensaje,
            'tipo_insignia' => $this->tipo_insignia
        ]);
    }
}
