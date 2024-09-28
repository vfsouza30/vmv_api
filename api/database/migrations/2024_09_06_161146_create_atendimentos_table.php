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
            $table->longText('referencia')->nullable();
            $table->longText('referencia_data')->nullable();
            $table->longText('ativo')->nullable();
            $table->integer('idatendimento')->nullable();
            $table->longText('protocolo')->nullable();
            $table->longText('data_cad')->nullable();
            $table->longText('prioridade')->nullable();
            $table->integer('tempo_finalizado')->nullable();
            $table->longText('telefone_atendimento')->nullable();
            $table->longText('nome_cliente')->nullable();
            $table->longText('email_cliente')->nullable();
            $table->integer('tempo_resposta')->nullable();
            $table->longText('encerrado_primeiro_contato')->nullable();
            $table->longText('humor_cliente')->nullable();
            $table->integer('idcanal')->nullable();
            $table->longText('atendimento_vinculado')->nullable();
            $table->longText('previsao_conclusao')->nullable();
            $table->integer('idlead')->nullable();
            $table->longText('ativo_painel')->nullable();
            $table->integer('avaliacao')->nullable();
            $table->longText('canal')->nullable();
            $table->integer('idempreendimento')->nullable();
            $table->longText('codigointerno_empreendimento')->nullable();
            $table->longText('empreendimento')->nullable();
            $table->longText('etapa')->nullable();
            $table->longText('bloco')->nullable();
            $table->longText('unidade')->nullable();
            $table->integer('idcliente')->nullable();
            $table->longText('documento_cliente')->nullable();
            $table->longText('cliente')->nullable();
            $table->longText('cep_cliente')->nullable();
            $table->longText('regiao')->nullable();
            $table->longText('situacao')->nullable();
            $table->longText('data_situacao')->nullable();
            $table->integer('idprotocolo')->nullable();
            $table->longText('assunto')->nullable();
            $table->longText('subassunto')->nullable();
            $table->longText('usuario')->nullable();
            $table->integer('idclassificacao')->nullable();
            $table->longText('classificacao')->nullable();
            $table->integer('idtipo')->nullable();
            $table->longText('tipoa')->nullable();
            $table->longText('imobiliaria')->nullable();
            $table->longText('corretor')->nullable();
            $table->integer('idsituacao')->nullable();
            $table->integer('idresponsavel')->nullable();
            $table->longText('responsavel')->nullable();
            $table->longText('idunidade')->nullable();
            $table->integer('idcorretor')->nullable();
            $table->longText('idimobiliaria')->nullable();
            $table->longText('sigla_empreendimento')->nullable();
            $table->longText('codigointerno_cliente')->nullable();
            $table->longText('tags')->nullable();
            $table->longText('times')->nullable();
            $table->longText('origem')->nullable();
            $table->integer('quantidade_mensagens')->nullable();
            $table->integer('quantidade_iteracoes')->nullable();
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
        Schema::dropIfExists('atendimentos');
    }
};
