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
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->id();
            $table->string('referencia', 45);
            $table->string('referencia_data', 45);
            $table->string('ativo', 45);
            $table->integer('idatendimento');
            $table->string('protocolo', 200);
            $table->string('data_cad', 45);
            $table->string('prioridade', 45);
            $table->integer('tempo_finalizado');
            $table->string('telefone_atendimento', 45);
            $table->string('nome_cliente', 200);
            $table->string('email_cliente', 200);
            $table->integer('tempo_resposta');
            $table->string('encerrado_primeiro_contrato', 45);
            $table->string('humor_cliente', 45);
            $table->integer('idcanal');
            $table->longText('atendimento_vinculado');
            $table->string('previsao_conclusao', 45);
            $table->integer('idlead');
            $table->string('ativo_painel', 45);
            $table->integer('avaliacao');
            $table->string('canal', 45);
            $table->integer('idempreendimento');
            $table->string('codigointerno_empreendimento', 45);
            $table->string('empreendimento', 200);
            $table->string('etapa', 45);
            $table->string('bloco', 45);
            $table->string('unidade', 45);
            $table->integer('idcliente');
            $table->string('documento_cliente', 200);
            $table->string('cliente', 200);
            $table->string('cep_cliente', 45);
            $table->string('regiao', 45);
            $table->string('situacao', 45);
            $table->string('data_situacao', 45);
            $table->integer('idprotocolo');
            $table->longText('assunto');
            $table->longText('subassunto');
            $table->string('usuario', 200);
            $table->integer('idclassificacao');
            $table->string('classificacao', 200);
            $table->integer('idtipo');
            $table->string('tipoa', 200);
            $table->string('imobiliaria', 200);
            $table->string('corretor', 200);
            $table->integer('idsituacao');
            $table->integer('idresponsavel');
            $table->string('responsavel', 200);
            $table->longText('idunidade');
            $table->integer('idcorretor');
            $table->string('idimobiliaria', 45);
            $table->string('sigla_empreendimento', 45);
            $table->string('codigointerno_cliente', 45);
            $table->string('tags', 45);
            $table->longText('times');
            $table->string('origem', 45);
            $table->integer('quantidade_mensagens');
            $table->integer('quantidade_iteracoes');
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
        Schema::dropIfExists('atendimentos');
    }
};
