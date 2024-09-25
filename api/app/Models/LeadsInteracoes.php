<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadsInteracoes extends Model
{
    use HasFactory;

    protected $fillable = [
        'referencia',
        'referencia_data',
        'idinteracao',
        'idlead',
        'data_cad',
        'idcorretor',
        'corretor',
        'idimobiliaria',
        'imobiliaria',
        'tipo',
        'situacao',
        'descricao',
        'gestor_interacao',
        'clientes_id',
    ];
}
