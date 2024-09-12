<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'referencia', 
        'referencia_data',
        'aprovacao_absoluto',
        'aprovacao_vpl_valor',
        'aprovada', 
        'bloco', 
        'corretor', 
        'data_cad', 
        'data_aprovacao', 
        'data_cancelamento', 
        'data_contrato', 
        'data_primeira_aprovacao', 
        'data_venda', 
        'descricao_motivo_cancelamento', 
        'empreendimento', 
        'empresa_correspondente', 
        'grupo', 
        'idcliente', 
        'idcorretor', 
        'idempreendimento', 
        'idgrupo', 
        'idimobiliaria', 
        'idlead', 
        'idmidia', 
        'idprecadastro', 
        'idsituacao', 
        'idsituacao_anterior', 
        'imobiliaria', 
        'midia', 
        'motivo_cancelamento', 
        'situacao', 
        'situacao_anterior', 
        'situacao_comercial', 
        'valor_contrato', 
        'valor_fgts', 
        'valor_financiamento', 
        'valor_proposta', 
        'valor_subsidio', 
        'venda', 
        'id_reserva', 
        'clientes_id', 
        'created_at', 
        'updated_at'

    ];

    public $timestamps = true;
}
