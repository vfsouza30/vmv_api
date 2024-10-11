<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\ProcessRepassePageJob;
use App\Interfaces\ClientesRepositoryInterface;
use Illuminate\Support\Facades\Bus;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Log;
use Throwable;
use App\Models\Clientes;
use App\Services\WorkFlowService;

class DispatchRepasseJob extends Command
{
    protected $signature = 'repasse:process';
    protected $description = 'Dispatch the ProcessRepassePage job';

    protected $clientesRepository;
    protected $batchSize = 10;
    
    protected $workFlowService;

    public function __construct(ClientesRepositoryInterface $clientesRepository)
    {
        parent::__construct();
        $this->clientesRepository = $clientesRepository;
        $this->workFlowService = new WorkFlowService();
    }

    public function handle()
    {
        log::info('Iniciando o despacho de Repasse');

        /* Voltar quando for fazer dos demais clientes*/
        $clients = $this->clientesRepository->getClients();

        $attempts = 0;
        $initial_clients = 1;
        $final_clients = 10;
        
        //$client = Clientes::find(1);
        
        /* Voltar quando for fazer dos demais clientes */        
        foreach ($clients->chunk(10) as $chunks_client) {
            $jobs = [];
            $attempts++;
            $margin = $initial_clients * $attempts . ' ha ' . $final_clients * $attempts;

            foreach ($chunks_client as $client) {
                
                $jobs[] = new ProcessRepassePageJob($client);
            }

            Bus::batch($jobs)->then(function (Batch $batch) {

                Log::info('Lote processado com sucesso.');

            })->catch(function (Batch $batch, Throwable $e) use ($margin) {

                Log::error('Falha ao processar lote: ', [
                    'menssagem' => $e->getMessage(),
                    'margem clientes' => $margin
                ]);

            })->name('ProcessRepassePageJob')->dispatch();

            foreach ($chunks_client as $client) {
                $this->workFlowService->processWorkflow($client->id, 'repasses');
            }
        }
    }
}
