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
        Schema::create('leads_interacoes', function (Blueprint $table) {
            $table->id();
            $table->longText('referencia')->nullable();
            $table->longText('referencia_data')->nullable();
            $table->integer('idinteracao')->nullable();
            $table->integer('idlead')->nullable();
            $table->longText('data_cad')->nullable();
            $table->integer('idcorretor')->nullable();
            $table->longText('corretor')->nullable();
            $table->integer('idimobiliaria')->nullable();
            $table->longText('imobiliaria')->nullable();
            $table->longText('tipo')->nullable();
            $table->longText('situacao')->nullable();
            $table->longText('descricao')->nullable();
            $table->longText('gestor_interacao')->nullable();

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
        Schema::dropIfExists('leads_interacoes');
    }
};
