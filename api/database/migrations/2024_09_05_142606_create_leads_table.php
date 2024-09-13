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
            $table->string('referencia', 45)->nullable();
            $table->string('referencia_data', 45)->nullable();
            $table->string('ativo', 45)->nullable();
            $table->integer('idlead')->nullable();
            $table->integer('idsituacao')->nullable();
            $table->integer('situacao')->nullable();
            $table->string('data_cad', 45)->nullable();
            $table->string('cep_cliente', 45)->nullable();
            $table->string('conversao_original', 45)->nullable();
            $table->string('conversao_ultimo', 45)->nullable();
            $table->string('conversao', 45)->nullable();
            $table->string('idempreendimento', 45)->nullable();
            $table->string('codigointerno_empreendimento', 45)->nullable();
            $table->longText('empreendimento')->nullable();
            $table->integer('idempreendimento_primeiro')->nullable();
            $table->string('empreendimento_primeiro', 45)->nullable();
            $table->integer('idempreendimento_ultimo')->nullable();
            $table->string('empreendimento_ultimo', 200)->nullable();
            $table->integer('idmotivo')->nullable();
            $table->string('motivo', 200)->nullable();
            $table->integer('reserva')->nullable();
            $table->integer('idgestor')->nullable();
            $table->string('gestor', 200)->nullable();
            $table->integer('idcorretor')->nullable();
            $table->string('corretor', 200)->nullable();
            $table->integer('idimobiliaria')->nullable();
            $table->string('imobiliaria', 200)->nullable();
            $table->integer('idorigem')->nullable();
            $table->string('origem',45)->nullable();
            $table->integer('idorigem_ultimo')->nullable();
            $table->string('origem_ultimo', 45)->nullable();
            $table->string('midia_original', 45)->nullable();
            $table->string('midia_ultimo', 45)->nullable();
            $table->double('renda_familiar')->nullable();
            $table->string('motivo_cancelamento', 200)->nullable();
            $table->string('data_cancelamento', 45)->nullable();
            $table->string('data_sincronizacao', 45)->nullable();
            $table->string('data_ultima_interacao', 45)->nullable();
            $table->string('cidade', 200)->nullable();
            $table->string('estado', 45)->nullable();
            $table->string('regiao', 45)->nullable();
            $table->string('ultima_data_conversao', 45)->nullable();
            $table->string('data_reativacao', 45)->nullable();
            $table->integer('idsituacao_anterior')->nullable();
            $table->string('nome_situacao_anterior_lead', 200)->nullable();
            $table->string('tags', 45)->nullable();
            $table->longText('descricao_motivo_cancelamento')->nullable();
            $table->integer('possibilidade_venda')->nullable();
            $table->string('inserido_bolsao', 45)->nullable();
            $table->string('data_primeira_interacao_gestor', 45)->nullable();
            $table->string('data_primeira_interacao_corretor', 45)->nullable();
            $table->integer('idgestor_ultimo')->nullable();
            $table->string('gestor_ultimo', 200)->nullable();
            $table->integer('idcorretor_ultimo')->nullable();
            $table->string('corretor_ultimo', 200)->nullable();
            $table->integer('idcorretor_penultimo')->nullable();
            $table->integer('idimobiliaria_ultimo')->nullable();
            $table->string('corretor_penultimo', 200)->nullable();
            $table->string('nome_momento_lead', 200)->nullable();
            $table->string('novo',45)->nullable();
            $table->string('retorno', 45)->nullable();
            $table->string('data_ultima_alteracao', 45)->nullable();
            $table->string('vencido', 45)->nullable();
            $table->string('data_vencimento', 45)->nullable();
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
