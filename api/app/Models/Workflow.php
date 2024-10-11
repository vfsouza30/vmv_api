<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
    use HasFactory;
    protected $fillable = [
        'ordem',
        'idsituacao',
        'nome',
        'cor_bg',
        'cor_nome',
        'flags',
        'tabela_nome',
        'clientes_id',
    ];
}
