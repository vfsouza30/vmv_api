<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->string('referencia', 45);
            $table->string('referencia_data', 45);
            $table->integer('idreserva');
            $table->longText('idlead');
            $table->string('aprovada', 45);
            $table->string('data', 45);
            $table->string('data_venda', 45);
            $table->string('empreendimento', 200);
            $table->integer('idempreendimento');
            $table->string('regiao', 45);
            $table->string('bloco', 45);
            $table->string('unidade', 45);
            $table->double('area_privativa');
            $table->string('cliente', 200);
            $table->integer('idcliente');
            $table->string('documento_cliente', 200);
            $table->string('email', 200);
            $table->string('cidade', 200);
            $table->string('cep_cliente', 45);
            $table->double('renda');
            $table->string('sexo', 45);
            $table->integer('idade');
            $table->string('estado_civil', 45);
            $table->integer('idcorretor');
            $table->string('corretor', 200);
            $table->integer('idimobiliaria');
            $table->string('imobiliaria', 200);
            $table->string('campanha', 200);
            $table->double('valor_contrato');
            $table->integer('idmidia');
            $table->string('midia', 45);
            $table->string('idtabela', 45);
            $table->string('nometabela', 200);
            $table->string('codigointernotabela', 45);
            $table->integer('idtipovenda');
            $table->string('tipovenda', 200);

            $table->unsignedBigInteger('clientes_id');
            $table->timestamps();

            $table->foreign('clientes_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
