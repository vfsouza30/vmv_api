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
        Schema::create('distratos', function (Blueprint $table) {
            $table->id();
            $table->string('referencia', 45);
            $table->string('referencia_data', 45);
            $table->string('ativo', 45);
            $table->integer('idreserva');
            $table->string('aprovada', 45);
            $table->string('data', 45);
            $table->string('situacao_data', 45);
            $table->string('situacao_atual', 45);
            $table->integer('idsituacao');
            $table->integer('idempreendimento');
            $table->string('codigointerno_empreendimento', 45);
            $table->string('empreendimento', 200);
            $table->string('bloco', 45);
            $table->string('unidade', 45);
            $table->string('regiao', 45);
            $table->string('venda', 45);
            $table->integer('idcliente');
            $table->string('documento', 200);
            $table->string('cliente', 200);
            $table->string('cep_cliente', 45);
            $table->integer('idcorretor');
            $table->string('corretor', 200);
            $table->integer('idimobiliaria');
            $table->string('imobiliaria', 200);
            $table->string('motivo_distrato', 45);
            $table->double('valor_contrato');
            $table->string('data_sincronizacao', 45);

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
        Schema::dropIfExists('distratos');
    }
};
