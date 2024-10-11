<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Exceptions\ApiRequestException;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Log;

use App\Models\Clientes;
use App\Models\Workflow;

class WorkFlowService
{
    protected $apiService;
    protected $client;
    protected $urlCompleted;
    protected $sufix_url;
    public function processWorkflow($clientId, $table)
    {
       
        $this->client = Clientes::find($clientId);

        $this->apiService = new ApiService();
        $this->page = 1;
        $this->sufix_url = 'api/v1/cv/workflow';
        $this->urlCompleted =  $this->client->url_cliente . $this->sufix_url . '/' . $table;
        
        $attempts = 0;
        $maxAttempts = 5;
        $waitTime = 1; // em segundos

        while ($attempts < $maxAttempts){

            try {
                Log::info('Inicio Request Workflow');
                    $response = $this->apiService->makeApiRequest(
                        $this->client->email_cliente, 
                        $this->client->token_cliente, 
                        $this->page, 
                        $this->urlCompleted,
                        1
                    );                    
    
                if ($response->status() !== 200) {
                    throw new \Exception('Código de status inválido: ' . $response->status());
                }
    
                $datas = $response->json();
                $this->actionRequestWorkFlow($datas, $clientId, $table);
                
                Log::info('Finalizou Request Workflow');
                break;
    
            } catch (\Exception $e) {

               $attempts++;
                Log::warning('Tentativa de processar workflow', [
                    'cliente_id' => $this->client->id,
                    'url' => $this->urlCompleted,
                    'tentativa' => $attempts,
                    'erro' => $e->getMessage()
                ]);

                sleep($waitTime);
                $waitTime *= 2; // Recuo exponencial
            }
        }        
    }

    public function actionRequestWorkFlow($datas, $clientId, $table){
        foreach ($datas as $data){
            $workflow = [
                'ordem' => $data['ordem'],
                'idsituacao' => $data['idsituacao'],
                'nome' => $data['nome'],
                'cor_bg' => $data['cor_bg'],
                'cor_nome' => $data['cor_nome'],
                'flags' => json_encode($data['flags']),
                'tabela_nome' => $table,
                'clientes_id' => $clientId,
            ];
            Workflow::create($workflow);
        }
    }
    
}
