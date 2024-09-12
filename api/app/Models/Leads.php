<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;

    protected $fillable = [
        'referencia', 
        'referencia_data',
        'ativo', 
        'idlead',
        'idsituacao',
        'situacao',
        'data_cad', 
        'cep_cliente',
        'conversao_original',
        'conversao_ultimo',
        'conversao',
        'idempreendimento',
        'codigointerno_empreendimento',
        'empreendimento',
        'idempreendimento_primeiro',
        'empreendimento_primeiro',
        'idempreendimento_ultimo',
        'empreendimento_ultimo',
        'idmotivo',
        'motivo',
        'reserva',
        'idgestor',
        'gestor',
        'idcorretor',
        'corretor',
        'idimobiliaria',
        'imobiliaria',
        'idorigem',
        'origem',
        'idorigem_ultimo',
        'origem_ultimo',
        'midia_original',
        'midia_ultimo',
        'renda_familiar',
        'motivo_cancelamento',
        'data_cancelamento',
        'data_sincronizacao',
        'data_ultima_interacao',
        'cidade',
        'estado',
        'regiao',
        'ultima_data_conversao',
        'data_reativacao',
        'idsituacao_anterior',
        'nome_situacao_anterior_lead',
        'tags',
        'descricao_motivo_cancelamento',
        'possibilidade_venda',
        'inserido_bolsao',
        'data_primeira_interacao_gestor',
        'data_primeira_interacao_corretor',
        'idgestor_ultimo',
        'gestor_ultimo',
        'idcorretor_ultimo',
        'corretor_ultimo',
        'idcorretor_penultimo',
        'idimobiliaria_ultimo',
        'corretor_penultimo',
        'nome_momento_lead',
        'novo',
        'retorno',
        'data_ultima_alteracao',
        'vencido',
        'data_vencimento',
        'clientes_id',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;
}
