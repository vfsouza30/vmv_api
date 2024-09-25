<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadsVisita extends Model
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
        'idtipo_visita',
        'nome_tipo_visita',
        'funcionalidade',
        'data_conclusao',
        'pdv',
        'visita_virtual',
        'idempreendimento',
        'nome_empreendimento',
        'clientes_id',
    ];
}
