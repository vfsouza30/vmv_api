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
            $table->string('referencia', 45)->nullable();
            $table->string('referencia_data', 45)->nullable();
            $table->integer('idreserva')->nullable();
            $table->longText('idlead')->nullable();
            $table->string('aprovada', 45)->nullable();
            $table->string('data', 45)->nullable();
            $table->string('data_venda', 45)->nullable();
            $table->string('empreendimento', 200)->nullable();
            $table->integer('idempreendimento')->nullable();
            $table->string('regiao', 45)->nullable();
            $table->string('bloco', 45)->nullable();
            $table->string('unidade', 45)->nullable();
            $table->double('area_privativa')->nullable();
            $table->string('cliente', 200)->nullable();
            $table->integer('idcliente')->nullable();
            $table->string('documento_cliente', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('cidade', 200)->nullable();
            $table->string('cep_cliente', 45)->nullable();
            $table->double('renda')->nullable();
            $table->string('sexo', 45)->nullable();
            $table->integer('idade')->nullable();
            $table->string('estado_civil', 45)->nullable();
            $table->integer('idcorretor')->nullable();
            $table->string('corretor', 200)->nullable();
            $table->integer('idimobiliaria')->nullable();
            $table->string('imobiliaria', 200)->nullable();
            $table->string('campanha', 200)->nullable();
            $table->double('valor_contrato')->nullable();
            $table->integer('idmidia')->nullable();
            $table->string('midia', 45)->nullable();
            $table->string('idtabela', 45)->nullable();
            $table->string('nometabela', 200)->nullable();
            $table->string('codigointernotabela', 45)->nullable();
            $table->integer('idtipovenda')->nullable();
            $table->string('tipovenda', 200)->nullable();

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
