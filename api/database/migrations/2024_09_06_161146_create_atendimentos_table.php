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
            $table->string('referencia', 45)->nullable();
            $table->string('referencia_data', 45)->nullable();
            $table->string('ativo', 45)->nullable();
            $table->integer('idatendimento')->nullable();
            $table->string('protocolo', 200)->nullable();
            $table->string('data_cad', 45)->nullable();
            $table->string('prioridade', 45)->nullable();
            $table->integer('tempo_finalizado')->nullable();
            $table->string('telefone_atendimento', 45)->nullable();
            $table->string('nome_cliente', 200)->nullable();
            $table->string('email_cliente', 200)->nullable();
            $table->integer('tempo_resposta')->nullable();
            $table->string('encerrado_primeiro_contrato', 45)->nullable();
            $table->string('humor_cliente', 45)->nullable();
            $table->integer('idcanal')->nullable();
            $table->longText('atendimento_vinculado')->nullable();
            $table->string('previsao_conclusao', 45)->nullable();
            $table->integer('idlead')->nullable();
            $table->string('ativo_painel', 45)->nullable();
            $table->integer('avaliacao')->nullable();
            $table->string('canal', 45)->nullable();
            $table->integer('idempreendimento')->nullable();
            $table->string('codigointerno_empreendimento', 45)->nullable();
            $table->string('empreendimento', 200)->nullable();
            $table->string('etapa', 45)->nullable();
            $table->string('bloco', 45)->nullable();
            $table->string('unidade', 45)->nullable();
            $table->integer('idcliente')->nullable();
            $table->string('documento_cliente', 200)->nullable();
            $table->string('cliente', 200)->nullable();
            $table->string('cep_cliente', 45)->nullable();
            $table->string('regiao', 45)->nullable();
            $table->string('situacao', 45)->nullable();
            $table->string('data_situacao', 45)->nullable();
            $table->integer('idprotocolo')->nullable();
            $table->longText('assunto')->nullable();
            $table->longText('subassunto')->nullable();
            $table->string('usuario', 200)->nullable();
            $table->integer('idclassificacao')->nullable();
            $table->string('classificacao', 200)->nullable();
            $table->integer('idtipo')->nullable();
            $table->string('tipoa', 200)->nullable();
            $table->string('imobiliaria', 200)->nullable();
            $table->string('corretor', 200)->nullable();
            $table->integer('idsituacao')->nullable();
            $table->integer('idresponsavel')->nullable();
            $table->string('responsavel', 200)->nullable();
            $table->longText('idunidade')->nullable();
            $table->integer('idcorretor')->nullable();
            $table->string('idimobiliaria', 45)->nullable();
            $table->string('sigla_empreendimento', 45)->nullable();
            $table->string('codigointerno_cliente', 45)->nullable();
            $table->string('tags', 45)->nullable();
            $table->longText('times')->nullable();
            $table->string('origem', 45)->nullable();
            $table->integer('quantidade_mensagens')->nullable();
            $table->integer('quantidade_iteracoes')->nullable();
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
        Schema::dropIfExists('atendimentos');
    }
};
