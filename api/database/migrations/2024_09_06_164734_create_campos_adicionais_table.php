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
        Schema::create('campos_adicionais', function (Blueprint $table) {
            $table->id();
            $table->longText('referencia')->nullable();
            $table->longText('referencia_data')->nullable();
            $table->longText('ativo')->nullable();
            $table->integer('idcampo')->nullable();
            $table->longText('campo_nome')->nullable();
            $table->integer('idfuncionalidade')->nullable();
            $table->longText('funcionalidade')->nullable();
            $table->longText('valor')->nullable();
            $table->longText('data_cad')->nullable();
            $table->longText('data_modificacao')->nullable();

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
        Schema::dropIfExists('campos_adicionais');
    }
};
