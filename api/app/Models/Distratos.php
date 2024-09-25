<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distratos extends Model
{
    use HasFactory;

    protected $fillable = [
        'referencia',
        'referencia_data',
        'ativo',
        'idreserva',
        'aprovada',
        'data_cad',
        'situacao_data',
        'situacao_atual',
        'idsituacao',
        'idempreendimento',
        'codigointerno_empreendimento',
        'empreendimento',
        'bloco',
        'unidade',
        'regiao',
        'venda',
        'idcliente',
        'documento',
        'cliente',
        'cep_cliente',
        'idcorretor',
        'corretor',
        'idimobiliaria',
        'imobiliaria',
        'motivo_distrato',
        'valor_contrato',
        'data_sincronizacao',
        'clientes_id',
    ];
}
