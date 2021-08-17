<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Sichikawa\LaravelSendgridDriver\SendGrid;

class NotificaReporteUN extends Mailable
{
    use SendGrid;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $fecha_actual;
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->fecha_actual = Carbon::now()->format('Y-m-d');
        return $this->from('comunicacion@factoraguila.com')->subject('Nuevo reporte de Insignias UN')->view('emails.notifica-reporte-insigniaun')
            ->attachFromStorage('/public/reportes/insignias_un', 'reporte_insignias_UN('.$this->fecha_actual.').xlsx');
    }
}
