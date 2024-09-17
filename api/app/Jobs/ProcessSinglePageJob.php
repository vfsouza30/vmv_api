<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use App\Services\ApiService;
use App\Intefaces\LeadsRepositoryInterface;
use App\Models\Leads;

class ProcessSinglePageJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $apiService;
    protected $client;
    protected $urlCompleted;
    protected $page;

    public $tries = 5;

    /**
     * Create a new job instance.
     */
    public function __construct($client, $urlCompleted, $page)
    {
        $this->client = $client;
        $this->urlCompleted = $urlCompleted;
        $this->page = $page;
        $this->apiService = new ApiService();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Inicia Request', [$this->page]);

        $attempts = 0;
        $maxAttempts = 5;
        $waitTime = 1; // em segundos

        while ($attempts < $maxAttempts){

            try {

                $response = $this->apiService->makeApiRequest(
                    $this->client->email_cliente, 
                    $this->client->token_cliente, 
                    $this->page, 
                    $this->urlCompleted
                );
    
                if ($response->status() !== 200) {
                    throw new \Exception('Código de status inválido: ' . $response->status());
                }
    
                $datas = $response->json();
    
                if (!isset($datas['dados']) || !is_array($datas['dados']) || !isset($datas['total_de_paginas']) || !is_int($datas['total_de_paginas'])) {
                    throw new \Exception('Estrutura de resposta inválida');
                }
    
                Log::info('Finalizou Request', [
                    'Quantidade de dados' => count($datas['dados']),
                    'Pagina Atual' => $this->page, 
                    'Total de Paginas' => $datas['total_de_paginas']
                ]);
        
                if (count($datas['dados']) > 0) {
                    $this->actionRequest($datas, $this->client->id);
                }
    
                break;
    
            } catch (\Exception $e) {

               $attempts++;
                Log::warning('Tentativa de processar página falhou', [
                    'cliente_id' => $this->client->id,
                    'url' => $this->urlCompleted,
                    'pagina' => $this->page,
                    'tentativa' => $attempts,
                    'erro' => $e->getMessage()
                ]);

                sleep($waitTime);
                $waitTime *= 2; // Recuo exponencial
            }
        }

        if ($attempts == $maxAttempts) {

            Log::error('Falha ao processar página após várias tentativas', [
                'cliente_id' => $this->client->id,
                'url' => $this->urlCompleted,
                'pagina' => $this->page
            ]);
        }

    }

    public function actionRequest($datas, $clientId)
    {   
        dd(count($datas['dados']));
        foreach ($datas['dados'] as $data){
            Log::info('referencia:', ['referencia' => $data['referencia']]);
            $leadData = [
                'referencia' => $data['referencia'], 
                'referencia_data' => $data['referencia_data'],
                'ativo' => $data['ativo'], 
                'idlead' => $data['idlead'],
                'idsituacao' => $data['idsituacao'],
                'situacao' => $data['situacao'],
                'data_cad' => $data['data_cad'], 
                'cep_cliente' => $data['cep_cliente'],
                'conversao_original' => $data['conversao_original'],
                'conversao_ultimo' => $data['conversao_ultimo'],
                'conversao' => $data['conversao'],
                'idempreendimento' => $data['idempreendimento'],
                'codigointerno_empreendimento' => $data['codigointerno_empreendimento'],
                'empreendimento' => $data['empreendimento'],
                'idempreendimento_primeiro' => $data['idempreendimento_primeiro'],
                'empreendimento_primeiro' => $data['empreendimento_primeiro'],
                'idempreendimento_ultimo' => $data['idempreendimento_ultimo'],
                'empreendimento_ultimo' => $data['empreendimento_ultimo'],
                'idmotivo' => $data['idmotivo'],
                'motivo' => $data['motivo'],
                'reserva' => $data['reserva'],
                'idgestor' => $data['idgestor'],
                'gestor' => $data['gestor'],
                'idcorretor' => $data['idcorretor'],
                'corretor' => $data['corretor'],
                'idimobiliaria' => $data['idimobiliaria'],
                'imobiliaria' => $data['imobiliaria'],
                'origem'  => $data['origem'],
                'origem_ultimo' => $data['origem_ultimo'],
                'midia_original' => $data['midia_original'],
                'midia_ultimo' => $data['midia_ultimo'],
                'renda_familiar' => $data['renda_familiar'] ?? '',
                'motivo_cancelamento' => $data['motivo_cancelamento'],
                'data_cancelamento' => $data['data_cancelamento'],
                'data_ultima_interacao' => $data['data_ultima_interacao'],
                'cidade' => $data['cidade'],
                'estado' => $data['estado'],
                'regiao' => $data['regiao'],
                'ultima_data_conversao' => $data['ultima_data_conversao'],
                'data_reativacao' => $data['data_reativacao'],
                'idsituacao_anterior' => $data['idsituacao_anterior'],
                'nome_situacao_anterior_lead' => $data['nome_situacao_anterior_lead'],
                'tags' => $data['tags'],
                'descricao_motivo_cancelamento' => $data['descricao_motivo_cancelamento'],
                'possibilidade_venda' => $data['possibilidade_venda'],
                'inserido_bolsao' => $data['inserido_bolsao'],
                'data_primeira_interacao_gestor' => $data['data_primeira_interacao_gestor'],
                'data_primeira_interacao_corretor' => $data['data_primeira_interacao_corretor'],
                'idgestor_ultimo' => $data['idgestor_ultimo'],
                'gestor_ultimo' => $data['gestor_ultimo'],
                'idcorretor_ultimo' => $data['idcorretor_ultimo'],
                'corretor_ultimo' => $data['corretor_ultimo'],
                'idcorretor_penultimo' => $data['idcorretor_penultimo'],
                'idimobiliaria_ultimo' => $data['idimobiliaria_ultimo'],
                'corretor_penultimo' => $data['corretor_penultimo'],
                'nome_momento_lead' => $data['nome_momento_lead'],
                'novo' => $data['novo'],
                'retorno' => $data['retorno'],
                'data_ultima_alteracao' => $data['data_ultima_alteracao'],
                'vencido' => $data['vencido'],
                'data_vencimento' => $data['data_vencimento'],
                'clientes_id' => $clientId,
            ];

            return Leads::create($leadData);
        }
    }
}