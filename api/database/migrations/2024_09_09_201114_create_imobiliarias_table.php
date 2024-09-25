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
        Schema::create('imobiliarias', function (Blueprint $table) {
            $table->id();
            $table->longText('referencia')->nullable();
            $table->longText('referencia_data')->nullable();
            $table->longText('ativo')->nullable();
            $table->integer('idimobiliaria')->nullable();
            $table->longText('data_cad')->nullable();
            $table->longText('avatar_nome')->nullable();
            $table->longText('gerente_nome')->nullable();
            $table->longText('gerente_cpf')->nullable();
            $table->longText('gerente_telefone')->nullable();
            $table->longText('gerente_celular')->nullable();
            $table->longText('gerente_email')->nullable();
            $table->longText('sigla')->nullable();
            $table->longText('codigointerno')->nullable();
            $table->longText('observacoes')->nullable();

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
        Schema::dropIfExists('imobiliarias');
    }
};
