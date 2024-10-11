<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empreendimento extends Model
{
    use HasFactory;
    protected $fillable = [
        'idempreendimento',
        'idempreendimento_int',
        'nome',
        'regiao',
        'cidade',
        'estado',
        'bairro',
        'endereco_emp',
        'numero',
        'logradouro',
        'cep',
        'endereco',
        'idempresa',
        'sigla',
        'logo',
        'foto_listagem',
        'foto',
        'app_exibir',
        'app_cor_background',
        'data_entrega',
        'nome_referencia_dados_adicionais',
        'valor_dados_adicionais',
        'nome_situacao_obra',
        'situacao_obra',
        'situacao_comercial',
        'tipo_empreendimento',
        'segmento',
        'clientes_id'
    ];
}
