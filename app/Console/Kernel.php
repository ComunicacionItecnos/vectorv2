<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\CorreoCumpleanios::class,
        Commands\CorreoAniversario::class,
        Commands\recordatorios::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('enviar:correocumple')
            ->timezone('America/Mexico_City')
            ->dailyAt('08:00')
            ->runInBackground();

        $schedule->command('enviar:correoaniversario')
            ->timezone('America/Mexico_City')
            ->dailyAt('08:00')
            ->runInBackground();

        $schedule->command('enviar:recordatorio')
            ->timezone('America/Mexico_City')
            ->dailyAt('08:30')
            // ->appendOutputTo('public/test2.txt');
            ->runInBackground();

        /* $schedule->command('enviar:correoruns')
        ->timezone('America/Mexico_City')
        ->thursdays()
        ->at('16:00')
        ->runInBackground(); */
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
