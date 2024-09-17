<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_cliente',
        'email_cliente',
        'token_cliente',
        'ativo',
        'ultima_pagina_processada',
    ];
}
