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
            $table->longText('referencia')->nullable();
            $table->longText('referencia_data')->nullable();
            $table->longText('ativo')->nullable();
            $table->integer('idlead_conversao')->nullable();
            $table->integer('idlead')->nullable();
            $table->longText('nome')->nullable();
            $table->longText('email')->nullable();
            $table->longText('telefone')->nullable();
            $table->longText('origem')->nullable();
            $table->longText('origem_conversao')->nullable();
            $table->longText('conversao')->nullable();
            $table->longText('data_cad')->nullable();
            $table->longText('midia')->nullable();
            $table->longText('midia_conversao')->nullable();
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
