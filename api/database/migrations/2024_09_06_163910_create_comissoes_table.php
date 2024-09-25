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
            $table->longText('referencia')->nullable();
            $table->longText('referencia_data')->nullable();
            $table->longText('ativo')->nullable();
            $table->integer('idcomissao')->nullable();
            $table->longText('situacao')->nullable();
            $table->integer('idsituacao')->nullable();
            $table->integer('idreserva')->nullable();
            $table->longText('corretor')->nullable();
            $table->longText('imobiliaria')->nullable();
            $table->longText('empreendimento')->nullable();
            $table->longText('bloco')->nullable();
            $table->longText('etapa')->nullable();
            $table->longText('unidade')->nullable();
            $table->longText('regiao')->nullable();
            $table->longText('cliente')->nullable();
            $table->longText('cep_cliente')->nullable();

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
