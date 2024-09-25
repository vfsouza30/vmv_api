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
        Schema::create('repasses', function (Blueprint $table) {
            $table->id();
            $table->longText('referencia')->nullable();
            $table->longText('referencia_data')->nullable();
            $table->longText('ativo')->nullable();
            $table->integer('idrepasse')->nullable();
            $table->integer('idsituacao')->nullable();
            $table->longText('situacao')->nullable();
            $table->integer('reserva')->nullable();
            $table->integer('idempreendimento')->nullable();
            $table->longText('codigointerno_empreendimento')->nullable();
            $table->longText('empreendimento')->nullable();
            $table->longText('etapa')->nullable();
            $table->longText('bloco')->nullable();
            $table->longText('unidade')->nullable();
            $table->longText('regiao')->nullable();
            $table->integer('idcliente')->nullable();
            $table->longText('documento_cliente')->nullable();
            $table->longText('cliente')->nullable();
            $table->longText('cep_cliente')->nullable();
            $table->longText('parcela')->nullable();
            $table->longText('idcontrato')->nullable();
            $table->longText('contrato')->nullable();
            $table->integer('valor_previsto')->nullable();
            $table->integer('parcela_conclusao')->nullable();
            $table->integer('saldo_devedor')->nullable();
            $table->integer('valor_divida')->nullable();
            $table->integer('valor_subsidio')->nullable();
            $table->integer('valor_fgts')->nullable();
            $table->integer('valor_financiado')->nullable();
            $table->longText('numero_contrato')->nullable();
            $table->longText('data_registro')->nullable();
            $table->longText('correspondente')->nullable();
            $table->longText('banco')->nullable();
            $table->longText('agencia')->nullable();
            $table->longText('data_alteracao_status')->nullable();
            $table->longText('data_venda')->nullable();
            $table->longText('data_contrato_contabilizado')->nullable();
            $table->longText('data_assinatura_de_contrato')->nullable();
            $table->longText('idlead')->nullable();
            $table->longText('data_recurso_liberado')->nullable();
            $table->longText('data_sincronizacao')->nullable();
            $table->longText('data_cadastro')->nullable();
            $table->longText('idunidade')->nullable();
            $table->longText('data_modificao')->nullable();

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
        Schema::dropIfExists('repasses');
    }
};
