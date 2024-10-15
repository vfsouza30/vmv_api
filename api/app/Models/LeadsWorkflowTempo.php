<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadsWorkflowTempo extends Model
{
    use HasFactory;

    protected $fillable = [
        'referencia',
        'referencia_data',
        'ativo',
        'idtempo',
        'idlead',
        'idsituacao',
        'tempo',
        'data_cad',
        'situacao',
        'sigla',
        'clientes_id'
    ];
}
