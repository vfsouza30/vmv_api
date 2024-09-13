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
        Schema::create('comissoes', function (Blueprint $table) {
            $table->id();
            $table->string('referencia', 45)->nullable();
            $table->string('referencia_data', 45)->nullable();
            $table->string('ativo', 45)->nullable();
            $table->integer('idcomissao')->nullable();
            $table->string('situacao', 45)->nullable();
            $table->integer('idsituacao')->nullable();
            $table->integer('idreserva')->nullable();
            $table->string('corretor', 200)->nullable();
            $table->string('imobiliaria', 200)->nullable();
            $table->string('empreendimento', 200)->nullable();
            $table->string('bloco', 45)->nullable();
            $table->string('etapa', 45)->nullable();
            $table->string('unidade', 45)->nullable();
            $table->string('regiao', 45)->nullable();
            $table->string('cliente', 200)->nullable();
            $table->string('cep_cliente', 45)->nullable();

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
        Schema::dropIfExists('comissoes');
    }
};
