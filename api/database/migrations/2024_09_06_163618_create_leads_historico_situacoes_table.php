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
        Schema::create('leads_historico_situacoes', function (Blueprint $table) {
            $table->id();

            $table->string('referencia', 45)->nullable();
            $table->string('referencia_data', 45)->nullable();
            $table->string('ativo', 45)->nullable();
            $table->integer('idlead')->nullable();
            $table->string('data_cad', 45)->nullable();
            $table->integer('de')->nullable();
            $table->integer('para')->nullable();
            $table->string('de_nome', 200)->nullable();
            $table->string('para_nome', 200)->nullable();
            
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
        Schema::dropIfExists('leads_historico_situacoes');
    }
};
