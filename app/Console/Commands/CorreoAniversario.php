<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Mail\NotificaAniversario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CorreoAniversario extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'enviar:correoaniversario';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Felicitación diaria de aniversarios por correo';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $aniversarioDia = DB::table('cumples_aniversarios')
        ->where('aniversario', Carbon::now()->isoFormat('MM-D'))
            ->get();

        foreach ($aniversarioDia as $key) {

        $colaborador = DB::table('colaborador')
        ->where('no_colaborador', $key->no_colaborador)
            ->get();

        $col = $colaborador[0];
        $anios = $key->anios;

        Mail::to($col->correo)->send(new NotificaAniversario(
            $col,
            $anios,
        ));
    }
    }
}
