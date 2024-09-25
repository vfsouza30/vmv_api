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

class ProcessLeadsInteracoesPageJob implements ShouldQueue
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
        $this->sufix_url = env('API_URL_SUFFIX', 'api/v1/cvdw');
        $this->batchSize = env('BATCH_SIZE', 60);

        $this->onQueue('process-leads-interacoes-page-job');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $urlCompleted = $this->client->url_cliente . $this->sufix_url . '/leads/interacoes';

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

        $page = 1;
        $totalPages = $this->getTotalPages($client, $urlCompleted);

        if ($page < 1) {

            Log::warning('Número de página inicial inválido, ajustando para 1', [
                'cliente_id' => $client->id,
                'pagina' => $page
            ]);

            $page = 1;
        }

        while ($page <= $totalPages) {

            $endPage = min($page + $this->batchSize - 1, $totalPages);

            Log::info('Processando páginas', [
                'cliente_id' => $client->id,
                'url' => $urlCompleted,
                'pagina_inicial' => $page,
                'pagina_final' => $endPage
            ]);

            $jobs = [];

            for ($currentPage = $page; $currentPage <= $endPage; $currentPage++) {
                $jobs[] = new ProcessSinglePageJob($client, $urlCompleted, $currentPage, 'leadsInteracoes');
            }

            Bus::batch($jobs)->then(function (Batch $batch) use ($client, $endPage) {
                Log::info('Lote realizado', ['cliente' => $client, 'end_page' => $endPage]);

            })->dispatch();

            $page = $endPage + 1;
        }
    }

    public function getTotalPages($client, $urlCompleted): int
    {
        $attempts = 0;
        $maxAttempts = 5;
        $waitTime = 1;

        while ($attempts < $maxAttempts) {

            try{

                $response = $this->apiService->makeApiRequest(
                    $client->email_cliente, 
                    $client->token_cliente, 
                    1, 
                    $urlCompleted
                );

                $datas = $response->json();

                if (!isset($datas['total_de_paginas']) || !is_int($datas['total_de_paginas'])) {
                    Log::error('Total de paginas inválida', [
                        'cliente_id' => $client->id,
                        'url' => $urlCompleted,
                        'response' => $datas
                    ]);
                    return 0;
                }

                return $datas['total_de_paginas'];

            } catch (\Exception $e) {

                $attempts++;
                Log::warning('Tentativa de obter total de páginas falhou', [
                    'cliente_id' => $client->id,
                    'url' => $urlCompleted,
                    'tentativa' => $attempts,
                    'erro' => $e->getMessage()
                ]);
                sleep($waitTime);
                $waitTime *= 2; // Recuo exponencial
            }
        }
        Log::error('Falha ao obter total de páginas após várias tentativas', [
            'cliente_id' => $client->id,
            'url' => $urlCompleted
        ]);
        return 0;
    }
}
