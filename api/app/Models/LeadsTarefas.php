<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadsTarefas extends Model
{
    use HasFactory;
    protected $fillable = [
        'referencia',
        'referencia_data',
        'idtarefa',
        'idinteracao',
        'idlead',
        'data_cad',
        'data',
        'idresponsavel',
        'responsavel',
        'tipo_responsavel',
        'situacao',
        'tipo_interacao',
        'funcionalidade',
        'idempreendimento',
        'nome_empreendimento',
        'clientes_id',
    ];
}
