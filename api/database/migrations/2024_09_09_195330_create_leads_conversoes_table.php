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
            $table->string('referencia', 45);
            $table->string('referencia_data', 45);
            $table->string('ativo', 45);
            $table->integer('idlead_conversao');
            $table->integer('idlead');
            $table->string('nome', 200);
            $table->string('email', 200);
            $table->string('telefone', 45);
            $table->string('origem', 45);
            $table->string('origem_conversao', 45);
            $table->string('conversao', 45);
            $table->string('data_cad', 45);
            $table->string('midia', 45);
            $table->string('midia_conversao', 45);
            $table->integer('gestor');
            $table->integer('gestor_ultimo');
            $table->integer('empreendimento_ultimo');
            $table->integer('corretor');
            $table->integer('corretor_ultimo');
            $table->integer('imobiliaria');
            $table->integer('imobiliaria_ultima');


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
