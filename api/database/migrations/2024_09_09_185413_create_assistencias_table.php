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
            $table->string('referencia', 45);
            $table->string('referencia_data', 45);
            $table->string('ativo', 45);
            $table->integer('idassistencia');
            $table->integer('idcliente');
            $table->string('documento_cliente', 200);
            $table->string('cliente', 200);
            $table->integer('idsindico');
            $table->string('sindico', 200);
            $table->string('cep_cliente', 45);
            $table->integer('idempreendimento');
            $table->string('codigointerno_empreendimento', 45);
            $table->string('empreendimento', 200);
            $table->string('etapa', 45);
            $table->string('bloco', 45);
            $table->string('unidade', 45);
            $table->string('data_cad', 45);
            $table->integer('idsituacao');
            $table->string('situacao', 45);
            $table->string('unidade_manual', 45);
            $table->string('bloco_manual', 200);
            $table->longText('parecer_tecnico');
            $table->string('empreendimento_manual', 200);
            $table->string('data_prevista_termino', 45);
            $table->string('data_conclusao', 45);
            $table->string('recorrente', 45);
            $table->integer('total_horas');
            $table->double('custo_previsto');
            $table->integer('idatendimento');
            $table->longText('empreendimento_localidade');
            $table->string('unidade_area', 45);
            $table->integer('idlocalidade');
            $table->longText('localidade');
            $table->longText('descricao_localidade');
            $table->integer('idarea');
            $table->string('area', 200);
            $table->longText('descricao_area');
            $table->string('prioridade', 45);
            $table->string('ultima_atualizacao_situacao', 45);
            $table->string('data_modificacao', 45);


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
