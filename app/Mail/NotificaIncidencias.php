<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Sichikawa\LaravelSendgridDriver\SendGrid;

class NotificaIncidencias extends Mailable
{
    use SendGrid;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    protected $ColaboradorRegistro;
    protected $nombre_colaborador;
    protected $tipo_incidencia;
    protected $incidencias_correo;


    public function __construct($ColaboradorRegistro, $nombre_colaborador, $tipo_incidencia, $incidencias_correo)
    {
        $this->ColaboradorRegistro = $ColaboradorRegistro;
        $this->nombre_colaborador = $nombre_colaborador;
        $this->tipo_incidencia = $tipo_incidencia;
        $this->incidencias_correo = $incidencias_correo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('comunicacion@factoraguila.com')->subject('Nueva incidencia')->view('emails.notifica-incidencia')->with([
            'no_colaborador' => $this->ColaboradorRegistro,
            'nombre_colaborador' => $this->nombre_colaborador,
            'tipo_incidencia' => $this->tipo_incidencia,
            'incidencias_correo' => $this->incidencias_correo,
        ]);
    }
}
