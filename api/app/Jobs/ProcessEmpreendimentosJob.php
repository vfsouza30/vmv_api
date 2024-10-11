<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Bus;
use Illuminate\Bus\Batch;

use App\Services\ApiService;
use App\Models\Clientes;

class ProcessEmpreendimentosJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $sufix_url;
    private $batchSize;
    protected $client;
    protected $apiService;

    /**
     * Create a new job instance.
     */
    public function __construct($client)
    {
        $this->client = $client;
        $this->apiService = new ApiService();
        $this->sufix_url = 'api/cvio';
        $this->batchSize = env('BATCH_SIZE', 60);

        $this->onQueue('process-empreendimentos-job');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $urlCompleted = $this->client->url_cliente . $this->sufix_url . '/empreendimento';

        try {
            $this->processClient($this->client, $urlCompleted);
        } catch (\Exception $e) {
            Log::error('Erro no processamento do cliente: ' . $this->client->id . ' URL: ' . $urlCompleted, [
                'erro' => $e->getMessage()
            ]);
        }
    }

    public function processClient($client, $urlCompleted): void
    {

            Log::info('Processando Empreendimento', [
                'cliente_id' => $client->id,
                'url' => $urlCompleted,
            ]);

            $jobs = [];

            $jobs[] = new ProcessSinglePageJob($client, $urlCompleted, 1, 'empreendimento');

            Bus::batch($jobs)->then(function (Batch $batch) use ($client) {
                Log::info('Lote realizado', ['cliente' => $client]);

            })->dispatch();
    }

}