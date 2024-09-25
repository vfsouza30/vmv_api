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
        Schema::create('assistencias', function (Blueprint $table) {
            $table->id();
            $table->longText('referencia')->nullable();
            $table->longText('referencia_data')->nullable();
            $table->longText('ativo')->nullable();
            $table->integer('idassistencia')->nullable();
            $table->integer('idcliente')->nullable();
            $table->longText('documento_cliente')->nullable();
            $table->longText('cliente')->nullable();
            $table->integer('idsindico')->nullable();
            $table->longText('sindico')->nullable();
            $table->longText('cep_cliente')->nullable();
            $table->integer('idempreendimento')->nullable();
            $table->longText('codigointerno_empreendimento')->nullable();
            $table->longText('empreendimento')->nullable();
            $table->longText('etapa')->nullable();
            $table->longText('bloco')->nullable();
            $table->longText('unidade')->nullable();
            $table->longText('data_cad')->nullable();
            $table->integer('idsituacao')->nullable();
            $table->longText('situacao')->nullable();
            $table->longText('unidade_manual')->nullable();
            $table->longText('bloco_manual')->nullable();
            $table->longText('parecer_tecnico')->nullable();
            $table->longText('empreendimento_manual')->nullable();
            $table->longText('data_prevista_termino')->nullable();
            $table->longText('data_conclusao')->nullable();
            $table->longText('recorrente')->nullable();
            $table->integer('total_horas')->nullable();
            $table->double('custo_previsto')->nullable();
            $table->integer('idatendimento')->nullable();
            $table->longText('empreendimento_localidade')->nullable();
            $table->longText('unidade_area')->nullable();
            $table->integer('idlocalidade')->nullable();
            $table->longText('localidade')->nullable();
            $table->longText('descricao_localidade')->nullable();
            $table->integer('idarea')->nullable();
            $table->longText('area')->nullable();
            $table->longText('descricao_area')->nullable();
            $table->longText('prioridade')->nullable();
            $table->longText('ultima_atualizacao_situacao')->nullable();
            $table->longText('data_modificacao')->nullable();


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
        Schema::dropIfExists('assistencias');
    }
};
