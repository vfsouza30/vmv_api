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
        Schema::create('leads_conversoes', function (Blueprint $table) {
            $table->id();
            $table->string('referencia', 45)->nullable();
            $table->string('referencia_data', 45)->nullable();
            $table->string('ativo', 45)->nullable();
            $table->integer('idlead_conversao')->nullable();
            $table->integer('idlead')->nullable();
            $table->string('nome', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('telefone', 45)->nullable();
            $table->string('origem', 45)->nullable();
            $table->string('origem_conversao', 45)->nullable();
            $table->string('conversao', 45)->nullable();
            $table->string('data_cad', 45)->nullable();
            $table->string('midia', 45)->nullable();
            $table->string('midia_conversao', 45)->nullable();
            $table->integer('gestor')->nullable();
            $table->integer('gestor_ultimo')->nullable();
            $table->integer('empreendimento_ultimo')->nullable();
            $table->integer('corretor')->nullable();
            $table->integer('corretor_ultimo')->nullable();
            $table->integer('imobiliaria')->nullable();
            $table->integer('imobiliaria_ultima')->nullable();


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
        Schema::dropIfExists('leads__conversoes');
    }
};
