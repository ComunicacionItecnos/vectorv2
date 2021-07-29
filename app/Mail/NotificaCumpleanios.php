<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Sichikawa\LaravelSendgridDriver\SendGrid;

class NotificaCumpleanios extends Mailable
{
    use SendGrid;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $col;

    public function __construct($col)
    {
        $this->col = $col;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('comunicacion@factoraguila.com')->subject('Feliz Cumpleaños')->view('emails.notifica-cumpleanio')->with([
            'colaborador' => $this->col,
        ]);
    }
}
