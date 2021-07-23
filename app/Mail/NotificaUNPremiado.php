<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Sichikawa\LaravelSendgridDriver\SendGrid;

class NotificaUNPremiado extends Mailable
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
    protected $valor_business;


    public function __construct($nombreAsignador, $correoAsignador, $nombrePremiado, $correoPremiado, $mensaje, $tipo_insignia, $valor_business)
    {
        $this->nombreAsignador = $nombreAsignador;
        $this->correoAsignador = $correoAsignador;
        $this->nombrePremiado = $nombrePremiado;
        $this->correoPremiado = $correoPremiado;
        $this->mensaje = $mensaje;
        $this->tipo_insignia = $tipo_insignia;
        $this->valor_business = $valor_business;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('comunicacion@factoraguila.com')->subject('Felicidades, eres acreedor a una insignia.')->view('emails.notifica-insignia')->with([
            'nombreAsignador' => $this->nombreAsignador,
            'correoAsignador' => $this->correoAsignador,
            'nombrePremiado' => $this->nombrePremiado,
            'correoPremiado' => $this->correoPremiado,
            'mensaje' => $this->mensaje,
            'tipo_insignia' => $this->tipo_insignia,
            'valor_business' => $this->valor_business
        ]);
    }
}
