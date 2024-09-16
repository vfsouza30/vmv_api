<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\LeadsService;
use Illuminate\Support\Facades\Log;
use App\Services\ApiService;
use App\Interfaces\ClientesRepositoryInterface;

class ProcessLeadsPage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $leadsService;
   
    private $sufix_url = 'api/v1/cvdw';
    private $totalPages = 1;

    /**
     * Create a new job instance.
     */
    public function __construct($cliente, ClientesRepositoryInterface $clientesRepository, $urlCompleted, $page)
    {
        $this->clientesRepository = $clientesRepository;
        $this->leadsService = new LeadsService();
        $this->apiService = new ApiService();
    }

    /*protected function makeApiRequest( string $email_cliente, string $token_cliente, int $page, string $url)
    {

       return Http::withHeaders([
            'Content-Type' => 'application/json',
            'email' => $email_cliente,
            'token' => $token_cliente, // Passa a página no body da requisição
        ])->get($url, [
            'pagina' => $page
        ]);
        
    }*/

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        // Processa a página específica da API
        $clientes = $this->clientesRepository->getClients();

        if ($clientes->isNotEmpty()) {
            foreach ($clientes as $cliente) {
                $urlCompleted = $cliente->url_cliente . $this->sufix_url . '/leads';

                try {

                    for ($page = 1; $page <= $totalPages; $page++) {
                        $this->processSinglePage($cliente, $urlCompleted, $page);
                    }

                } catch (\Exception $e) {
                    Log::error('Erro no processamento do cliente: ' . $this->cliente->id, ['erro' => $e->getMessage()]);
                }
            }
        }
    }

    public function processSinglePage($cliente, $urlCompleted, $page)
    {
        Log::info('Inicia Request', [$page]);

        /*if($this->requestCount >= $this->requestsPerMinute){
            $this->throttleRequest();
        }*/

        try{

            $response = $this->apiService->makeApiRequest($cliente->email_cliente, $cliente->token_cliente, $page, $urlCompleted);

        } catch(\Exception $e){

            Log::error('Falha na requisição ao cliente: '. $this->cliente->id, ['erro' => $e->getMessage()]);
            return;

        }
        
        $datas = $response->json();
        Log::info('Finalizou Request', ['Quantidade de dados' => count($datas['dados']), 'Pagina Atual' => $page, 'Total de Paginas' => $datas['total_de_paginas']]);
        
        // Processa os leads da página
        if (count($datas) > 0) {
            $totalPages = $datas['total_de_paginas'];
            $this->leadsService->actionRequest($datas, $cliente->id);
        }
    }
    
}
