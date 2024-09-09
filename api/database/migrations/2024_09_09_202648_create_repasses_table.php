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
            $table->string('referencia', 45);
            $table->string('referencia_data', 45);
            $table->string('ativo', 45);
            $table->integer('idrepasse');
            $table->integer('idsituacao');
            $table->string('situacao', 45);
            $table->integer('reserva');
            $table->integer('idempreendimento');
            $table->string('codigointerno_empreendimento', 45);
            $table->string('empreendimento', 200);
            $table->string('etapa', 45);
            $table->string('bloco', 45);
            $table->string('unidade', 45);
            $table->string('regiao', 45);
            $table->integer('idcliente');
            $table->string('documento_cliente', 200);
            $table->string('cliente', 200);
            $table->string('cep_cliente', 45);
            $table->string('parcela', 45);
            $table->string('idcontrato', 45);
            $table->string('contrato', 45);
            $table->integer('valor_previsto');
            $table->integer('parcela_conclusao');
            $table->integer('saldo_devedor');
            $table->integer('valor_divida');
            $table->integer('valor_subsidio');
            $table->integer('valor_fgts');
            $table->integer('valor_financiado');
            $table->string('numero_contrato', 45);
            $table->string('data_registro', 45);
            $table->longText('correspondente');
            $table->string('banco', 45);
            $table->string('agencia', 45);
            $table->string('data_alteracao_status', 45);
            $table->string('data_venda', 45);
            $table->string('data_contrato_contabilizado', 45);
            $table->string('data_assinatura_de_contrato', 45);
            $table->longText('idlead');
            $table->string('data_recurso_liberado', 45);
            $table->string('data_sincronizacao', 45);
            $table->string('data_cadastro', 45);
            $table->string('idunidade', 45);
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
        Schema::dropIfExists('repasses');
    }
};
