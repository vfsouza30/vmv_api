<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assistencias extends Model
{
    use HasFactory;
    protected $fillable = [
        'referencia',
        'referencia_data',
        'ativo',
        'idassistencia',
        'idcliente',
        'documento_cliente',
        'cliente',
        'idsindico',
        'sindico',
        'cep_cliente',
        'idempreendimento',
        'codigointerno_empreendimento',
        'empreendimento',
        'etapa',
        'bloco',
        'unidade',
        'data_cad',
        'idsituacao',
        'situacao',
        'unidade_manual',
        'bloco_manual',
        'parecer_tecnico',
        'empreendimento_manual',
        'data_prevista_termino',
        'data_conclusao',
        'recorrente',
        'total_horas',
        'custo_previsto',
        'idatendimento',
        'empreendimento_localidade',
        'unidade_area',
        'idlocalidade',
        'localidade',
        'descricao_localidade',
        'idarea',
        'area',
        'descricao_area',
        'prioridade',
        'ultima_atualizacao_situacao',
        'data_modificacao',
        'clientes_id',
    ];
}
