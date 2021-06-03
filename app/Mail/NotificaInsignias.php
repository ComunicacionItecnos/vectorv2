<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificaInsignias extends Mailable
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
        return $this->from($this->correoAsignador)->subject('Felicidades, eres acreedor a una insignia.')->view('emails.notifica-insignia')->with([
            'nombreAsignador' => $this->nombreAsignador,
            'correoAsignador' => $this->correoAsignador,
            'nombrePremiado' => $this->nombrePremiado,
            'correoPremiado' => $this->correoPremiado,
            'mensaje' => $this->mensaje,
            'tipo_insignia' => $this->tipo_insignia
        ]);
    }
}
