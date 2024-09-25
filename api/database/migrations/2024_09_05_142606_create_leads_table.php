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
            $table->longText('referencia')->nullable();
            $table->longText('referencia_data')->nullable();
            $table->longText('ativo')->nullable();
            $table->integer('idlead')->nullable();
            $table->integer('idsituacao')->nullable();
            $table->integer('situacao')->nullable();
            $table->longText('data_cad')->nullable();
            $table->longText('cep_cliente')->nullable();
            $table->longText('conversao_original')->nullable();
            $table->longText('conversao_ultimo')->nullable();
            $table->longText('conversao')->nullable();
            $table->longText('idempreendimento')->nullable();
            $table->longText('codigointerno_empreendimento')->nullable();
            $table->longText('empreendimento')->nullable();
            $table->integer('idempreendimento_primeiro')->nullable();
            $table->longText('empreendimento_primeiro')->nullable();
            $table->integer('idempreendimento_ultimo')->nullable();
            $table->longText('empreendimento_ultimo')->nullable();
            $table->integer('idmotivo')->nullable();
            $table->longText('motivo')->nullable();
            $table->integer('reserva')->nullable();
            $table->integer('idgestor')->nullable();
            $table->longText('gestor')->nullable();
            $table->integer('idcorretor')->nullable();
            $table->longText('corretor')->nullable();
            $table->integer('idimobiliaria')->nullable();
            $table->longText('imobiliaria')->nullable();
            $table->integer('idorigem')->nullable();
            $table->longText('origem')->nullable();
            $table->integer('idorigem_ultimo')->nullable();
            $table->longText('origem_ultimo')->nullable();
            $table->longText('midia_original')->nullable();
            $table->longText('midia_ultimo')->nullable();
            $table->double('renda_familiar')->nullable();
            $table->longText('motivo_cancelamento')->nullable();
            $table->longText('data_cancelamento')->nullable();
            $table->longText('data_sincronizacao')->nullable();
            $table->longText('data_ultima_interacao')->nullable();
            $table->longText('cidade')->nullable();
            $table->longText('estado')->nullable();
            $table->longText('regiao')->nullable();
            $table->longText('ultima_data_conversao')->nullable();
            $table->longText('data_reativacao')->nullable();
            $table->integer('idsituacao_anterior')->nullable();
            $table->longText('nome_situacao_anterior_lead')->nullable();
            $table->longText('tags')->nullable();
            $table->longText('descricao_motivo_cancelamento')->nullable();
            $table->integer('possibilidade_venda')->nullable();
            $table->longText('inserido_bolsao')->nullable();
            $table->longText('data_primeira_interacao_gestor')->nullable();
            $table->longText('data_primeira_interacao_corretor')->nullable();
            $table->integer('idgestor_ultimo')->nullable();
            $table->longText('gestor_ultimo')->nullable();
            $table->integer('idcorretor_ultimo')->nullable();
            $table->longText('corretor_ultimo')->nullable();
            $table->integer('idcorretor_penultimo')->nullable();
            $table->integer('idimobiliaria_ultimo')->nullable();
            $table->longText('corretor_penultimo')->nullable();
            $table->longText('nome_momento_lead')->nullable();
            $table->longText('novo')->nullable();
            $table->longText('retorno')->nullable();
            $table->longText('data_ultima_alteracao')->nullable();
            $table->longText('vencido')->nullable();
            $table->longText('data_vencimento')->nullable();
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
