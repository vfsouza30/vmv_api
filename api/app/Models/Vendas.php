<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    use HasFactory;

    protected $fillable = [
        'referencia', 
        'referencia_data',
        'idreserva' ,
        'idlead',
        'aprovada',
        'data', 
        'data_venda',
        'empreendimento',
        'idempreendimento',
        'regiao',
        'bloco',
        'unidade',
        'area_privativa',
        'cliente',
        'idcliente',
        'documento_cliente',
        'email',
        'cidade',
        'cep_cliente',
        'renda',
        'sexo',
        'idade',
        'estado_civil',
        'idcorretor',
        'corretor',
        'idimobiliaria',
        'imobiliaria',
        'campanha',
        'valor_contrato',
        'idmidia',
        'midia',
        'idtabela',
        'nometabela',
        'codigointernotabela',
        'idtipovenda',
        'tipovenda',
        'clientes_id'
    ];
}
