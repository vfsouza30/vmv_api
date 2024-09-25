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
        Schema::create('leads_visitas', function (Blueprint $table) {
            $table->id();
            $table->longText('referencia')->nullable();
            $table->longText('referencia_data')->nullable();
            $table->integer('idtarefa')->nullable();
            $table->integer('idinteracao')->nullable();
            $table->integer('idlead')->nullable();
            $table->longText('data_cad')->nullable();
            $table->longText('data')->nullable();
            $table->integer('idresponsavel')->nullable();
            $table->longText('responsavel')->nullable();
            $table->longText('tipo_responsavel')->nullable();
            $table->longText('situacao')->nullable();
            $table->longText('tipo_interacao')->nullable();
            $table->longText('idtipo_visita')->nullable();
            $table->longText('nome_tipo_visita')->nullable();
            $table->longText('funcionalidade')->nullable();
            $table->longText('data_conclusao')->nullable();
            $table->longText('pdv')->nullable();
            $table->longText('visita_virtual')->nullable();
            $table->integer('idempreendimento')->nullable();
            $table->longText('nome_empreendimento')->nullable();

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
        Schema::dropIfExists('leads_visitas');
    }
};
