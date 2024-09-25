<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imobiliarias extends Model
{
    use HasFactory;
    protected $fillable = [
        'referencia',
        'referencia_data',
        'ativo',
        'idimobiliaria',
        'data_cad',
        'avatar_nome',
        'gerente_nome',
        'gerente_cpf',
        'gerente_telefone',
        'gerente_celular',
        'gerente_email',
        'sigla',
        'codigointerno',
        'observacoes',
        'clientes_id',
    ];
}
