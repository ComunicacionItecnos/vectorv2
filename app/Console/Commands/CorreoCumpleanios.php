<?php

namespace App\Console\Commands;

use App\Mail\NotificaCumpleanios;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CorreoCumpleanios extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'enviar:correocumple';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Felicitación diaria de cumpleaños por correo';

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
     *8
     * @return int
     */
    public function handle()
    {
        $cumpleDia = DB::table('cumples_aniversarios')
            ->where('cumple', Carbon::now()->isoFormat('MM-DD'))
            ->get();

        foreach ($cumpleDia as $key) {

            $colaborador = DB::table('colaborador')
                ->where('no_colaborador', $key->no_colaborador)
                ->get();

            $col = $colaborador[0];

            Mail::to($col->correo)->send(new NotificaCumpleanios(
                $col
            ));
        }
    }
}
