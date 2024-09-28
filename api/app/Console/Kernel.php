<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\ProcessAllQueues::class,
    ];
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        
        /*$schedule->command('leads:process')->everyMinute()->runInBackground();
        $schedule->command('vendas:process')->everyMinute()->runInBackground();
        $schedule->command('leads-visita:process')->everyMinute()->runInBackground();
        $schedule->command('corretores:process')->everyMinute()->runInBackground();
        $schedule->command('unidades:process')->everyMinute()->runInBackground();
        $schedule->command('pessoas:process')->everyMinute()->runInBackground();
        $schedule->command('distratos:process')->everyMinute()->runInBackground();
        $schedule->command('atendimentos:process')->everyMinute()->runInBackground();
        $schedule->command('leads-historico-situacoes:process')->everyMinute()->runInBackground();
        $schedule->command('comissoes:process')->everyMinute()->runInBackground();
        $schedule->command('leads-interacoes:process')->everyMinute()->runInBackground();
        $schedule->command('campos-adicionais:process')->everyMinute()->runInBackground();
        $schedule->command('reservas-flags:process')->everyMinute()->runInBackground();
        $schedule->command('assistencias:process')->everyMinute()->runInBackground();
        $schedule->command('leads-conversoes:process')->everyMinute()->runInBackground();
        $schedule->command('leads-tarefas:process')->everyMinute()->runInBackground();
        $schedule->command('imobiliarias:process')->everyMinute()->runInBackground();
        $schedule->command('pre-cadastro:process')->everyMinute()->runInBackground();
        $schedule->command('repasse:process')->everyMinute()->runInBackground();*/

        $schedule->command('queue:processall')->dailyAt('00:00')->runInBackground();
        
        $schedule->command('queue:work --max-jobs=10 --stop-when-empty')->everyMinute()->runInBackground();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
