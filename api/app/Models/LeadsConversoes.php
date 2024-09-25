<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadsConversoes extends Model
{
    use HasFactory;
    protected $fillable = [
        'referencia',
        'referencia_data',
        'ativo',
        'idlead_conversao',
        'idlead',
        'nome',
        'email',
        'telefone',
        'origem',
        'origem_conversao',
        'conversao',
        'data_cad',
        'midia',
        'midia_conversao',
        'gestor',
        'gestor_ultimo',
        'empreendimento_ultimo',
        'corretor',
        'corretor_ultimo',
        'imobiliaria',
        'imobiliaria_ultima',
        'clientes_id',
    ];
}
