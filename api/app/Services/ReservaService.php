<?php

// app/Services/ReservaService.php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Interfaces\ReservaRepositoryInterface;
use App\Models\Reserva;
use App\Models\Clientes;
use App\Exceptions\ApiRequestException;

class ReservaService
{
    protected $reservaRepository;
    private $url = "https://integracao.cvcrm.com.br/api/v1/cvdw";

    public function __construct(ReservaRepositoryInterface $reservaRepository)
    {
        $this->reservaRepository = $reservaRepository;
    }

    public function fetchAndStoreReserva(int $clienteId, string $clienteEmail, string $clienteToken, string $endpoint)
    {

        // Fazer a requisição à API com os dados do cliente
        $response = Http::get(self::$url, [
            'email' => $clienteEmail,
            'token' => $clienteToken,
        ]);

        if ($response->failed()) {
            throw new ApiRequestException('Failed to fetch client from API');
        }

        $reservaData = $response->json();
        
        // Adapte o mapeamento dos dados conforme necessário
        $this->reservaRepository->saveReserva([
            'referencia' => $reservaData['referencia'], 
            'referencia_data' => $reservaData['referencia_data'],
            'aprovacao_absoluto' => $reservaData['aprovacao_absoluto'],
            'aprovacao_vpl_valor' => $reservaData['aprovacao_vpl_valor'],
            'aprovada' => $reservaData['aprovada'], 
            'bloco' => $reservaData['bloco'], 
            'corretor' => $reservaData['corretor'], 
            'data_cad' => $reservaData['data_cad'], 
            'data_aprovacao' => $reservaData['data_aprovacao'], 
            'data_cancelamento' => $reservaData['data_cancelamento'], 
            'data_contrato' => $reservaData['data_contrato'], 
            'data_primeira_aprovacao' => $reservaData['data_primeira_aprovacao'], 
            'data_venda' => $reservaData['data_venda'], 
            'descricao_motivo_cancelamento' => $reservaData['descricao_motivo_cancelamento'], 
            'empreendimento' => $reservaData['empreendimento'], 
            'empresa_correspondente' => $reservaData['empresa_correspondente'], 
            'grupo' => $reservaData['grupo'], 
            'idcliente' => $reservaData['idcliente'], 
            'idcorretor' => $reservaData['idcorretor'], 
            'idempreendimento' => $reservaData['idempreendimento'], 
            'idgrupo' => $reservaData['idgrupo'], 
            'idimobiliaria' => $reservaData['idimobiliaria'], 
            'idlead' => $reservaData['idlead'], 
            'idmidia' => $reservaData['idmidia'], 
            'idprecadastro' => $reservaData['idprecadastro'], 
            'idsituacao' => $reservaData['idsituacao'], 
            'idsituacao_anterior' => $reservaData['idsituacao_anterior'], 
            'imobiliaria' => $reservaData['imobiliaria'], 
            'midia' => $reservaData['midia'], 
            'motivo_cancelamento' => $reservaData['motivo_cancelamento'], 
            'situacao' => $reservaData['situacao'], 
            'situacao_anterior' => $reservaData['situacao_anterior'], 
            'situacao_comercial' => $reservaData['situacao_comercial'], 
            'valor_contrato' => $reservaData['valor_contrato'], 
            'valor_fgts' => $reservaData['valor_fgts'], 
            'valor_financiamento' => $reservaData['valor_financiamento'], 
            'valor_proposta' => $reservaData['valor_proposta'], 
            'valor_subsidio' => $reservaData['valor_subsidio'], 
            'venda' => $reservaData['venda'], 
            'id_reserva' => $reservaData['id_reserva'], 
            'clientes_id' => $cliente->id,
        ]);

    }
}
