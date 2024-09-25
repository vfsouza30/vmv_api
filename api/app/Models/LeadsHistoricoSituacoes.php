<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadsHistoricoSituacoes extends Model
{
    use HasFactory;

    protected $fillable = [
        'referencia',
        'referencia_data',
        'ativo',
        'idlead',
        'data_cad',
        'de',
        'para',
        'de_nome',
        'para_nome',
        'clientes_id',
    ];
}
