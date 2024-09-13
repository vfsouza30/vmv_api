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
        Schema::create('leads_tarefas', function (Blueprint $table) {
            $table->id();
            $table->string('referencia', 45)->nullable();
            $table->string('referencia_data', 45)->nullable();
            $table->integer('idtarefa')->nullable();
            $table->integer('idinteracao')->nullable();
            $table->integer('idlead')->nullable();
            $table->string('data_cad', 45)->nullable();
            $table->string('data', 45)->nullable();
            $table->integer('idresponsavel')->nullable();
            $table->string('responsavel', 200)->nullable();
            $table->string('tipo_responsavel', 45)->nullable();
            $table->string('situacao', 45)->nullable();
            $table->string('tipo_interacao', 45)->nullable();
            $table->string('funcionalidade', 45)->nullable();
            $table->integer('idempreendimento')->nullable();
            $table->string('nome_empreendimento', 200)->nullable();


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
        Schema::dropIfExists('leads_tarefas');
    }
};
