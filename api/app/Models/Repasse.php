<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repasse extends Model
{
    use HasFactory;
    protected $fillable = [
        'referencia',
        'referencia_data',
        'ativo',
        'idrepasse',
        'idsituacao',
        'situacao',
        'reserva',
        'idempreendimento',
        'codigointerno_empreendimento',
        'empreendimento',
        'etapa',
        'bloco',
        'unidade',
        'regiao',
        'idcliente',
        'documento_cliente',
        'cliente',
        'cep_cliente',
        'parcela',
        'idcontrato',
        'contrato',
        'valor_previsto',
        'parcela_conclusao',
        'saldo_devedor',
        'valor_divida',
        'valor_subsidio',
        'valor_fgts',
        'valor_financiado',
        'numero_contrato',
        'data_registro',
        'correspondente',
        'banco',
        'agencia',
        'data_alteracao_status',
        'data_venda',
        'data_contrato_contabilizado',
        'data_assinatura_de_contrato',
        'idlead',
        'data_recurso_liberado',
        'data_sincronizacao',
        'data_cadastro',
        'idunidade',
        'data_modificao',
        'clientes_id',
    ];
}
