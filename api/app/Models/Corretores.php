<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corretores extends Model
{
    use HasFactory;

    protected $fillable = [
        'referencia',
        'referencia_data',
        'idcorretor',
        'documento',
        'nome',
        'sexo',
        'imobiliaria',
        'categoria',
        'nivel',
        'participa_roleta_online',
        'classificacao',
        'codigointerno',
        'identificador',
        'tipo_creci',
        'creci',
        'situacao_creci',
        'estado_creci',
        'cidade_creci',
        'vencimento_creci',
        'ativo_login',
        'profissional_data_inicio',
        'apelido',
        'clientes_id',
    ];
}
