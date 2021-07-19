<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Sichikawa\LaravelSendgridDriver\SendGrid;

class NotificaUNAsignador extends Mailable
{
    use SendGrid;

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
