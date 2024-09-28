<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ProcessAllQueues extends Command
{
    protected $signature = 'queue:processall';
    protected $description = 'Processa todas as filas de uma vez';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $commands = [
            'leads:process',
            'vendas:process',
            'leads-visita:process',
            'corretores:process',
            'unidades:process',
            'pessoas:process',
            'distratos:process',
            'atendimentos:process',
            'leads-historico-situacoes:process',
            'comissoes:process',
            'leads-interacoes:process',
            'campos-adicionais:process',
            'reservas-flags:process',
            'assistencias:process',
            'leads-conversoes:process',
            'leads-tarefas:process',
            'imobiliarias:process',
            'pre-cadastro:process',
            'repasse:process',
            'reservas:process'
        ];

        foreach ($commands as $command) {
            $this->call($command);
        }
    }
}