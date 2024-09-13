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
            $table->string('referencia', 45)->nullable();
            $table->string('referencia_data', 45)->nullable();
            $table->string('ativo', 45)->nullable();
            $table->integer('idrepasse')->nullable();
            $table->integer('idsituacao')->nullable();
            $table->string('situacao', 45)->nullable();
            $table->integer('reserva')->nullable();
            $table->integer('idempreendimento')->nullable();
            $table->string('codigointerno_empreendimento', 45)->nullable();
            $table->string('empreendimento', 200)->nullable();
            $table->string('etapa', 45)->nullable();
            $table->string('bloco', 45)->nullable();
            $table->string('unidade', 45)->nullable();
            $table->string('regiao', 45)->nullable();
            $table->integer('idcliente')->nullable();
            $table->string('documento_cliente', 200)->nullable();
            $table->string('cliente', 200)->nullable();
            $table->string('cep_cliente', 45)->nullable();
            $table->string('parcela', 45)->nullable();
            $table->string('idcontrato', 45)->nullable();
            $table->string('contrato', 45)->nullable();
            $table->integer('valor_previsto')->nullable();
            $table->integer('parcela_conclusao')->nullable();
            $table->integer('saldo_devedor')->nullable();
            $table->integer('valor_divida')->nullable();
            $table->integer('valor_subsidio')->nullable();
            $table->integer('valor_fgts')->nullable();
            $table->integer('valor_financiado')->nullable();
            $table->string('numero_contrato', 45)->nullable();
            $table->string('data_registro', 45)->nullable();
            $table->longText('correspondente')->nullable();
            $table->string('banco', 45)->nullable();
            $table->string('agencia', 45)->nullable();
            $table->string('data_alteracao_status', 45)->nullable();
            $table->string('data_venda', 45)->nullable();
            $table->string('data_contrato_contabilizado', 45)->nullable();
            $table->string('data_assinatura_de_contrato', 45)->nullable();
            $table->longText('idlead')->nullable();
            $table->string('data_recurso_liberado', 45)->nullable();
            $table->string('data_sincronizacao', 45)->nullable();
            $table->string('data_cadastro', 45)->nullable();
            $table->string('idunidade', 45)->nullable();
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
        Schema::dropIfExists('repasses');
    }
};
