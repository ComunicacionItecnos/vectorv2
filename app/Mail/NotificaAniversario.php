<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificaAniversario extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $col;
    protected $anios;


    public function __construct($col, $anios)
    {
        $this->col = $col;
        $this->anios = $anios;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('comunicacion@factoraguila.com')->subject('Feliz Aniversario')->view('emails.notifica-aniversario')->with([
            'colaborador' => $this->col,
            'anios' => $this->anios,
        ]);
    }
}
