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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('referencia', 45);
            $table->string('referencia_data', 45);
            $table->string('ativo', 45);
            $table->integer('idlead');
            $table->integer('idsituacao');
            $table->integer('situacao');
            $table->string('data_cad', 45);
            $table->string('cep_cliente', 45);
            $table->string('conversao_original', 45);
            $table->string('conversao_ultimo', 45);
            $table->string('conversao', 45);
            $table->string('idempreendimento', 45);
            $table->string('codigointerno_empreendimento', 45);
            $table->longText('empreendimento');
            $table->integer('idempreendimento_primeiro');
            $table->string('empreendimento_primeiro', 45);
            $table->integer('idempreendimento_ultimo');
            $table->string('empreendimento_ultimo', 200);
            $table->integer('idmotivo');
            $table->string('motivo', 200);
            $table->integer('reserva');
            $table->integer('idgestor');
            $table->string('gestor', 200);
            $table->integer('idcorretor');
            $table->string('corretor', 200);
            $table->integer('idimobiliaria');
            $table->string('imobiliaria', 200);
            $table->integer('idorigem');
            $table->string('origem',45);
            $table->integer('idorigem_ultimo');
            $table->string('origem_ultimo', 45);
            $table->string('midia_original', 45);
            $table->string('midia_ultimo', 45);
            $table->double('renda_familiar');
            $table->string('motivo_cancelamento', 200);
            $table->string('data_cancelamento', 45);
            $table->string('data_sincronizacao', 45);
            $table->string('data_ultima_interacao', 45);
            $table->string('cidade', 200);
            $table->string('estado', 45);
            $table->string('regiao', 45);
            $table->string('ultima_data_conversao', 45);
            $table->string('data_reativacao', 45);
            $table->integer('idsituacao_anterior');
            $table->string('nome_situacao_anterior_lead', 200);
            $table->string('tags', 45);
            $table->longText('descricao_motivo_cancelamento');
            $table->integer('possibilidade_venda');
            $table->string('inserido_bolsao', 45);
            $table->string('data_primeira_interacao_gestor', 45);
            $table->string('data_primeira_interacao_corretor', 45);
            $table->integer('idgestor_ultimo');
            $table->string('gestor_ultimo', 200);
            $table->integer('idcorretor_ultimo');
            $table->string('corretor_ultimo', 200);
            $table->integer('idcorretor_penultimo');
            $table->integer('idimobiliaria_ultimo');
            $table->string('corretor_penultimo', 200);
            $table->string('nome_momento_lead', 200);
            $table->string('novo',45);
            $table->string('retorno', 45);
            $table->string('data_ultima_alteracao', 45);
            $table->string('vencido', 45);
            $table->string('data_vencimento', 45);
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
        Schema::dropIfExists('leads');
    }
};
