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
            $table->string('referencia', 45)->nullable();
            $table->string('referencia_data', 45)->nullable();
            $table->string('ativo', 45)->nullable();
            $table->integer('idimobiliaria')->nullable();
            $table->string('data_cad', 45)->nullable();
            $table->string('avatar_nome', 200)->nullable();
            $table->string('gerente_nome', 200)->nullable();
            $table->string('gerente_cpf', 45)->nullable();
            $table->string('gerente_telefone', 45)->nullable();
            $table->string('gerente_celular', 45)->nullable();
            $table->string('gerente_email', 200)->nullable();
            $table->string('sigla', 45)->nullable();
            $table->string('codigointerno', 45)->nullable();
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
