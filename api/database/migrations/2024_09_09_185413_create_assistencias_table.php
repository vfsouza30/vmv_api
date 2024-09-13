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
            $table->string('referencia', 45)->nullable();
            $table->string('referencia_data', 45)->nullable();
            $table->string('ativo', 45)->nullable();
            $table->integer('idassistencia')->nullable();
            $table->integer('idcliente')->nullable();
            $table->string('documento_cliente', 200)->nullable();
            $table->string('cliente', 200)->nullable();
            $table->integer('idsindico')->nullable();
            $table->string('sindico', 200)->nullable();
            $table->string('cep_cliente', 45)->nullable();
            $table->integer('idempreendimento')->nullable();
            $table->string('codigointerno_empreendimento', 45)->nullable();
            $table->string('empreendimento', 200)->nullable();
            $table->string('etapa', 45)->nullable();
            $table->string('bloco', 45)->nullable();
            $table->string('unidade', 45)->nullable();
            $table->string('data_cad', 45)->nullable();
            $table->integer('idsituacao')->nullable();
            $table->string('situacao', 45)->nullable();
            $table->string('unidade_manual', 45)->nullable();
            $table->string('bloco_manual', 200)->nullable();
            $table->longText('parecer_tecnico')->nullable();
            $table->string('empreendimento_manual', 200)->nullable();
            $table->string('data_prevista_termino', 45)->nullable();
            $table->string('data_conclusao', 45)->nullable();
            $table->string('recorrente', 45)->nullable();
            $table->integer('total_horas')->nullable();
            $table->double('custo_previsto')->nullable();
            $table->integer('idatendimento')->nullable();
            $table->longText('empreendimento_localidade')->nullable();
            $table->string('unidade_area', 45)->nullable();
            $table->integer('idlocalidade')->nullable();
            $table->longText('localidade')->nullable();
            $table->longText('descricao_localidade')->nullable();
            $table->integer('idarea')->nullable();
            $table->string('area', 200)->nullable();
            $table->longText('descricao_area')->nullable();
            $table->string('prioridade', 45)->nullable();
            $table->string('ultima_atualizacao_situacao', 45)->nullable();
            $table->string('data_modificacao', 45)->nullable();


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
