<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\ProcessLeadsPageJob;
use App\Interfaces\ClientesRepositoryInterface;
use Illuminate\Support\Facades\Bus;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Log;
use Throwable;

class DispatchLeadsJob extends Command
{
    protected $signature = 'leads:process';
    protected $description = 'Dispatch the ProcessLeadsPage job';

    protected $clientesRepository;
    protected $batchSize = 10;

    public function __construct(ClientesRepositoryInterface $clientesRepository)
    {
        parent::__construct();
        $this->clientesRepository = $clientesRepository;
    }

    public function handle()
    {
        log::info('Iniciando o despacho de Leads');
        $clients = $this->clientesRepository->getClients();
       // $chunks_clients = array_chunk($clients->toArray(), $this->batchSize);

        $attempts = 0;
        $initial_clients = 1;
        $final_clients = 10;

        //foreach ($chunks_clients as $chunk) {
        $clients->chunck(10, function ($chuncks_client) use ($initial_clients, $final_clients, $attempts){

            $jobs = [];
            $attempts++;
            $margin = $initial_clients * $attempts . ' ha ' . $final_clients * $attempts;

            foreach ($chuncks_client as $client) {
                $jobs[] = new ProcessLeadsPageJob($client);
            }

            Bus::batch($jobs)->then(function (Batch $batch) {

                Log::info('Lote processado com sucesso.');

            })->catch(function (Batch $batch, Throwable $e) use ($margin) {

                Log::error('Falha ao processar lote: ', [
                    'menssagem' => $e->getMessage(),
                    'margem clientes' => $margin
                ]);

            })->dispatch();
        });
    }
}
