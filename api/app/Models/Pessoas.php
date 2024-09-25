<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoas extends Model
{
    use HasFactory;

    protected $fillable = [
        'referencia',
        'referencia_data',
        'idpessoa',
        'idpessoa_int',
        'idpessoa_legado',
        'data_cad',
        'ativo_painel',
        'ativo_login',
        'situacao',
        'validado',
        'renda_familiar',
        'clientes_id',
    ];
}
