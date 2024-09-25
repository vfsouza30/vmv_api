<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        
        //$schedule->command('leads:process')->everyDay()->runInBackground();
        //$schedule->command('vendas:process')->everyDay()->runInBackground();
        //$schedule->command('leads-visita:process')->everyDay()->runInBackground();
        //$schedule->command('corretores:process')->everyDay()->runInBackground();
        //$schedule->command('unidades:process')->everyDay()->runInBackground();
        //$schedule->command('pessoas:process')->everyDay()->runInBackground();
        //$schedule->command('distratos:process')->everyDay()->runInBackground();
        //$schedule->command('atendimentos:process')->everyDay()->runInBackground();
        //$schedule->command('leads-historico-situacoes:process')->everyDay()->runInBackground();
        //$schedule->command('comissoes:process')->everyDay()->runInBackground();
        //$schedule->command('leads-interacoes:process')->everyDay()->runInBackground();
        //$schedule->command('campos-adicionais:process')->everyDay()->runInBackground();
        //$schedule->command('reservas-flags:process')->everyDay()->runInBackground();
        //$schedule->command('assistencias:process')->everyDay()->runInBackground();
        //$schedule->command('leads-conversoes:process')->everyDay()->runInBackground();
        //$schedule->command('leads-tarefas:process')->everyDay()->runInBackground();
        //$schedule->command('imobiliarias:process')->everyDay()->runInBackground();
        //$schedule->command('pre-cadastro:process')->everyDay()->runInBackground();
        //$schedule->command('repasse:process')->everyDay()->runInBackground();
        $schedule->command('queue:work --max-jobs=2 --stop-when-empty')->everyMinute()->runInBackground();
        //$schedule->command('queue:work --queue=process-leads-page-job --name=ProcessLeadsPageJob --max-jobs=1 --stop-when-empty')->everyMinute()->runInBackground();
        //$schedule->command('queue:work --queue=process-leads-page-job --name=ProcessLeadsPageJob --max-jobs=1 --stop-when-empty')->everyMinute()->runInBackground();
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
