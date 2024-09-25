<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comissoes extends Model
{
    use HasFactory;

    protected $fillable = [
        'referencia',
        'referencia_data',
        'ativo',
        'idcomissao',
        'situacao',
        'idsituacao',
        'idreserva',
        'corretor',
        'imobiliaria',
        'empreendimento',
        'bloco',
        'etapa',
        'unidade',
        'regiao',
        'cliente',
        'cep_cliente',
        'clientes_id',
    ];
}
