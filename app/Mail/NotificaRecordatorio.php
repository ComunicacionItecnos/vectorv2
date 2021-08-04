<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificaRecordatorio extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $recordatorio;

    public function __construct($recordatorio)
    {
        $this->recordatorio = $recordatorio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('comunicacion@factoraguila.com')->subject('Recordatorio')->view('emails.notifica-recordatorio')->with([
            'recordatorio' =>$this->recordatorio,
        ]);
    }
}
