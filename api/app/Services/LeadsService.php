<?php

// app/Services/LeadsService.php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Interfaces\LeadsRepositoryInterface;
use App\Interfaces\ClientesRepositoryInterface;
use App\Models\Leads;
use App\Models\Clientes;
use App\Exceptions\ApiRequestException;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Jobs\ProcessLeadsPage;

class LeadsService
{
    protected $leadsRepository;
    protected $requestsPerMinute = 200; // Limite de requisições
    protected $requestCount = 0; // Contador de requisições
    protected $startTime; // Hora do início do lote de requisições

    
    private $sufix_url = 'api/v1/cvdw';

    public function __construct(LeadsRepositoryInterface $leadsRepository)
    {
        //parent::__construct();
        $this->leadsRepository = $leadsRepository;
        $this->clientesRepository = $clientesRepository;
        $this->startTime = Carbon::now(); // Inicia o timestamp
    }

   /* protected function makeApiRequest( string $email_cliente, string $token_cliente, int $page, string $url)
    {
        // Fazer a requisição com a página específica
        $this->requestCount++; // Incrementa o contador de requisições

       return Http::withHeaders([
            'Content-Type' => 'application/json',
            'email' => $email_cliente,
            'token' => $token_cliente, // Passa a página no body da requisição
        ])->get($url, [
            'pagina' => $page
        ]);

    }*/

    protected function throttleRequest()
    {
        // Calcular o tempo decorrido desde o início do lote de requisições
        $elapsedTime = Carbon::now()->diffInSeconds($this->startTime);

        // Se o tempo decorrido for menor que 60 segundos, aguarde o tempo restante
        if($elapsedTime < 60) {

            $waitTime = 60 - $elapsedTime;
            // Usar uma solução de espera não bloqueante com enventos ou filas
            sleep($waitTime); // Aqui usamos sleep para simular o tempo de espera
        }

        // Resetar o contador de requisições e o timestamp
        $this->requestCount = 0;
        $this->startTime = Carbon::now(); // Inicia o timestamp novamente

    }

    /*public function fetchAndStoreLead()
    {
        $clientes = $this->clientesRepository->getClients();
        if ($clientes->isNotEmpty()) {
            foreach ($clientes as $cliente) {
                try{
                    $urlCompleted = $cliente->url_cliente . $this->sufix_url . '/leads';
                    $this->processClientLeads($cliente, $urlCompleted);
                } catch (ApiRequestException $e) {
                    Log::error(now(). ' - Erro ao Buscar leads', ['cliente_id' => $cliente->id, 'response' => $response->body()]);
                    continue;
                }
             }
        }
    }*/

   /* protected function processClientLeads($cliente, $urlCompleted)
    {
        $currentPage = 1;
        $totalPages = 1;

        while ($currentPage <= $totalPages) {
            if($this->requestCount >= $this->requestsPerMinute){
                $this->throttleRequest();
            }
            
            $response = $this->makeApiRequest($cliente->email_cliente, $cliente->token_cliente, $currentPage, $urlCompleted);

            if($response->failed()) {
                throw new ApiRequestException('Failed to fetch leads from API.');
            }
            
            $datas = $response->json();

            // Atualizar o número total de páginas
            if(count($datas) > 0) {

                $totalPages = $datas['total_de_paginas'];
    
                // Processar os dados recebidos
                $this->actionRequest($datas, $cliente->id);
            }

            // Incrementar a página
            $currentPage++;
        }
    }*/

    /*protected function processClientLeads($cliente, $urlCompleted)
    {
        $currentPage = 1;
        $response = $this->makeApiRequest($cliente->email_cliente, $cliente->token_cliente, $currentPage, $urlCompleted);

        if($response->failed()) {
            throw new ApiRequestException('Failed to fetch leads from API.');
        }

        $datas = $response->json();
        $totalPages = $datas['total_de_paginas'];

        // Enfileira um job para cada página da API
        for ($page = 1; $page <= $totalPages; $page++) {
            Log::info('teste', [$page]);
            ProcessLeadsPage::dispatch($cliente, $urlCompleted, $page)->onQueue('leads');
        }
    }*/

    public function actionRequest($datas, $clienteId)
    {
        foreach ($datas['dados'] as $data){
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
                'clientes_id' => $clienteId,
            ];
            $return = $this->leadsRepository->saveLeads($leadData);
        }
    }

}
