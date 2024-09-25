<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CamposAdicionais extends Model
{
    use HasFactory;

    protected $fillable = [
        'referencia', 
        'referencia_data',
        'ativo',
        'idcampo',
        'campo_nome',
        'idfuncionalidade',
        'funcionalidade',
        'valor',
        'data_cad',
        'data_modificacao',
        'clientes_id',
    ];
}
