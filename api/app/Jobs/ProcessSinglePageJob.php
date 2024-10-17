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
use App\Models\Reserva;
use App\Models\LeadsVisita;
use App\Models\Vendas;
use App\Models\Corretores;
use App\Models\Unidades;
use App\Models\Pessoas;
use App\Models\Distratos;
use App\Models\Atendimentos;
use App\Models\LeadsHistoricoSituacoes;
use App\Models\Comissoes;
use App\Models\LeadsInteracoes;
use App\Models\CamposAdicionais;
use App\Models\ReservasFlags;
use App\Models\Assistencias;
use App\Models\LeadsConversoes;
use App\Models\LeadsTarefas;
use App\Models\Imobiliarias;
use App\Models\PreCadastro;
use App\Models\Repasse;
use App\Models\Empreendimento;
use App\Models\Workflow;
use App\Models\LeadsWorkflowTempo;

use App\Models\Clientes;

class ProcessSinglePageJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $apiService;
    protected $client;
    protected $urlCompleted;
    protected $page;
    protected $table;

    public $tries = 5;

    /**
     * Create a new job instance.
     */
    public function __construct($client, $urlCompleted, $page, $table)
    {
        $this->client = $client;
        $this->urlCompleted = $urlCompleted;
        $this->page = $page;
        $this->apiService = new ApiService();
        $this->table = $table;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Inicia Request', ['page' => $this->page, 'table' => $this->table]);

        $attempts = 0;
        $maxAttempts = 5;
        $waitTime = 1; // em segundos

        while ($attempts < $maxAttempts){

            try {
                    
                    $response = $this->apiService->makeApiRequest(
                        $this->client->email_cliente, 
                        $this->client->token_cliente, 
                        $this->page, 
                        $this->urlCompleted,
                        $this->table == 'empreendimento' ? 1 : 0
                    );                    
    
                if ($response->status() !== 200) {
                    throw new \Exception('Código de status inválido: ' . $response->status());
                }
    
                $datas = $response->json();

                if (($this->table !== 'empreendimento') && (!isset($datas['dados']) || !is_array($datas['dados']) || !isset($datas['total_de_paginas']) || !is_int($datas['total_de_paginas']))) {
                    throw new \Exception('Estrutura de resposta inválida');
                }
                
                Log::info('Finalizou Request', [
                    'Quantidade de dados' =>  $this->table == 'empreendimento' ? 1 : count($datas['dados']),
                    'Pagina Atual' => $this->page, 
                    'Total de Paginas' => $this->table == 'empreendimento' ? 1 : $datas['total_de_paginas']
                ]);
                if($this->table !== 'empreendimento'){
                    if (count($datas['dados']) > 0) {
                        if($this->table == 'leads'){
                            $this->actionRequestLeads($datas, $this->client->id);
                        }else if($this->table == 'reservas'){
                            $this->actionRequestReservas($datas, $this->client->id);
                        }else if($this->table == 'leadsVisita'){
                            $this->actionRequestLeadsVisita($datas, $this->client->id);
                        }else if($this->table == 'vendas'){
                            $this->actionRequestVendas($datas, $this->client->id);
                        }else if ($this->table == 'corretores'){
                            $this->actionRequestCorretores($datas, $this->client->id);
                        }else if($this->table == 'unidades'){
                            $this->actionRequestUnidades($datas, $this->client->id);
                        }else if ($this->table == 'pessoas'){
                            $this->actionRequestPessoas($datas, $this->client->id);
                        }else if($this->table == 'distratos'){
                            $this->actionRequestDistratos($datas, $this->client->id);
                        }else if ($this->table == 'atendimentos'){
                            $this->actionRequestAtendimentos($datas, $this->client->id);
                        }else if($this->table == 'leadsHistoricoSituacoes'){
                            $this->actionRequestLeadsHistoricoSituacoes($datas, $this->client->id);
                        }else if($this->table == 'comissoes'){
                            $this->actionRequestComissoes($datas, $this->client->id);
                        }else if($this->table == 'leadsInteracoes'){
                            $this->actionRequestLeadsInteracoes($datas, $this->client->id);
                        }else if($this->table == 'camposAdicionais'){
                            $this->actionRequestCamposAdicionais($datas, $this->client->id);
                        }else if($this->table == 'reservasFlags'){
                            $this->actionRequestReservasFlags($datas, $this->client->id);
                        }else if($this->table == 'assistencias'){
                            $this->actionRequestAssistencias($datas, $this->client->id);
                        }else if($this->table == 'leadsConversoes'){
                            $this->actionRequestLeadsConversoes($datas, $this->client->id);
                        }else if($this->table == 'leadsTarefas'){
                            $this->actionRequestLeadsTerafas($datas, $this->client->id);
                        }else if($this->table == 'imobiliarias'){
                            $this->actionRequestImobiliarias($datas, $this->client->id);
                        }else if($this->table == 'preCadastro'){
                            $this->actionRequestPreCadastro($datas, $this->client->id);
                        }else if($this->table == 'repasses'){
                            $this->actionRequestRepasse($datas, $this->client->id);
                        }else if($this->table == 'leads/workflow/tempo'){
                            $this->actionRequestLeadsWorkflowTempo($datas, $this->client->id);
                        }else{
                            Log::warning('Tabela não encontrada', [
                                'cliente_id' => $this->client->id,
                                'url' => $this->urlCompleted,
                                'pagina' => $this->page,
                                'tabela' => $this->table
                            ]);
                        }
                        //Clientes::find($this->client->id)->update(['ultima_pagina_processada' => $this->page]);
                    }
                } else {
                        $this->actionRequestEmpreendimento($datas, $this->client->id);
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

    public function actionRequestLeads($datas, $clientId)
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
                'clientes_id' => $clientId,
            ];

            Leads::create($leadData);
        }
    }

    public function actionRequestReservas($datas, $clientId)
    {   
        foreach ($datas['dados'] as $data){
            $reservasData = [
                'referencia' => $data['referencia'], 
                'referencia_data' => $data['referencia_data'],
                'aprovacao_absoluto'  => $data['aprovacao_absoluto'],
                'aprovacao_vpl_valor'  => $data['aprovacao_vpl_valor'],
                'aprovada'  => $data['aprovada'],
                'bloco'  => $data['bloco'],
                'corretor'  => $data['corretor'],
                'data_cad'  => $data['data_cad'],
                'data_aprovacao'  => $data['data_aprovacao'],
                'data_cancelamento'  => $data['data_cancelamento'],
                'data_contrato'  => $data['data_contrato'],
                'data_primeira_aprovacao'  => $data['data_primeira_aprovacao'],
                'data_venda'  => $data['data_venda'],
                'descricao_motivo_cancelamento'  => $data['descricao_motivo_cancelamento'],
                'empreendimento'  => $data['empreendimento'],
                'empresa_correspondente'  => $data['empresa_correspondente'],
                'grupo'  => $data['grupo'],
                'idcliente'  => $data['idcliente'],
                'idcorretor'  => $data['idcorretor'],
                'idempreendimento'  => $data['idempreendimento'],
                'idgrupo'  => $data['idgrupo'],
                'idimobiliaria'  => $data['idimobiliaria'],
                'idlead'  => $data['idlead'],
                'idmidia'  => $data['idmidia'],
                'idprecadastro'  => $data['idprecadastro'],
                'idsituacao'  => $data['idsituacao'],
                'idsituacao_anterior'  => $data['idsituacao_anterior'],
                'imobiliaria'  => $data['imobiliaria'],
                'midia'  => $data['midia'],
                'motivo_cancelamento'  => $data['motivo_cancelamento'],
                'situacao'  => $data['situacao'],
                'situacao_anterior'  => $data['situacao_anterior'],
                'situacao_comercial'  => $data['situacao_comercial'],
                'valor_contrato'  => $data['valor_contrato'],
                'valor_fgts'  => $data['valor_fgts'],
                'valor_financiamento'  => $data['valor_financiamento'],
                'valor_proposta'  => $data['valor_proposta'],
                'valor_subsidio'  => $data['valor_subsidio'],
                'venda'  => $data['venda'],
                'idreserva'  => $data['idreserva'],
                'clientes_id' => $clientId,
            ];

            Reserva::create($reservasData);
        }
    }

    public function actionRequestLeadsVisita($datas, $clientId)
    {   
        foreach ($datas['dados'] as $data){
            $leadsVisitaData = [
                'referencia' => $data['referencia'], 
                'referencia_data' => $data['referencia_data'],
                'idtarefa' => $data['idtarefa'],
                'idinteracao' => $data['idinteracao'],
                'idlead' => $data['idlead'],
                'data_cad' => $data['data_cad'],
                'data' => $data['data'],
                'idresponsavel' => $data['idresponsavel'],
                'responsavel' => $data['responsavel'],
                'tipo_responsavel' => $data['tipo_responsavel'],
                'situacao' => $data['situacao'],
                'tipo_interacao' => $data['tipo_interacao'],
                'idtipo_visita' => $data['idtipo_visita'],
                'nome_tipo_visita' => $data['nome_tipo_visita'],
                'funcionalidade' => $data['funcionalidade'],
                'data_conclusao' => $data['data_conclusao'],
                'pdv' => $data['pdv'],
                'visita_virtual' => $data['visita_virtual'],
                'idempreendimento' => $data['idempreendimento'],
                'nome_empreendimento' => $data['nome_empreendimento'],
                'clientes_id' => $clientId,
            ];

            LeadsVisita::create($leadsVisitaData);
        }
    }

    public function actionRequestVendas($datas, $clientId)
    {   
        foreach ($datas['dados'] as $data){
            $leadsVendas = [
                'referencia' => $data['referencia'], 
                'referencia_data' => $data['referencia_data'],
                'idreserva' => $data['idreserva'],
                'idlead' => $data['idlead'],
                'aprovada' => $data['aprovada'],
                'data_reserva' => $data['data_reserva'],
                'data_venda' => $data['data_venda'],
                'empreendimento' => $data['empreendimento'],
                'idempreendimento' => $data['idempreendimento'],
                'regiao' => $data['regiao'],
                'bloco' => $data['bloco'],
                'unidade' => $data['unidade'],
                'area_privativa' => $data['area_privativa'],
                'cliente' => $data['cliente'],
                'idcliente' => $data['idcliente'],
                'documento_cliente' => $data['documento_cliente'],
                'email' => $data['email'],
                'cidade' => $data['cidade'],
                'cep_cliente' => $data['cep_cliente'],
                'renda' => $data['renda'],
                'sexo' => $data['sexo'],
                'idade' => $data['idade'],
                'estado_civil' => $data['estado_civil'],
                'idcorretor' => $data['idcorretor'],
                'corretor' => $data['corretor'],
                'idimobiliaria' => $data['idimobiliaria'],
                'imobiliaria' => $data['imobiliaria'],
                'campanha' => $data['campanha'],
                'valor_contrato' => $data['valor_contrato'],
                'idmidia' => $data['idmidia'],
                'midia' => $data['midia'],
                'idtabela' => $data['idtabela'],
                'nometabela' => $data['nometabela'],
                'codigointernotabela' => $data['codigointernotabela'],
                'idtipovenda' => $data['idtipovenda'],
                'tipovenda' => $data['tipovenda'],
                'clientes_id' => $clientId,
            ];

            Vendas::create($leadsVendas);
        }
    }

    public function actionRequestCorretores($datas, $clientId)
    {
        foreach ($datas['dados'] as $data){
            $corretores = [
                'referencia' => $data['referencia'], 
                'referencia_data' => $data['referencia_data'],
                'idcorretor' => $data['idcorretor'],
                'documento' => $data['documento'],
                'nome' => $data['nome'],
                'sexo' => $data['sexo'],
                'imobiliaria' => $data['imobiliaria'],
                'categoria' => $data['categoria'],
                'nivel' => $data['nivel'],
                'participa_roleta_online' => $data['participa_roleta_online'],
                'classificacao' => $data['classificacao'],
                'codigointerno' => $data['codigointerno'],
                'identificador' => $data['identificador'],
                'tipo_creci' => $data['tipo_creci'],
                'creci' => $data['creci'],
                'situacao_creci' => $data['situacao_creci'],
                'estado_creci' => $data['estado_creci'],
                'cidade_creci' => $data['cidade_creci'],
                'vencimento_creci' => $data['vencimento_creci'],
                'ativo_login' => $data['ativo_login'],
                'profissional_data_inicio' => $data['profissional_data_inicio'],
                'apelido' => $data['apelido'],
                'clientes_id' => $clientId,
            ];

            Corretores::create($corretores);
        }
    }

    public function actionRequestUnidades($datas, $clientId)
    {
        foreach ($datas['dados'] as $data){
            $unidades = [
                'referencia' => $data['referencia'], 
                'referencia_data' => $data['referencia_data'],
                'situacao_possui_reserva_solicitacao_distrato' => $data['situacao_possui_reserva_solicitacao_distrato'],
                'idempreendimento' => $data['idempreendimento'],
                'idempreendimento_int' => $data['idempreendimento_int'],
                'nome_empreendimento' => $data['nome_empreendimento'],
                'idetapa' => $data['idetapa'],
                'idetapa_int' => $data['idetapa_int'],
                'etapa' => $data['etapa'],
                'idbloco' => $data['idbloco'],
                'idbloco_int' => $data['idbloco_int'],
                'bloco' => $data['bloco'],
                'nome' => $data['nome'],
                'area_privativa' => $data['area_privativa'],
                'idunidade' => $data['idunidade'],
                'idunidade_int' => $data['idunidade_int'],
                'vagas_garagem' => $data['vagas_garagem'],
                'andar' => $data['andar'],
                'area_comum' => $data['area_comum'],
                'coluna' => $data['coluna'],
                'posicao' => $data['posicao'],
                'tipologia' => $data['tipologia'],
                'tipo' => $data['tipo'],
                'idtipo_int' => $data['idtipo_int'],
                'empresa_terceirizacao' => $data['empresa_terceirizacao'],
                'valor_avaliacao' => $data['valor_avaliacao'],
                'data_bloqueio' => $data['data_bloqueio'],
                'data_entrega' => $data['data_entrega'],
                'agendar_a_partir' => $data['agendar_a_partir'],
                'liberar_a_partir' => $data['liberar_a_partir'],
                'situacao_reservada' => $data['situacao_reservada'],
                'situacao_reservada_vencimento' => $data['situacao_reservada_vencimento'],
                'situacao_reservada_idsituacao' => $data['situacao_reservada_idsituacao'],
                'situacao_reservada_nomesituacao' => $data['situacao_reservada_nomesituacao'],
                'situacao_cor_bg' => $data['situacao_cor_bg'],
                'situacao_cor_nome' => $data['situacao_cor_nome'],
                'situacao_nome' => $data['situacao_nome'],
                'situacao_reservada_inicio' => $data['situacao_reservada_inicio'],
                'situacao_vendida' => $data['situacao_vendida'],
                'situacao_vendida_idsituacao' => $data['situacao_vendida_idsituacao'],
                'situacao_idmotivo' => $data['situacao_idmotivo'],
                'situacao_bloqueados_internos' => $data['situacao_bloqueados_internos'],
                'situacao_bloqueada' => $data['situacao_bloqueada'],
                'situacao_bloqueada_idmotivo' => $data['situacao_bloqueada_idmotivo'],
                'situacao_bloqueada_motivo' => $data['situacao_bloqueada_motivo'],
                'situacao_tipo_id' => $data['situacao_tipo_id'],
                'situacao_tipo_nome' => $data['situacao_tipo_nome'],
                'situacao_para_venda' => $data['situacao_para_venda'],
                'situacao_mapa_disponibilidade' => $data['situacao_mapa_disponibilidade'],
                'clientes_id' => $clientId,
            ];

            Unidades::create($unidades);
        }  
    }

    public function actionRequestPessoas($datas, $clientId)
    {
        foreach ($datas['dados'] as $data){
            $pessoas = [
                'referencia' => $data['referencia'], 
                'referencia_data' => $data['referencia_data'],
                'idpessoa' => $data['idpessoa'],
                'idpessoa_int' => $data['idpessoa_int'],
                'idpessoa_legado' => $data['idpessoa_legado'],
                'data_cad' => $data['data_cad'],
                'ativo_painel' => $data['ativo_painel'],
                'ativo_login' => $data['ativo_login'],
                'situacao' => $data['situacao'],
                'validado' => $data['validado'],
                'renda_familiar' => $data['renda_familiar'],
                'clientes_id' => $clientId,
            ];

            Pessoas::create($pessoas);
        }  
    }

    public function actionRequestDistratos($datas, $clientId)
    {
        foreach ($datas['dados'] as $data){
            $distratos = [
                'referencia' => $data['referencia'], 
                'referencia_data' => $data['referencia_data'],
                'ativo' => $data['ativo'],
                'idreserva' => $data['idreserva'],
                'aprovada' => $data['aprovada'],
                'data_cad' => $data['data_cad'],
                'situacao_data' => $data['situacao_data'],
                'situacao_atual' => $data['situacao_atual'],
                'idsituacao' => $data['idsituacao'],
                'idempreendimento' => $data['idempreendimento'],
                'codigointerno_empreendimento' => $data['codigointerno_empreendimento'],
                'empreendimento' => $data['empreendimento'],
                'bloco' => $data['bloco'],
                'unidade' => $data['unidade'],
                'regiao' => $data['regiao'],
                'venda' => $data['venda'],
                'idcliente' => $data['idcliente'],
                'documento' => $data['documento'],
                'cliente' => $data['cliente'],
                'cep_cliente' => $data['cep_cliente'],
                'idcorretor' => $data['idcorretor'],
                'corretor' => $data['corretor'],
                'idimobiliaria' => $data['idimobiliaria'],
                'imobiliaria' => $data['imobiliaria'],
                'motivo_distrato' => $data['motivo_distrato'],
                'valor_contrato' => $data['valor_contrato'],
                'data_sincronizacao' => $data['data_sincronizacao'],
                'clientes_id' => $clientId,
            ];

            Distratos::create($distratos);
        }  
    }

    public function actionRequestAtendimentos($datas, $clientId) 
    {
        foreach ($datas['dados'] as $data){
            $atendimentos = [
                'referencia' => $data['referencia'], 
                'referencia_data' => $data['referencia_data'],
                'ativo' => $data['ativo'],
                'idatendimento' => $data['idatendimento'],
                'protocolo' => $data['protocolo'],
                'data_cad' => $data['data_cad'],
                'prioridade' => $data['prioridade'],
                'tempo_finalizado' => $data['tempo_finalizado'],
                'telefone_atendimento' => $data['telefone_atendimento'],
                'nome_cliente' => $data['nome_cliente'],
                'email_cliente' => $data['email_cliente'],
                'tempo_resposta' => $data['tempo_resposta'],
                'encerrado_primeiro_contato' => $data['encerrado_primeiro_contato'],
                'humor_cliente' => $data['humor_cliente'],
                'idcanal' => $data['idcanal'],
                'atendimentos_vinculados' => $data['atendimentos_vinculados'],
                'previsao_conclusao' => $data['previsao_conclusao'],
                'idlead' => $data['idlead'],
                'ativo_painel' => $data['ativo_painel'],
                'avaliacao' => $data['avaliacao'],
                'canal' => $data['canal'],
                'idempreendimento' => $data['idempreendimento'],
                'codigointerno_empreendimento' => $data['codigointerno_empreendimento'],
                'empreendimento' => $data['empreendimento'],
                'etapa' => $data['etapa'],
                'bloco' => $data['bloco'],
                'unidade' => $data['unidade'],
                'idcliente' => $data['idcliente'],
                'documento_cliente' => $data['documento_cliente'],
                'cliente' => $data['cliente'],
                'cep_cliente' => $data['cep_cliente'],
                'regiao' => $data['regiao'],
                'situacao' => $data['situacao'],
                'data_situacao' => $data['data_situacao'],
                'idprotocolo' => $data['idprotocolo'],
                'assunto' => $data['assunto'],
                'subassunto' => $data['subassunto'],
                'usuario' => $data['usuario'],
                'idclassificacao' => $data['idclassificacao'],
                'classificacao' => $data['classificacao'],
                'idtipo' => $data['idtipo'],
                'tipo' => $data['tipo'],
                'imobiliaria' => $data['imobiliaria'],
                'corretor' => $data['corretor'],
                'idsituacao' => $data['idsituacao'],
                'idresponsavel' => $data['idresponsavel'],
                'responsavel' => $data['responsavel'],
                'idunidade' => $data['idunidade'],
                'idcorretor' => $data['idcorretor'],
                'idimobiliaria' => $data['idimobiliaria'],
                'sigla_empreendimento' => $data['sigla_empreendimento'],
                'codigointerno_cliente' => $data['codigointerno_cliente'],
                'tags' => $data['tags'],
                'times' => $data['times'],
                'origem' => $data['origem'],
                'quantidade_mensagens' => $data['quantidade_mensagens'],
                'quantidade_interacoes' => $data['quantidade_interacoes'],
                'data_modificacao' => $data['data_modificacao'],
                'clientes_id' => $clientId,
            ];

            Atendimentos::create($atendimentos);
        }
    }

    public function actionRequestLeadsHistoricoSituacoes($datas, $clientId)
    {
        foreach ($datas['dados'] as $data){
            $leadsHisticoSituacoes = [
                'referencia' => $data['referencia'], 
                'referencia_data' => $data['referencia_data'],
                'ativo' => $data['ativo'],
                'idlead' => $data['idlead'],
                'data_cad' => $data['data_cad'],
                'de' => $data['de'],
                'para' => $data['para'],
                'de_nome' => $data['de_nome'],
                'para_nome' => $data['para_nome'],
                'clientes_id' => $clientId,
            ];
            LeadsHistoricoSituacoes::create($leadsHisticoSituacoes);
        }  
    }

    public function actionRequestComissoes($datas, $clientId)
    {
        foreach ($datas['dados'] as $data){
            $comissoes = [
                'referencia' => $data['referencia'], 
                'referencia_data' => $data['referencia_data'],
                'ativo' => $data['ativo'],
                'idcomissao' => $data['idcomissao'],
                'situacao' => $data['situacao'],
                'idsituacao' => $data['idsituacao'],
                'idreserva' => $data['idreserva'],
                'corretor' => $data['corretor'],
                'imobiliaria' => $data['imobiliaria'],
                'empreendimento' => $data['empreendimento'],
                'bloco' => $data['bloco'],
                'etapa' => $data['etapa'],
                'unidade' => $data['unidade'],
                'regiao' => $data['regiao'],
                'cliente' => $data['cliente'],
                'cep_cliente' => $data['cep_cliente'],
                'clientes_id' => $clientId,
            ];
            Comissoes::create($comissoes);
        }  
    }

    public function actionRequestLeadsInteracoes($datas, $clientId)
    {
        foreach ($datas['dados'] as $data){
            $leadsInteracoes = [
                'referencia' => $data['referencia'], 
                'referencia_data' => $data['referencia_data'],
                'idinteracao' => $data['idinteracao'],
                'idlead' => $data['idlead'],
                'data_cad' => $data['data_cad'],
                'idcorretor' => $data['idcorretor'],
                'corretor' => $data['corretor'],
                'idimobiliaria' => $data['idimobiliaria'],
                'imobiliaria' => $data['imobiliaria'],
                'tipo' => $data['tipo'],
                'situacao' => $data['situacao'],
                'descricao' => $data['descricao'],
                'gestor_interacao' => $data['gestor_interacao'],
                'clientes_id' => $clientId,
            ];
            LeadsInteracoes::create($leadsInteracoes);
        }
    }

    public function actionRequestCamposAdicionais($datas, $clientId)
    {
        foreach ($datas['dados'] as $data){
            $camposAdicionais = [
                'referencia' => $data['referencia'], 
                'referencia_data' => $data['referencia_data'],
                'ativo' => $data['ativo'],
                'idcampo' => $data['idcampo'],
                'campo_nome' => $data['campo_nome'],
                'idfuncionalidade' => $data['idfuncionalidade'],
                'funcionalidade' => $data['funcionalidade'],
                'valor' => $data['valor'],
                'data_cad' => $data['data_cad'],
                'data_modificacao' => $data['data_modificacao'],
                'clientes_id' => $clientId,
            ];
            CamposAdicionais::create($camposAdicionais);
        }
    }

    public function actionRequestReservasFlags($datas, $clientId)
    {
        foreach ($datas['dados'] as $data){
            $reservasFlags = [
                'referencia' => $data['referencia'], 
                'referencia_data' => $data['referencia_data'],
                'ativo' => $data['ativo'],
                'idreserva' => $data['idreserva'],
                'data_criacao_reserva' => $data['data_criacao_reserva'],
                'empreendimento' => $data['empreendimento'],
                'idempreendimento' => $data['idempreendimento'],
                'bloco' => $data['bloco'],
                'unidade' => $data['unidade'],
                'idunidade' => $data['idunidade'],
                'cliente' => $data['cliente'],
                'idcliente' => $data['idcliente'],
                'corretor' => $data['corretor'],
                'idcorretor' => $data['idcorretor'],
                'flag_inicio' => $data['flag_inicio'],
                'data_flag_inicio' => $data['data_flag_inicio'],
                'flag_inicio_semproposta' => $data['flag_inicio_semproposta'],
                'data_flag_inicio_semproposta' => $data['data_flag_inicio_semproposta'],
                'flag_vencida' => $data['flag_vencida'],
                'data_flag_vencida' => $data['data_flag_vencida'],
                'flag_vendida' => $data['flag_vendida'],
                'data_flag_vendida' => $data['data_flag_vendida'],
                'flag_distrato' => $data['flag_distrato'],
                'data_flag_distrato' => $data['data_flag_distrato'],
                'flag_analisada' => $data['flag_analisada'],
                'data_flag_analisada' => $data['data_flag_analisada'],
                'flag_aprovada' => $data['flag_aprovada'],
                'data_flag_aprovada' => $data['data_flag_aprovada'],
                'flag_aprovada_comercial' => $data['flag_aprovada_comercial'],
                'data_flag_aprovada_comercial' => $data['data_flag_aprovada_comercial'],
                'flag_vender_sienge' => $data['flag_vender_sienge'],
                'data_flag_vender_sienge' => $data['data_flag_vender_sienge'],
                'flag_cancelada_sienge' => $data['flag_cancelada_sienge'],
                'data_flag_pode_faturar' => $data['data_flag_pode_faturar'],
                'flag_documentos' => $data['flag_documentos'],
                'data_flag_documentos' => $data['data_flag_documentos'],
                'flag_contrato' => $data['flag_contrato'],
                'data_flag_contrato' => $data['data_flag_contrato'],
                'flag_aguardando_faturamento' => $data['flag_aguardando_faturamento'],
                'data_flag_aguardando_faturamento' => $data['data_flag_aguardando_faturamento'],
                'flag_faturada' => $data['flag_faturada'],
                'data_flag_faturada' => $data['data_flag_faturada'],
                'flag_pendente_assinatura_eletronica' => $data['flag_pendente_assinatura_eletronica'],
                'data_flag_pendente_assinatura_eletronica' => $data['data_flag_pendente_assinatura_eletronica'],
                'flag_pendente_assinatura_eletronica_segundo_envelope' => $data['flag_pendente_assinatura_eletronica_segundo_envelope'],
                'data_flag_pendente_assinuatura_eletr_seg_env' => $data['data_flag_pendente_assinatura_eletronica_segundo_envelope'],
                'flag_assinatura_clientes_associados' => $data['flag_assinatura_clientes_associados'],
                'data_flag_assinatura_clientes_associados' => $data['data_flag_assinatura_clientes_associados'],
                'flag_assinatura_todas_partes' => $data['flag_assinatura_todas_partes'],
                'data_flag_assinatura_todas_partes' => $data['data_flag_assinatura_todas_partes'],
                'flag_reprovada_comercial' => $data['flag_reprovada_comercial'],
                'data_flag_reprovada_comercial' => $data['data_flag_reprovada_comercial'],
                'flag_pendente_comercial' => $data['flag_pendente_comercial'],
                'data_flag_pendente_comercial' => $data['data_flag_pendente_comercial'],
                'flag_devolucao_erp' => $data['flag_devolucao_erp'],
                'data_flag_devolucao_erp' => $data['data_flag_devolucao_erp'],
                'clientes_id' => $clientId,
            ];
            ReservasFlags::create($reservasFlags);
        }
    }

    public function actionRequestAssistencias($datas, $clientId)
    {
        foreach ($datas['dados'] as $data){
            $assistencias = [
                'referencia' => $data['referencia'], 
                'referencia_data' => $data['referencia_data'],
                'ativo' => $data['ativo'],
                'idassistencia' => $data['idassistencia'],
                'idcliente' => $data['idcliente'],
                'documento_cliente' => $data['documento_cliente'],
                'cliente' => $data['cliente'],
                'idsindico' => $data['idsindico'],
                'sindico' => $data['sindico'],
                'cep_cliente' => $data['cep_cliente'],
                'idempreendimento' => $data['idempreendimento'],
                'codigointerno_empreendimento' => $data['codigointerno_empreendimento'],
                'empreendimento' => $data['empreendimento'],
                'etapa' => $data['etapa'],
                'bloco' => $data['bloco'],
                'unidade' => $data['unidade'],
                'data_cad' => $data['data_cad'],
                'idsituacao' => $data['idsituacao'],
                'situacao' => $data['situacao'],
                'unidade_manual' => $data['unidade_manual'],
                'bloco_manual' => $data['bloco_manual'],
                'parecer_tecnico' => $data['parecer_tecnico'],
                'empreendimento_manual' => $data['empreendimento_manual'],
                'data_prevista_termino' => $data['data_prevista_termino'],
                'data_conclusao' => $data['data_conclusao'],
                'recorrente' => $data['recorrente'],
                'total_horas' => $data['total_horas'],
                'custo_previsto' => $data['custo_previsto'],
                'idatendimento' => $data['idatendimento'],
                'empreendimento_localidade' => $data['empreendimento_localidade'],
                'unidade_area' => $data['unidade_area'],
                'idlocalidade' => $data['idlocalidade'],
                'localidade' => $data['localidade'],
                'descricao_localidade' => $data['descricao_localidade'],
                'idarea' => $data['idarea'],
                'area' => $data['area'],
                'descricao_area' => $data['descricao_area'],
                'prioridade' => $data['prioridade'],
                'ultima_atualizacao_situacao' => $data['ultima_atualizacao_situacao'],
                'data_modificacao' => $data['data_modificacao'],
                'clientes_id' => $clientId,
            ];
            Assistencias::create($assistencias);
        }
    }

    public function actionRequestLeadsConversoes($datas, $clientId)
    {
        foreach ($datas['dados'] as $data){
            $leadsConversoes = [
                'referencia' => $data['referencia'], 
                'referencia_data' => $data['referencia_data'],
                'ativo' => $data['ativo'],
                'idlead_conversao' => $data['idlead_conversao'],
                'idlead' => $data['idlead'],
                'nome' => $data['nome'],
                'email' => $data['email'],
                'telefone' => $data['telefone'],
                'origem' => $data['origem'],
                'origem_conversao' => $data['origem_conversao'],
                'conversao' => $data['conversao'],
                'data_cad' => $data['data_cad'],
                'midia' => $data['midia'],
                'midia_conversao' => $data['midia_conversao'],
                'gestor' => $data['gestor'],
                'gestor_ultimo' => $data['gestor_ultimo'],
                'empreendimento_ultimo' => $data['empreendimento_ultimo'],
                'corretor' => $data['corretor'],
                'corretor_ultimo' => $data['corretor_ultimo'],
                'imobiliaria' => $data['imobiliaria'],
                'imobiliaria_ultima' => $data['imobiliaria_ultima'],

                'clientes_id' => $clientId,
            ];
            LeadsConversoes::create($leadsConversoes);
        }
    }

    public function actionRequestLeadsTerafas($datas, $clientId)
    {
        foreach ($datas['dados'] as $data){
            $leadsTarefas = [
                'referencia' => $data['referencia'], 
                'referencia_data' => $data['referencia_data'],
                'idtarefa' => $data['idtarefa'],
                'idinteracao' => $data['idinteracao'],
                'idlead' => $data['idlead'],
                'data_cad' => $data['data_cad'],
                'data' => $data['data'],
                'idresponsavel' => $data['idresponsavel'],
                'responsavel' => $data['responsavel'],
                'tipo_responsavel' => $data['tipo_responsavel'],
                'situacao' => $data['situacao'],
                'tipo_interacao' => $data['tipo_interacao'],
                'funcionalidade' => $data['funcionalidade'],
                'idempreendimento' => $data['idempreendimento'],
                'nome_empreendimento' => $data['nome_empreendimento'],
                'clientes_id' => $clientId,
            ];
            LeadsTarefas::create($leadsTarefas);
        }
    }

    public function actionRequestImobiliarias($datas, $clientId)
    {
        foreach ($datas['dados'] as $data){
            $imobiliarias = [
                'referencia' => $data['referencia'], 
                'referencia_data' => $data['referencia_data'],
                'ativo' => $data['ativo'],
                'idimobiliaria' => $data['idimobiliaria'],
                'data_cad' => $data['data_cad'],
                'avatar_nome' => $data['avatar_nome'],
                'gerente_nome' => $data['gerente_nome'],
                'gerente_cpf' => $data['gerente_cpf'],
                'gerente_telefone' => $data['gerente_telefone'],
                'gerente_celular' => $data['gerente_celular'],
                'gerente_email' => $data['gerente_email'],
                'sigla' => $data['sigla'],
                'codigointerno' => $data['codigointerno'],
                'observacoes' => $data['observacoes'],
                'clientes_id' => $clientId,
            ];
            Imobiliarias::create($imobiliarias);
        }
    }

    public function actionRequestPreCadastro($datas, $clientId)
    {
        foreach ($datas['dados'] as $data){
            $preCadastro = [
                'referencia' => $data['referencia'], 
                'referencia_data' => $data['referencia_data'],
                'cep_cliente' => $data['cep_cliente'],
                'corretor' => $data['corretor'],
                'data_cad' => $data['data_cad'],
                'data_ultima_alteracao_situacao' => $data['data_ultima_alteracao_situacao'],
                'descricao_motivo_cancelamento' => $data['descricao_motivo_cancelamento'],
                'descricao_motivo_reprovacao' => $data['descricao_motivo_reprovacao'],
                'empreendimento' => $data['empreendimento'],
                'idcorretor' => $data['idcorretor'],
                'idlead' => $data['idlead'],
                'idmotivo_cancelamento' => $data['idmotivo_cancelamento'],
                'idmotivo_reprovacao' => $data['idmotivo_reprovacao'],
                'idpessoa' => $data['idpessoa'],
                'idprecadastro' => $data['idprecadastro'],
                'idsituacao' => $data['idsituacao'],
                'idsituacao_anterior' => $data['idsituacao_anterior'],
                'motivo_cancelamento' => $data['motivo_cancelamento'],
                'motivo_reprovacao' => $data['motivo_reprovacao'],
                'observacoes' => $data['observacoes'],
                'pessoa' => $data['pessoa'],
                'prazo' => $data['prazo'],
                'saldo_devedor' => $data['saldo_devedor'],
                'situacao' => $data['situacao'],
                'situacao_anterior' => $data['situacao_anterior'],
                'sla_vencimento' => $data['sla_vencimento'],
                'usuario_correspondente' => $data['usuario_correspondente'],
                'valor_aprovado' => $data['valor_aprovado'],
                'valor_avaliacao' => $data['valor_avaliacao'],
                'valor_fgts' => $data['valor_fgts'],
                'valor_prestacao' => $data['valor_prestacao'],
                'valor_subsidio' => $data['valor_subsidio'],
                'valor_total' => $data['valor_total'],
                'vencimento_aprovacao' => $data['vencimento_aprovacao'],
                'clientes_id' => $clientId,
            ];
            PreCadastro::create($preCadastro);
        }
    }

    public function actionRequestRepasse($datas, $clientId)
    {
        foreach ($datas['dados'] as $data){
            $repasse = [
                'referencia' => $data['referencia'], 
                'referencia_data' => $data['referencia_data'],
                'ativo' => $data['ativo'],
                'idrepasse' => $data['idrepasse'],
                'idsituacao' => $data['idsituacao'],
                'situacao' => $data['situacao'],
                'reserva' => $data['reserva'],
                'idempreendimento' => $data['idempreendimento'],
                'codigointerno_empreendimento' => $data['codigointerno_empreendimento'],
                'empreendimento' => $data['empreendimento'],
                'etapa' => $data['etapa'],
                'bloco' => $data['bloco'],
                'unidade' => $data['unidade'],
                'regiao' => $data['regiao'],
                'idcliente' => $data['idcliente'],
                'documento_cliente' => $data['documento_cliente'],
                'cliente' => $data['cliente'],
                'cep_cliente' => $data['cep_cliente'],
                'parcela' => $data['parcela'],
                'idcontrato' => $data['idcontrato'],
                'contrato' => $data['contrato'],
                'valor_previsto' => $data['valor_previsto'],
                'parcela_conclusao' => $data['parcela_conclusao'],
                'saldo_devedor' => $data['saldo_devedor'],
                'valor_divida' => $data['valor_divida'],
                'valor_subsidio' => $data['valor_subsidio'],
                'valor_fgts' => $data['valor_fgts'],
                'valor_financiado' => $data['valor_financiado'],
                'numero_contrato' => $data['numero_contrato'],
                'data_registro' => $data['data_registro'],
                'correspondente' => $data['correspondente'],
                'banco' => $data['banco'],
                'agencia' => $data['agencia'],
                'data_alteracao_status' => $data['data_alteracao_status'],
                'data_venda' => $data['data_venda'],
                'data_contrato_contabilizado' => $data['data_contrato_contabilizado'],
                'data_assinatura_de_contrato' => $data['data_assinatura_de_contrato'],
                'idlead' => $data['idlead'],
                'data_recurso_liberado' => $data['data_recurso_liberado'],
                'data_sincronizacao' => $data['data_sincronizacao'],
                'data_cadastro' => $data['data_cadastro'],
                'idunidade' => $data['idunidade'],
                'data_modificao' => $data['data_modificao'],
                'clientes_id' => $clientId,
            ];
            Repasse::create($repasse);
        }
    }

    public function actionRequestEmpreendimento($datas, $clientId)
    {
        foreach ($datas as $data){
            $empreendimento = [
                'idempreendimento' => $data['idempreendimento'],
                'idempreendimento_int' => $data['idempreendimento_int'],
                'nome' => $data['nome'],
                'regiao' => $data['regiao'],
                'cidade' => $data['cidade'],
                'estado' => $data['estado'],
                'bairro' => $data['bairro'],
                'endereco_emp' => $data['endereco_emp'],
                'numero' => $data['numero'],
                'logradouro' => $data['logradouro'],
                'cep' => $data['cep'],
                'endereco' => $data['endereco'],
                'idempresa' => $data['idempresa'],
                'sigla' => $data['sigla'],
                'logo' => $data['logo'],
                'foto_listagem' => $data['foto_listagem'],
                'foto' => $data['foto'],
                'app_exibir' => $data['app_exibir'],
                'app_cor_background' => $data['app_cor_background'],
                'data_entrega' => $data['data_entrega'],
                'situacao_obra' => json_encode($data['situacao_obra']),
                'situacao_comercial' => json_encode($data['situacao_comercial']),
                'tipo_empreendimento' => json_encode($data['tipo_empreendimento']),
                'segmento' => json_encode($data['segmento']),
                'clientes_id' => $clientId,
            ];
            Empreendimento::create($empreendimento);
        }
    }

    public function actionRequestLeadsWorkflowTempo($datas, $clientId)
    {
        foreach ($datas['dados'] as $data){
            $LeadsWorkflowTempo = [
                'referencia' => $data['referencia'], 
                'referencia_data' => $data['referencia_data'],
                'ativo' => $data['ativo'],
                'idtempo' => $data['idtempo'],
                'idlead' => $data['idlead'],
                'idsituacao' => $data['idsituacao'],
                'tempo' => $data['tempo'],
                'data_cad' => $data['data_cad'],
                'situacao' => $data['situacao'],
                'sigla' => $data['sigla'],
                'clientes_id' => $clientId,
            ];
            LeadsWorkflowTempo::create($LeadsWorkflowTempo);
        }
    }
}