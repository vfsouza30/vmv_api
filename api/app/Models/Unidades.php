<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidades extends Model
{
    use HasFactory;

    protected $fillable = [
        'referencia',
        'referencia_data',
        'situacao_possui_reserva_solicitacao_distrato',
        'idempreendimento',
        'idempreendimento_int',
        'nome_empreendimento',
        'idetapa',
        'idetapa_int',
        'etapa',
        'idbloco',
        'idbloco_int',
        'bloco',
        'nome',
        'area_privativa',
        'idunidade',
        'idunidade_int',
        'vagas_garagem',
        'andar',
        'area_comum',
        'coluna',
        'posicao',
        'tipologia',
        'tipo',
        'idtipo_int',
        'empresa_terceirizacao',
        'valor_avaliacao',
        'data_bloqueio',
        'data_entrega',
        'agendar_a_partir',
        'liberar_a_partir',
        'nome_referencia',
        'valor',
        'situacao_reservada',
        'situacao_reservada_vencimento',
        'situacao_reservada_idsituacao',
        'situacao_reservada_nomesituacao',
        'situacao_cor_bg',
        'situacao_cor_nome',
        'situacao_nome',
        'situacao_reservada_inicio',
        'situacao_vendida',
        'situacao_vendida_idsituacao',
        'situacao_idmotivo',
        'situacao_bloqueados_internos',
        'situacao_bloqueada',
        'situacao_bloqueada_idmotivo',
        'situacao_bloqueada_motivo',
        'situacao_tipo_id',
        'situacao_tipo_nome',
        'situacao_para_venda',
        'situacao_mapa_disponibilidade',
        'clientes_id',
    ];
}
