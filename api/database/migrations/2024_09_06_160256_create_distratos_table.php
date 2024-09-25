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
        Schema::create('distratos', function (Blueprint $table) {
            $table->id();
            $table->longText('referencia')->nullable();
            $table->longText('referencia_data')->nullable();
            $table->longText('ativo')->nullable();
            $table->integer('idreserva')->nullable();
            $table->longText('aprovada')->nullable();
            $table->longText('data_cad')->nullable();
            $table->longText('situacao_data')->nullable();
            $table->longText('situacao_atual')->nullable();
            $table->integer('idsituacao')->nullable();
            $table->integer('idempreendimento')->nullable();
            $table->longText('codigointerno_empreendimento')->nullable();
            $table->longText('empreendimento')->nullable();
            $table->longText('bloco')->nullable();
            $table->longText('unidade')->nullable();
            $table->longText('regiao')->nullable();
            $table->longText('venda')->nullable();
            $table->integer('idcliente')->nullable();
            $table->longText('documento')->nullable();
            $table->longText('cliente')->nullable();
            $table->longText('cep_cliente')->nullable();
            $table->integer('idcorretor')->nullable();
            $table->longText('corretor')->nullable();
            $table->integer('idimobiliaria')->nullable();
            $table->longText('imobiliaria')->nullable();
            $table->longText('motivo_distrato')->nullable();
            $table->double('valor_contrato')->nullable();
            $table->longText('data_sincronizacao')->nullable();

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
        Schema::dropIfExists('distratos');
    }
};
