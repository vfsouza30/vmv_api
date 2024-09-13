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
            $table->string('referencia', 45)->nullable();
            $table->string('referencia_data', 45)->nullable();
            $table->integer('idinteracao')->nullable();
            $table->integer('idlead')->nullable();
            $table->string('data_cad', 45)->nullable();
            $table->integer('idcorretor')->nullable();
            $table->string('corretor', 200)->nullable();
            $table->integer('idimobiliaria')->nullable();
            $table->string('imobiliaria', 200)->nullable();
            $table->string('tipo', 45)->nullable();
            $table->string('situacao', 45)->nullable();
            $table->longText('descricao')->nullable();
            $table->string('gestor_interacao', 200)->nullable();

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
