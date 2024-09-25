<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreCadastro extends Model
{
    use HasFactory;
    protected $fillable = [
        'referencia',
        'referencia_data',
        'cep_cliente',
        'corretor',
        'data_cad',
        'data_ultima_alteracao_situacao',
        'descricao_motivo_cancelamento',
        'descricao_motivo_reprovacao',
        'empreendimento',
        'idcorretor',
        'idlead',
        'idmotivo_cancelamento',
        'idmotivo_reprovacao',
        'idpessoa',
        'idprecadastro',
        'idsituacao',
        'idsituacao_anterior',
        'motivo_cancelamento',
        'motivo_reprovacao',
        'observacoes',
        'pessoa',
        'prazo',
        'saldo_devedor',
        'situacao',
        'situacao_anterior',
        'sla_vencimento',
        'usuario_correspondente',
        'valor_aprovado',
        'valor_avaliacao',
        'valor_fgts',
        'valor_prestacao',
        'valor_subsidio',
        'valor_total',
        'vencimento_aprovacao',
        'clientes_id',
    ];
}
