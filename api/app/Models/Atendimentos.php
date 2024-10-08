<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'referencia',
        'referencia_data',
        'ativo',
        'idatendimento',
        'protocolo',
        'data_cad',
        'prioridade',
        'tempo_finalizado',
        'telefone_atendimento',
        'nome_cliente',
        'email_cliente',
        'tempo_resposta',
        'encerrado_primeiro_contato',
        'humor_cliente',
        'idcanal',
        'atendimentos_vinculados',
        'previsao_conclusao',
        'idlead',
        'ativo_painel',
        'avaliacao',
        'canal',
        'idempreendimento',
        'codigointerno_empreendimento',
        'empreendimento',
        'etapa',
        'bloco',
        'unidade',
        'idcliente',
        'documento_cliente',
        'cliente',
        'cep_cliente',
        'regiao',
        'situacao',
        'data_situacao',
        'idprotocolo',
        'assunto',
        'subassunto',
        'usuario',
        'idclassificacao',
        'classificacao',
        'idtipo',
        'tipo',
        'imobiliaria',
        'corretor',
        'idsituacao',
        'idresponsavel',
        'responsavel',
        'idunidade',
        'idcorretor',
        'idimobiliaria',
        'sigla_empreendimento',
        'codigointerno_cliente',
        'tags',
        'times',
        'origem',
        'quantidade_mensagens',
        'quantidade_interacoes',
        'data_modificacao',
        'clientes_id',
    ];
}
