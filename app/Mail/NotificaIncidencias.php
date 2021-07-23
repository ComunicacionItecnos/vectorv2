<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificaIncidencias extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    protected $ColaboradorRegistro;
    protected $nombre_colaborador;
    protected $tipo_incidencia;


    public function __construct($ColaboradorRegistro, $nombre_colaborador, $tipo_incidencia)
    {
        $this->ColaboradorRegistro = $ColaboradorRegistro;
        $this->nombre_colaborador = $nombre_colaborador;
        $this->tipo_incidencia = $tipo_incidencia;
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
        ]);
    }
}
